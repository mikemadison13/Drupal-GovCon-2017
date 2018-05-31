<?php

use Drupal\acsf\AcsfConfigDefault;
use Drupal\acsf\Event\AcsfEvent;
use Drupal\acsf\AcsfMessageFailedResponseException;
use Drupal\acsf\AcsfMessageRest;
use Drupal\acsf\AcsfSite;
use Drupal\Core\Extension\InfoParser;

/**
 * @file
 * Provides drush commands for site related operations.
 */

/**
 * Implements hook_drush_command().
 */
function acsf_drush_command() {
  return array(
    'acsf-build-registry' => array(
      'description' => dt('Rebuilds the ACSF registry.'),
    ),
    'acsf-site-scrub' => array(
      'description' => dt('Scrubs sensitive information regarding ACSF.'),
    ),
    'acsf-site-sync' => array(
      'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_DATABASE,
      'description' => dt('Synchronize data with the Factory.'),
      'options' => array(
        'data' => dt('A base64 encoded php array describing the site generated from the Factory.'),
      ),
    ),
    'acsf-get-factory-creds' => array(
      'description' => dt('Print credentials retrieved from the factory.'),
      'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_ROOT,
    ),
    'go-offline' => array(
      'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_FULL,
      'description' => dt('Set a site offline.'),
      'aliases' => array('go-off'),
    ),
    'go-online' => array(
      'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_FULL,
      'description' => dt('Set a site online.'),
      'aliases' => array('go-on'),
    ),
    'report-complete-async-process' => array(
      'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_ROOT,
      'description' => dt('Send notice back to the Factory when a process completes.'),
      'options' => array(
        'data' => dt('Serialized PHP data regarding the caller.'),
      ),
    ),
    'acsf-version-get' => array(
      'description' => dt('Fetches the version of the acsf moduleset.'),
      'arguments' => array(
        'path' => dt('The path to the acsf moduleset.'),
      ),
      'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_ROOT,
    ),
    'acsf-install-task-get' => array(
      'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_ROOT,
      'description' => dt('Returns the last installation task that was completed.'),
    ),
  );
}

/**
 * Command callback. Rebuilds the ACSF registry.
 */
function drush_acsf_build_registry() {
  acsf_build_registry();
  drush_print(dt('The ACSF registry was rebuilt.'));
}

/**
 * Command callback. Scrubs the site database and/or other storage.
 *
 * Note that 'scrubbing' in our case doesn't mean just clearing configuration
 * values but also initializing them for use in a new website.
 *
 * drush acsf-site-scrub is called by a 'db-copy' hosting task, which in turn
 * seems to be called (only?) by the staging process.
 */
function drush_acsf_site_scrub() {
  $connection = \Drupal::database();

  // Ensure that we are testing the scrub cleanly.
  \Drupal::state()->delete('acsf_site_scrubbed');

  drush_print(dt('Preparing to scrub users ... '));

  // Get a list of roles whose users should be preserved during staging
  // scrubbing.  Both lists are implemented as "alters" for consistency with
  // hook_acsf_duplication_scrub_preserved_users_alter.
  $preserved_roles = array();
  \Drupal::moduleHandler()->alter('acsf_staging_scrub_admin_roles', $preserved_roles);

  if (!empty($preserved_roles)) {
    drush_print(dt('Preserving roles: @rids', array('@rids' => implode(', ', $preserved_roles))));
  }

  // Get a list of UIDs to preserve during staging scrubbing.  UIDs are first
  // obtained by the preserved roles, then can be altered to add or remove UIDs.
  if (!empty($preserved_roles)) {
    $preserved_users = \Drupal::entityQuery('user')
      ->condition('roles', $preserved_roles, 'IN')
      ->execute();
  }
  else {
    $preserved_users = array();
  }
  \Drupal::moduleHandler()->alter('acsf_staging_scrub_preserved_users', $preserved_users);
  // Always preserve the anonymous user.
  $preserved_users[] = 0;
  $preserved_users = array_unique($preserved_users);

  // The anonymous user makes the size of this array always at least 1.
  drush_print(dt('Preserving users: @uids', array('@uids' => implode(', ', $preserved_users))));

  // Avoid collisions between the Factory and site users when scrubbing.
  $connection->update('users_field_data')
    ->expression('mail', "CONCAT('user', uid, '@', MD5(mail), '.example.com')")
    ->expression('init', "CONCAT('user', uid, '@', MD5(init), '.example.com')")
    ->condition('uid', $preserved_users, 'NOT IN')
    ->execute();

  // Reset the cron key.
  \Drupal::state()->set('system.cron_key', md5(mt_rand()));

  // Reset the drupal private key.
  \Drupal::service('private_key')->set('');

  // Reset the local site data and run acsf-site-sync to fetch factory data
  // about the site.
  $site = AcsfSite::load();
  $site->clean();
  drush_acsf_site_sync();
  drush_log(dt('Executed acsf-site-sync to gather site data from factory and reset all acsf variables.'), 'ok');

  if (\Drupal::moduleHandler()->moduleExists('acsf_sso')) {
    // Repopulate/overwrite the subset of SAML auth data which is factory /
    // sitegroup/env/factory-site-nid specific. Notes:
    // - This indeed also overwrites values which have not changed, since the
    //   site nid did not change - at least not if this is called while staging.
    //   But we want to reuse code without introducing more granularity.)
    // - We don't scrub the users' authmap data; it's fine if they retain the
    //   IDs used in live site-factory communication.
    module_load_include('install', 'acsf_sso');
    acsf_sso_install_set_env_dependent_config();
  }

  // Trigger a rebuild of router paths (formerly 'menu paths').
  \Drupal::service("router.builder")->rebuild();

  // Clear sessions and log tables that might have stale data, and whose
  // implementing classes have no dedicated 'clear()' or equivalent mechanism.
  $truncate_tables = array(
    'sessions',
    'watchdog',
    'acsf_theme_notifications',
  );
  foreach ($truncate_tables as $table) {
    if ($connection->schema()->tableExists($table)) {
      $connection->truncate($table)->execute();
    }
  }

  // Clear caches and key-value store.
  $bins = array(
    'bootstrap',
    'config',
    'data',
    'default',
    'discovery',
    'dynamic_page_cache',
    'entity',
    'menu',
    'migrate',
    'render',
    'rest',
    'toolbar',
  );
  foreach ($bins as $bin) {
    if (\Drupal::hasService("cache.$bin")) {
      \Drupal::cache($bin)->deleteAll();
    }
  }
  $bins = array(
    'form',
    'form_state',
  );
  foreach ($bins as $bin) {
    \Drupal::keyValueExpirable($bin)->deleteAll();
  }

  // Run the sql-sanitize which allows customers to use custom scrubbing. We
  // will handle email addresses and passwords ourselves.
  drush_invoke_process('@self', 'sql-sanitize', array(), array('sanitize-email' => 'no', 'sanitize-password' => 'no'));

  // Mark this database as scrubbed.
  \Drupal::state()->set('acsf_site_scrubbed', 'scrubbed');
}

/**
 * Command callback. Synchronizes data with the Factory.
 *
 * When executed without a --data option, this command will call the Factory to
 * get data. When called with the --data option it will simply digest that data.
 */
function drush_acsf_site_sync() {
  $site = AcsfSite::load();
  $data = drush_get_option('data', NULL);

  // Create an event to gather site stats to send to the Factory.
  $context = array();
  $event = AcsfEvent::create('acsf_stats', $context);
  $event->run();
  $stats = $event->context;

  if ($data) {
    // If data was sent, we can consume it here. Ensure that we are always
    // passing associative arrays here, not objects.
    $site_info = json_decode(base64_decode($data), TRUE);
    if (!empty($site_info) && is_array($site_info)) {
      // Allow other modules to consume the data.
      $context = $site_info;
      $event = AcsfEvent::create('acsf_site_data_receive', $context);
      $event->run();

      // For debugging purpose to be able to tell if the data has been pulled
      // or pushed.
      $site->last_sf_push = time();
      $site->saveSiteInfo($site_info['sf_site']);
    }
  }
  else {
    // If no data was sent, we'll request it.
    $site->refresh($stats);
  }
}

/**
 * Command callback. Prints factory information.
 */
function drush_acsf_get_factory_creds() {
  if (!class_exists('\Drupal\acsf\AcsfConfigDefault')) {
    // Since there might not be a bootstrap, we need to find our config objects.
    $include_path = realpath(dirname(__FILE__));
    require_once $include_path . '/src/AcsfConfig.php';
    require_once $include_path . '/src/AcsfConfigDefault.php';
    require_once $include_path . '/src/AcsfConfigIncompleteException.php';
    require_once $include_path . '/src/AcsfConfigMissingCredsException.php';
  }

  try {
    $config = new AcsfConfigDefault();
  }
  catch (\Exception $e) {
    drush_set_error('Failed to get config: ' . $e->getMessage());
    exit(1);
  }
  $creds = array(
    'url' => $config->getUrl(),
    'username' => $config->getUsername(),
    'password' => $config->getPassword(),
    'url_suffix' => $config->getUrlSuffix(),
  );

  $output = drush_format($creds, NULL, 'json');
  if (drush_get_context('DRUSH_PIPE')) {
    drush_print_pipe($output);
  }
  else {
    drush_print($output);
  }

}

/**
 * Command callback. Puts a site into maintenance.
 */
function drush_acsf_go_offline() {
  $lock = \Drupal::lock();

  // For now hard-code a 10 minute expected offline time.
  $expected = time() + 10 * 60;

  \Drupal::state()->set('system.maintenance_mode', TRUE);
  \Drupal::configFactory()->getEditable('acsf.settings')->set('maintenance_time', $expected)->save();

  // Get the cron lock to prevent cron from running during an update.
  // Use a large lock timeout because an update can take a long time.
  // All cron processes are stopped before update begins, so the lock will
  // be available.
  $lock->acquire('cron', 1200.0);
}

/**
 * Runs after a go-offline command executes. Verifies maintenance mode.
 */
function drush_acsf_post_go_offline() {
  $offline = \Drupal::state()->get('system.maintenance_mode');
  if ($offline) {
    drush_log('Site has been placed offline.', 'success');
  }
  else {
    drush_log('Site has not been placed offline.', 'error');
  }
}

/**
 * Command callback. Takes a site out of maintenance.
 */
function drush_acsf_go_online() {
  $lock = \Drupal::lock();

  // Determine whether the user intended the site to be in maintenance mode.
  $content = \Drupal::config('acsf.settings')->get('site_owner_maintenance_mode');

  // Clearing maintenance mode.
  \Drupal::state()->set('system.maintenance_mode', FALSE);
  \Drupal::configFactory()->getEditable('acsf.settings')->set('maintenance_time', 0)->save();

  if (!empty($content)) {
    \Drupal::state()->set('system.maintenance_mode', TRUE);
  }

  // Release cron lock.
  $lock->release('cron');
}

/**
 * Runs after a go-online command executes. Verifies maintenance mode.
 */
function drush_acsf_post_go_online() {
  $content = \Drupal::state()->get('system.maintenance_mode');
  if (empty($content)) {
    drush_log('Site has been placed online.', 'success');
  }
  else {
    $content = \Drupal::config('acsf.settings')->get('site_owner_maintenance_mode');
    if (empty($content)) {
      drush_log('Site has not been placed online.', 'error');
    }
    else {
      drush_log('Site has been left offline as set by the site owner.', 'success');
    }
  }
}

/**
 * Command callback. Reports process completion back to the factory.
 */
function drush_acsf_report_complete_async_process() {
  $data = unserialize(drush_get_option('data', NULL));

  if (empty($data->callback) || empty($data->object_id) || empty($data->acsf_path)) {
    drush_set_error('Data error', dt('Requires serialized object in --data argument with $data->callback and $data->object_id populated.'));
    exit(1);
  }

  // Since this does not bootstrap drupal fully, we need to manually require the
  // classes necessary to send a message to the Factory.
  require_once $data->acsf_path . '/src/AcsfConfig.php';
  require_once $data->acsf_path . '/src/AcsfConfigDefault.php';
  require_once $data->acsf_path . '/src/AcsfConfigIncompleteException.php';
  require_once $data->acsf_path . '/src/AcsfConfigMissingCredsException.php';
  require_once $data->acsf_path . '/src/AcsfMessage.php';
  require_once $data->acsf_path . '/src/AcsfMessageEmptyResponseException.php';
  require_once $data->acsf_path . '/src/AcsfMessageFailedResponseException.php';
  require_once $data->acsf_path . '/src/AcsfMessageFailureException.php';
  require_once $data->acsf_path . '/src/AcsfMessageMalformedResponseException.php';
  require_once $data->acsf_path . '/src/AcsfMessageRest.php';
  require_once $data->acsf_path . '/src/AcsfMessageResponse.php';
  require_once $data->acsf_path . '/src/AcsfMessageResponseRest.php';

  $arguments = array(
    'wid' => $data->object_id,
    'signal' => 1,
    'state' => isset($data->state) ? $data->state : NULL,
    'data' => $data,
  );

  try {
    // We do not have a Drupal bootstrap at this point, so we need to use
    // AcsfConfigDefault to obtain the shared credentials.
    $config = new AcsfConfigDefault();
    $message = new AcsfMessageRest('POST', $data->callback, $arguments, $config);
    $message->send();
  }
  catch (AcsfMessageFailedResponseException $e) {
    syslog(LOG_ERR, 'Unable to contact the factory via AcsfMessage.');
  }
}

/**
 * Command callback. Fetches the version of the acsf moduleset.
 */
function drush_acsf_version_get($path = NULL) {
  if (empty($path)) {
    $path = __DIR__;
  }
  $version = '0.0';
  $acsf_file_path = rtrim($path, '/') . '/acsf.info.yml';
  if (file_exists($acsf_file_path)) {
    $info_parser = new InfoParser();
    $info = $info_parser->parse($acsf_file_path);
    $version = isset($info['acsf_version']) ? $info['acsf_version'] : '0.1';
  }
  drush_print($version);
}

/**
 * Command callback. Fetches the last installation task.
 */
function drush_acsf_install_task_get() {
  try {
    $task = \Drupal::state()->get('install_task');
  }
  catch (\Exception $e) {
    // Do not trigger an error if the database query fails, since the database
    // might not be set up yet.
  }
  if (isset($task)) {
    return json_encode($task);
  }
}

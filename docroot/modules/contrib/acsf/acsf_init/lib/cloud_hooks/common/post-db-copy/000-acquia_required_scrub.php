#!/usr/bin/env php
<?php

/**
 * @file
 * Scrubs a site after its database has been copied.
 *
 * This happens on staging, not on site duplication.
 */

use Drupal\Component\FileCache\FileCacheFactory;
use Drupal\Core\Database\Database;
use Drupal\Core\Extension\ExtensionDiscovery;
use Drupal\Core\Site\Settings;

if (empty($argv[3])) {
  echo "Error: Not enough arguments.\n";
  exit(1);
}

$site    = $argv[1]; // AH site group.
$env     = $argv[2]; // AH site env.
$db_role = $argv[3]; // Database name.

$docroot = sprintf('/var/www/html/%s.%s/docroot', $site, $env);

fwrite(STDERR, sprintf("Scrubbing site database: site: %s; env: %s; db_role: %s;\n", $site, $env, $db_role));

// For running the acsf-site-scrub command, we need to know the (new) hostname,
// which is derived from:
// - site name, retrieved from the database;
// - url suffix, retrieved using drush acsf-get-factory-creds.
// For running the latter, we need to know the location of the acsf module.

// Get a database connection.
require dirname(__FILE__) . '/../../acquia/db_connect.php';
$con = get_db($site, $env, $db_role);

// Get the site name from the database.
$result = execute_query($con, "SELECT value FROM acsf_variables WHERE name = 'acsf_site_info'");
if ($result === FALSE || !isset($result[0]['value'])) {
  error('Could not retrieve the site name from the database.');
}
else {
  $site_info = unserialize($result[0]['value']);
  $site_name = $site_info['site_name'];
}
fwrite(STDERR, "Site name: $site_name;\n");

mysqli_close($con);

// Find the location of the ACSF module.
$profile_name = _acsf_scrub_boot_and_get_install_profile($docroot, $site, $env, $db_role);
$acsf_location = _acsf_scrub_get_acsf_module_location($docroot, $profile_name);
fwrite(STDERR, "ACSF location: $acsf_location;\n");

// Get the Factory creds using acsf-get-factory-creds.
$command = sprintf(
  'AH_SITE_GROUP=%s AH_SITE_ENVIRONMENT=%s \drush8 -r %s -i %s acsf-get-factory-creds --pipe',
  escapeshellarg($site),
  escapeshellarg($env),
  escapeshellarg($docroot),
  escapeshellarg($acsf_location)
);
fwrite(STDERR, "Executing: $command;\n");
$creds = json_decode(trim(shell_exec($command)));

// Get the domain suffix for hosted sites, from factory creds data. This must
// be present on staged environments, but is not on the production environment.
$url_suffix = $creds->url_suffix;
if (empty($url_suffix)) {
  error("Could not retrieve hosted sites' domain suffix.");
}

// Create a new standard domain name.
$new_domain = "$site_name.$url_suffix";

// Create a cache directory for drush.
$cache_directory = sprintf('/mnt/tmp/%s.%s/drush_tmp_cache/%s', $site, $env, md5($new_domain));
shell_exec(sprintf('mkdir -p %s', escapeshellarg($cache_directory)));

// Execute the scrub.
$command = sprintf(
  'CACHE_PREFIX=%s \drush8 -r %s -l %s -y acsf-site-scrub',
  escapeshellarg($cache_directory),
  escapeshellarg($docroot),
  escapeshellarg($new_domain)
);
fwrite(STDERR, "Executing: $command;\n");

$result = 0;
$output = array();
exec($command, $output, $result);
print join("\n", $output);

// Clean up the drush cache directory.
shell_exec(sprintf('rm -rf %s', escapeshellarg($cache_directory)));

if ($result) {
  fwrite(STDERR, "Command execution returned status code: $result!\n");
  exit($result);
}

/**
 * Get the Drupal install profile.
 */
function _acsf_scrub_boot_and_get_install_profile($docroot, $site, $env, $db_role) {
  // Boot just enough DrupalKernel. Two reasons why we can't just call
  // $kernel->handle($request) like web requests do:
  // - we don't have a request object
  // - $kernel->initializeSettings() -> Settings::initialize() includes
  //   settings.php in a way that we cannot get around. We don't want to include
  //   the Acquia Hosting settings.php because it has a lot of dependencies
  //   (a.o. on $_REQUEST variables).
  require_once "$docroot/autoload.php";
  require_once "$docroot/core/includes/bootstrap.inc";

  // drupal_get_profile() needs database settings initialized (as of D8.3.0).
  // Get credentials from creds.json instead of settings.php.
  $cred_file = "/var/www/site-php/{$site}.{$env}/creds.json";
  if (file_exists($cred_file) && is_readable($cred_file)) {
    $json = file_get_contents($cred_file);
    $cred_decoded = json_decode($json, TRUE);
    if (isset($cred_decoded['databases'][$db_role]['db_url_ha']) && is_array($cred_decoded['databases'][$db_role]['db_url_ha'])) {
      $db_uri = reset($cred_decoded['databases'][$db_role]['db_url_ha']);
      $db_array = Database::convertDbUrlToConnectionInfo($db_uri, $docroot);
      // Hosting stores the connection data in the "old" style, like mysqli://...
      // which isn't available in D8.
      if ($db_array['driver'] === 'mysqli') {
        $db_array['driver'] = 'mysql';
      }
      $databases = ['default' => ['default' => $db_array]];
      Database::setMultipleConnectionInfo($databases);
    }
    else {
      error('Could not find the database settings.');
    }
  }
  else {
    error('Could not read the credential file.');
  }
  // Free up memory.
  unset($json);
  unset($cred_decoded);

  // drupal_get_profile() should keep being used for as long as its backward
  // compatibility layer (a.k.a. the code from 8.2.x) is still used.
  return drupal_get_profile();
}

/**
 * Find the location of the ACSF module.
 */
function _acsf_scrub_get_acsf_module_location($docroot, $profile_name) {
  // For discovering where a module is, we need ExtensionDiscovery, which also
  // needs a FileCacheFactory with a nonempty prefix set, otherwise it throws a
  // fatal error. Below is the usual D8 code, even though it probably doesn't
  // matter which prefix we set.
  FileCacheFactory::setPrefix(Settings::getApcuPrefix('file_cache', $docroot));

  $listing = new ExtensionDiscovery($docroot);
  // We need a two-stage scan (gleaned from DrupalKernel::moduleData()):
  if ($profile_name) {
    // The module could be inside the profile subtree, so we need to locate the
    // profile directory. (We can't use drupal_get_path() for this because:
    // - we don't have the container booted so drupal_get_filename() will return
    //   an empty string;
    // - besides, we should not ask another cache -which could be empty- for a
    //   file location. WE are the discovery method so WE should find the path.)
    $listing->setProfileDirectories([]);
    $profiles = $listing->scan('profile', FALSE);
    if (isset($profiles[$profile_name])) {
      // Scan this one profile directory in addition to other module dirs.
      $listing->setProfileDirectories([$profiles[$profile_name]->getPath()]);
    }
  }
  // Now find modules.
  $module_data = $listing->scan('module', FALSE);
  if (empty($module_data['acsf'])) {
    error('Could not locate the ACSF module.');
  }

  return "$docroot/" . $module_data['acsf']->getPath();
}

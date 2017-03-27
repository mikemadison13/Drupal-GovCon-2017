#!/usr/bin/env php
<?php

/**
 * @file
 * Scrubs a site after its database has been copied.
 *
 * This happens on staging, not on site duplication.
 */

use Drupal\Component\FileCache\FileCacheFactory;
use Drupal\Core\Site\Settings;
use Drupal\Core\Extension\ExtensionDiscovery;

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
$link = get_db($site, $env, $db_role);

// Get the site name from the database.
$result = database_query_result("SELECT value FROM acsf_variables WHERE name = 'acsf_site_info'");
$site_info = unserialize($result);
$site_name = $site_info['site_name'];
if (empty($site_name)) {
  error('Could not retrieve the site name from the database.');
}
fwrite(STDERR, "Site name: $site_name;\n");

mysql_close($link);

// Discover module locations using standard class, but without fully
// bootstrapping Drupal.
require "$docroot/autoload.php";
require_once "$docroot/core/includes/bootstrap.inc";
// ExtensionDiscovery needs a FileCacheFactory with a nonempty prefix set,
// otherwise it throws a fatal error. Below is the usual D8 code, even though it
// probably doesn't matter which prefix we set.
FileCacheFactory::setPrefix(Settings::getApcuPrefix('file_cache', $docroot));
$discovery = new ExtensionDiscovery($docroot);
$module_data = $discovery->scan('module', FALSE);
if (empty($module_data['acsf'])) {
  // getModule() will throw an exception if not found. We know the message.
  error('Could not locate the ACSF module.');
}
$acsf_location = "$docroot/" . $module_data['acsf']->getPath();
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

function database_query_result($query) {
  $result = mysql_query($query);
  if (!$result) {
    error('Query failed: ' . $query);
  }
  return mysql_result($result, 0);
}

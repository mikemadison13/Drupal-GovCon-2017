<?php

/**
 * @file
 * For a single database configuration, the following is sufficient:.
 **/
$databases = array(
  'default' =>
    array(
      'default' =>
        array(
          'database' => 'drupal',
          'username' => 'drupal',
          'password' => 'drupal',
          'host' => 'localhost',
          'port' => '3306',
          'driver' => 'mysql',
          'prefix' => '',
        ),
    ),
);

$base_url = 'http://local.drupalgovcon.org';

$conf['stage_file_proxy_origin'] = '';

// Disable shield locally.
$conf['shield_pass'] = '';
$conf['shield_user'] = '';

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

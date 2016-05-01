<?php
/**
 * @file
 * dgc_navigation.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function dgc_navigation_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

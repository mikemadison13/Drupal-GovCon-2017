<?php
/**
 * @file
 * dgc_file_entity_additions.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function dgc_file_entity_additions_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

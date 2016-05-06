<?php
/**
 * @file
 * dgc_deploy_prod.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function dgc_deploy_prod_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

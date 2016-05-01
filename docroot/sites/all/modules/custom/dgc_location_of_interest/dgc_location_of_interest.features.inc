<?php
/**
 * @file
 * dgc_location_of_interest.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function dgc_location_of_interest_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function dgc_location_of_interest_node_info() {
  $items = array(
    'location_of_interest' => array(
      'name' => t('Location of Interest'),
      'base' => 'node_content',
      'description' => t('Use to create items of interest that will display on the venue map.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}

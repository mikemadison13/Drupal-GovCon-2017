<?php
/**
 * @file
 * dgc_banner_image_content.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function dgc_banner_image_content_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function dgc_banner_image_content_node_info() {
  $items = array(
    'banner_image' => array(
      'name' => t('Banner Image'),
      'base' => 'node_content',
      'description' => t('Use this to create banner images to display on the page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}

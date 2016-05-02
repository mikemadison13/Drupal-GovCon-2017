<?php
/**
 * @file
 * cod_email.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function cod_email_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "page_manager" && $api == "pages_default") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_eck_entity_type_info().
 */
function cod_email_eck_entity_type_info() {
  $items = array(
    'cod_email' => array(
      'name' => 'cod_email',
      'label' => 'cod_email',
      'properties' => array(
        'created' => array(
          'label' => 'Created',
          'type' => 'integer',
          'behavior' => 'created',
        ),
        'changed' => array(
          'label' => 'Changed',
          'type' => 'integer',
          'behavior' => 'changed',
        ),
        'language' => array(
          'label' => 'Entity language',
          'type' => 'language',
          'behavior' => 'language',
        ),
      ),
    ),
  );
  return $items;
}

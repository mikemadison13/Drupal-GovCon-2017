<?php
/**
 * @file
 * cod_basic_page.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function cod_basic_page_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_page_type'.
  $field_bases['field_page_type'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_page_type',
    'field_permissions' => array(
      'type' => 1,
    ),
    'indexes' => array(
      'format' => array(
        0 => 'format',
      ),
    ),
    'locked' => 0,
    'module' => 'text',
    'settings' => array(
      'max_length' => 255,
    ),
    'translatable' => 0,
    'type' => 'text',
  );

  return $field_bases;
}

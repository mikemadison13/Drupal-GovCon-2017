<?php
/**
 * @file
 * dgc_extras.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function dgc_extras_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_government_employee'.
  $field_bases['field_government_employee'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_government_employee',
    'field_permissions' => array(
      'type' => 0,
    ),
    'indexes' => array(
      'value' => array(
        0 => 'value',
      ),
    ),
    'locked' => 0,
    'module' => 'list',
    'settings' => array(
      'allowed_values' => array(
        0 => 'No',
        1 => 'Yes',
      ),
      'allowed_values_function' => '',
    ),
    'translatable' => 0,
    'type' => 'list_boolean',
  );

  return $field_bases;
}

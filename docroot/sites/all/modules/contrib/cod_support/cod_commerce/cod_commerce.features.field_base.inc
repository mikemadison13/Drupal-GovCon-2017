<?php
/**
 * @file
 * cod_commerce.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function cod_commerce_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_conference_currency'.
  $field_bases['field_conference_currency'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_conference_currency',
    'field_permissions' => array(
      'type' => 1,
    ),
    'indexes' => array(
      'currency_code' => array(
        0 => 'currency_code',
      ),
    ),
    'locked' => 0,
    'module' => 'commerce_currency',
    'settings' => array(),
    'translatable' => 0,
    'type' => 'commerce_currency',
  );

  return $field_bases;
}

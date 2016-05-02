<?php
/**
 * @file
 * cod_billy.features.inc
 */

/**
 * Implements hook_eck_bundle_info().
 */
function cod_billy_eck_bundle_info() {
  $items = array(
    'cod_commerce_billy_cod_commerce_billy' => array(
      'machine_name' => 'cod_commerce_billy_cod_commerce_billy',
      'entity_type' => 'cod_commerce_billy',
      'name' => 'cod_commerce_billy',
      'label' => 'cod_commerce_billy',
      'config' => array(),
    ),
    'cod_email_billy' => array(
      'machine_name' => 'cod_email_billy',
      'entity_type' => 'cod_email',
      'name' => 'billy',
      'label' => 'Order Notification Email',
      'config' => array(
        'managed_properties' => array(
          'created' => 0,
          'changed' => 0,
          'language' => 0,
        ),
      ),
    ),
    'cod_email_invoice_reminder' => array(
      'machine_name' => 'cod_email_invoice_reminder',
      'entity_type' => 'cod_email',
      'name' => 'invoice_reminder',
      'label' => 'Invoice Reminder Email',
      'config' => array(
        'managed_properties' => array(
          'created' => 0,
          'changed' => 0,
          'language' => 0,
        ),
      ),
    ),
  );
  return $items;
}

/**
 * Implements hook_eck_entity_type_info().
 */
function cod_billy_eck_entity_type_info() {
  $items = array(
    'cod_commerce_billy' => array(
      'name' => 'cod_commerce_billy',
      'label' => 'cod_commerce_billy',
      'properties' => array(
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

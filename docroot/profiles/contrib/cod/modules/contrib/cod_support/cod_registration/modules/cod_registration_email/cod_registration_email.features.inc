<?php
/**
 * @file
 * cod_registration_email.features.inc
 */

/**
 * Implements hook_eck_bundle_info().
 */
function cod_registration_email_eck_bundle_info() {
  $items = array(
    'cod_email_ticket_cancelled' => array(
      'machine_name' => 'cod_email_ticket_cancelled',
      'entity_type' => 'cod_email',
      'name' => 'ticket_cancelled',
      'label' => 'Ticket cancelled - owner',
      'config' => array(
        'managed_properties' => array(
          'language' => 'language',
          'created' => 0,
          'changed' => 0,
        ),
      ),
    ),
    'cod_email_ticket_cancelled_attendee' => array(
      'machine_name' => 'cod_email_ticket_cancelled_attendee',
      'entity_type' => 'cod_email',
      'name' => 'ticket_cancelled_attendee',
      'label' => 'Ticket cancelled - attendee',
      'config' => array(
        'managed_properties' => array(
          'language' => 'language',
          'created' => 0,
          'changed' => 0,
        ),
      ),
    ),
    'cod_email_ticket_code' => array(
      'machine_name' => 'cod_email_ticket_code',
      'entity_type' => 'cod_email',
      'name' => 'ticket_code',
      'label' => 'Send Ticket Code Email',
      'config' => array(
        'managed_properties' => array(
          'created' => 0,
          'changed' => 0,
          'language' => 0,
        ),
      ),
    ),
    'cod_email_ticket_redeemed' => array(
      'machine_name' => 'cod_email_ticket_redeemed',
      'entity_type' => 'cod_email',
      'name' => 'ticket_redeemed',
      'label' => 'Ticket Redeemed Email',
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

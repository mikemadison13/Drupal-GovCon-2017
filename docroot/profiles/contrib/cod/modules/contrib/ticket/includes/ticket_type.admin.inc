<?php
/**
 * @file
 * Ticket type admin file.
 */

/**
 * Admin form.
 */
function ticket_admin_form($form, &$form_state) {
  // There are currently no sitewide settings. We only needed a page to
  // attach the field ui tabs. Insert some placeholder information on
  // this page.
  $form['information'] = array(
    '#markup' => t('<p>Use the Manage Fields tab to add custom ticket type fields. These fields will be available to users who manage ticket types on entities (i.e. event creators/editors).</p><p>Use the Manage Display tab to customize which ticket type fields are visible to users who will be viewing the ticketed entities and registering for tickets.</p>'),
  );

  return system_settings_form($form);
}

/*
 * Retrieve a ticket type edit for a particular ticket type
 * Currently this function requires a node for a parent entity.
 * TODO: Allow editing ticket types on any entity. Currently restricted to nodes.
 */
function ticket_type_edit_form($form, &$form_state, $ticket_type, $host = NULL) {
  module_load_include('inc', 'node', 'node.pages');
  // Get the entity owner for the ticket_type
  // If host is set, we're adding a new ticket, mock a dummy ticket type.
  if (isset($host)) {
    $op = t('Add');
    $entity = $host;
    $entity_type = 'node';
  }
  else {
    $op = t('Edit');
    $entity_type = $ticket_type->entity_type;
    $entities = entity_load($entity_type, array($ticket_type->entity_id));
    $entity = array_shift($entities);
  }
  $langcode = $entity->language;

  $form = array();

  field_attach_form($entity_type, $entity, $form, $form_state, $langcode, array('field_name' => $ticket_type->field_name));

  // Sort through the items and grab the delta the represents the ttid value.
  // PHP 5.5+ has a more elegant fix for this.
  $items = field_get_items($entity_type, $entity,$ticket_type->field_name, $entity->language);

  foreach ($items AS $delta => $value) {
    if ($ticket_type->ttid === NULL) {
      $form[$ticket_type->field_name][$langcode][$delta]['#access'] = FALSE;
    }
    else if ($value['value'] != $ticket_type->ttid) {
      // Remove the other tickets from rendering or being saved later.
      // TODO: loading these tickets then unsetting is bad for performance on
      //       edit for large amounts of tickets. We should change that...
      $form[$ticket_type->field_name][$langcode][$delta]['#access'] = FALSE;
    }
    else {
      // This isn't a multiple value form right now
      $form[$ticket_type->field_name][$langcode][$delta]['_weight']['#access'] = FALSE;
      $field_delta = $delta;
    }
  }

  // Set the field delta to the 'add another' ticket.
  if ($ticket_type->ttid === NULL) {
    $delta++;
    $field_delta = $delta;
    unset($form[$ticket_type->field_name][$langcode][$field_delta]['remove_button']);
  }
  // Remove the 'add another' items
  else {
    $form[$ticket_type->field_name][$langcode]['#max_delta'] = $delta;
    // Move to the add another delta.
    $delta++;
    unset($form[$ticket_type->field_name][$langcode][$delta]);
    unset($form[$ticket_type->field_name][$langcode][$field_delta]['remove_button']['#ajax']);
  }

  unset($form[$ticket_type->field_name][$langcode]['add_more']);
  unset($form[$ticket_type->field_name][$langcode]['#prefix']);
  unset($form[$ticket_type->field_name][$langcode]['#suffix']);

  // Change the theme to not be a multiple field value form.
  unset($form[$ticket_type->field_name][$langcode]['#theme']);

  // Redirect module tends to inject itself badly. Remove it from the form.
  if (isset($form['redirect'])) {
    unset($form['redirect']);
  }

  // Set the main title
  drupal_set_title($op . " " . ticket_type_label($ticket_type));

  /*
   * Add node attachment functionality. This eventually needs to be removed.
   */
  $form['#node'] = $entity;
  $form_state['node'] = $entity;

  // Move the 'remove' button
  // General submit button.
  $form[$ticket_type->field_name][$langcode][$field_delta]['submit'] = array(
    '#type' => 'submit',
    '#value' => t('!op Ticket', array('!op' => $op)),
    '#weight' => 1000,
    '#submit' => array('ticket_type_edit_form_submit', 'node_form_submit'),
  );

  $form['delta'] = array(
    '#type' => 'value',
    '#value' => $field_delta,
  );

  // Save the field delta
  $form_state['field_delta'] = $field_delta;

  return $form;
}

function ticket_type_edit_form_submit($form, &$form_state) {
  // Load the node_form_submit callback.
  module_load_include('inc', 'node', 'node.pages');
}

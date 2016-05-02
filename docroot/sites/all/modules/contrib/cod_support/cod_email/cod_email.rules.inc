<?php

/**
 * Implements hook_rules_action_info()
 */
function cod_email_rules_action_info() {
  return array(
    'cod_email_send_mail' => array(
      'label' => t('Send (COD) Email'),
      'group' => t('Commerce'),
      'parameter' => array(
        'to' => array(
          'type' => 'text',
          'label' => t('To'),
          'description' => t('The e-mail address or addresses where the message will be sent to. The formatting of this string must comply with RFC 2822.'),
        ),
        'conference' => array('type' => 'node', 'label' => t('Conference')),
        'cod_email_type' => array(
          'type' => 'text',
          'label' => t('Email Type'),
          'description' => t('Select an email template.'),
          'options list' => 'cod_email_template_options',
          'restriction' => 'input',
        ),
      ),
      'base' => 'cod_email_send_mail',
      'access callback' => 'rules_system_integration_access',
    ),
  );
}

// A helper function to provide us with a list of algorithms
function cod_email_template_options() {
  $entity_type = EntityType::loadByName('cod_email');

  $bundles = Bundle::loadByEntityType($entity_type);
  usort($bundles, 'eck_alphabetical_cmp');

  $email_types = array();

  foreach($bundles AS $bundle) {
    $email_types[$bundle->name] = $bundle->label;
  }

  return $email_types;
}

function cod_email_rules_evaluator_info() {
  return array(
    'token' => array(
      'class' => 'RulesTokenEvaluator',
      'type' => array('text', 'uri'),
      'weight' => 0,
     ),
  );
}
<?php
/**
 * This plugin array is more or less self documenting
 */
$plugin = array(
  'title' => t('Email Entity Forms'),
  'single' => TRUE,
  'category' => array(t('Conference Organizing'), -9),
  'render callback' => 'cod_email_entity_forms_pane_render'
);

function cod_email_entity_forms_pane_render($subtype, $conf, $context = NULL) {
  $block = new stdClass();
  list($conference, $bundle) = array_pad($context, 2, NULL);

  // If no bundle is being shown, show helper text for sidebar.
  if (empty($bundle)) {
    $block->title = t('Conference E-mail Templates');
    $block->content = t('Select an email to edit.');
    return $block;
  }

  // TODO: Should load the bundle context in a context handler
  $entity_type = 'cod_email';
  $bundle = Bundle::loadByMachineName($entity_type .'_' . $bundle);

  if (empty($bundle)) {
    watchdog('error', 'Error loading bundles. Check the cod_email feature.');
    return;
  }

  $entity_type = 'cod_email';
  // First, check to see if a configuration entity exists
  $query = new EntityFieldQuery();
  $config = $query->entityCondition('entity_type', $entity_type)
    ->entityCondition('bundle', $bundle->name)
    ->fieldCondition('og_group_ref', 'target_id', $conference)
    ->range(0, 1)
    ->execute();

  // Found a config! load it.
   if (isset($config[$entity_type])) {
     $config_ids = array_keys($config[$entity_type]);
     $email_configs = entity_load($entity_type, $config_ids);
     $email_config = array_shift($email_configs);
     $email_config->og_group_ref[LANGUAGE_NONE][0]['target_id'] = $conference;
     $form = drupal_get_form("eck__entity__form_add_{$entity_type}_{$bundle->name}", $email_config);
   }
   // No config found, make a new entity.
  else {
    $email_config = entity_create($entity_type, array('type' => $bundle->name));
    $email_config->og_group_ref[LANGUAGE_NONE][0]['target_id'] = $conference;
    $form = drupal_get_form("eck__entity__form_edit_{$entity_type}_{$bundle->name}", $email_config);
  }
  // Hide URL redirects
  if (isset($form['redirect'])) {
    $form['redirect']['#access'] = FALSE;
  }

  $block->content = $form;
  return $block;
}
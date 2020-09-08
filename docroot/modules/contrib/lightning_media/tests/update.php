<?php

/**
 * @file
 * Prepares a fixture to run updates.
 *
 * Forcibly uninstalls Lightning Dev, switches the current installation profile
 * from Standard to Minimal, and deletes defunct config objects.
 */

Drupal::entityTypeManager()->clearCachedDefinitions();

Drupal::configFactory()
  ->getEditable('core.extension')
  ->clear('module.lightning_dev')
  // Uninstall Lightning Page so it can be correctly reinstalled during Behat
  // tests in FixtureContext::setUp().
  ->clear('module.lightning_page')
  ->clear('module.standard')
  ->set('module.minimal', 1000)
  ->set('profile', 'minimal')
  ->save();

Drupal::keyValue('system.schema')->deleteMultiple(['lightning_dev']);

Drupal::configFactory()->getEditable('lightning_api.settings')->delete();

Drupal::configFactory()
  ->getEditable('core.base_field_override.node.page.promote')
  ->delete();

Drupal::configFactory()
  ->getEditable('core.base_field_override.node.page.status')
  ->delete();

$display_repository = Drupal::service('entity_display.repository');
$display_repository->getFormDisplay('node', 'page')->delete();
$display_repository->getViewDisplay('node', 'page')->delete();
$display_repository->getViewDisplay('node', 'page', 'teaser')->delete();

Drupal::configFactory()->getEditable('field.field.node.page.body')->delete();

Drupal::configFactory()->getEditable('node.type.page')->delete();

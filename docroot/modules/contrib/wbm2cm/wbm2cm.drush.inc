<?php

/**
 * Implements hook_drush_command().
 */
function wbm2cm_drush_command() {
  return [
    'wbm2cm-migrate' => [
      'description' => 'Migrates your site from Workbench Moderation to Content Moderation.',
    ],
  ];
}

function drush_wbm2cm_migrate() {
  /** @var \Drupal\wbm2cm\MigrationController $controller */
  $controller = \Drupal::service('wbm2cm.migration_controller');

  drush_print('Saving existing moderation states to temporary tables...');
  $messages = $controller->executeStepWithMessages('save');
  array_walk($messages, 'drush_print');

  drush_print('Removing Workbench Moderation data...');
  $messages = $controller->executeStepWithMessages('clear');
  array_walk($messages, 'drush_print');

  drush_print('Installing Content Moderation...');
  /** @var \Drupal\Core\Extension\ModuleInstallerInterface $module_installer */
  $module_installer = \Drupal::service('module_installer');
  $module_installer->uninstall(['workbench_moderation']);
  $module_installer->install(['content_moderation']);

  drush_print('Restoring moderation states from temporary tables...');
  $messages = $controller->executeStepWithMessages('restore');
  array_walk($messages, 'drush_print');

  drush_print('Yay! You have been migrated to Content Moderation.');
}

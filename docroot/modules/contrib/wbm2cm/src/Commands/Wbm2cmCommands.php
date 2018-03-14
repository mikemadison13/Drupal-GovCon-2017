<?php

namespace Drupal\wbm2cm\Commands;

use Drupal\Core\Extension\ModuleInstallerInterface;
use Drupal\wbm2cm\MigrationController;
use Drush\Commands\DrushCommands;

class Wbm2cmCommands extends DrushCommands {

  /**
   * The migration controller service.
   *
   * @var \Drupal\wbm2cm\MigrationController
   */
  protected $controller;

  /**
   * The module installer service.
   *
   * @var \Drupal\Core\Extension\ModuleInstallerInterface
   */
  protected $moduleInstaller;

  /**
   * Wbm2cmCommands constructor.
   *
   * @param \Drupal\wbm2cm\MigrationController $controller
   *   The migration controller service.
   * @param \Drupal\Core\Extension\ModuleInstallerInterface $module_installer
   *   The module installer service.
   */
  public function __construct(MigrationController $controller, ModuleInstallerInterface $module_installer) {
    $this->controller = $controller;
    $this->moduleInstaller = $module_installer;
  }

  /**
   * Migrates from Workbench Moderation to Content Moderation.
   *
   * @command wbm2cm:migrate
   * @aliases wbm2cm-migrate
   */
  public function migrate() {
    $out = $this->output();

    $out->writeln('Saving existing moderation states to temporary tables...');
    $messages = $this->controller->executeStepWithMessages('save');
    array_walk($messages, [$out, 'writeln']);

    $out->writeln('Removing Workbench Moderation data...');
    $messages = $this->controller->executeStepWithMessages('clear');
    array_walk($messages, [$out, 'writeln']);

    $out->writeln('Installing Content Moderation...');
    // Module installation or uninstallation modifies the container, and
    // potentially every service in it. We do not want to be holding on to
    // outdated services and their implict dependency trees.
    $this->moduleInstaller->uninstall(['workbench_moderation']);
    if (\Drupal::hasContainer()) {
      $this->controller = $this->reloadService($this->controller);
      $this->moduleInstaller = $this->reloadService($this->moduleInstaller);
    }
    $this->moduleInstaller->install(['content_moderation']);

    $out->writeln('Restoring moderation states from temporary tables...');
    $messages = $this->controller->executeStepWithMessages('restore');
    array_walk($messages, [$out, 'writeln']);

    $out->writeln('Yay! You have been migrated to Content Moderation.');
  }

  protected function reloadService($service) {
    return \Drupal::service($service->_serviceId);
  }

}

<?php

namespace Drupal\Tests\lightning_media\Traits;

/**
 * Provides methods to install and uninstall extensions in tests.
 */
trait ExtensionTrait {

  /**
   * Installs a module.
   *
   * @param string $module
   *   The name of the module to install.
   */
  protected function installModule($module) {
    $this->container->get('module_installer')->install([$module]);
    $this->container = $this->container->get('kernel')->getContainer();
  }

  /**
   * Uninstalls a module.
   *
   * @param string $module
   *   The name of the module to uninstall.
   */
  protected function uninstallModule($module) {
    $this->container->get('module_installer')->uninstall([$module]);
    $this->container = $this->container->get('kernel')->getContainer();
  }

}

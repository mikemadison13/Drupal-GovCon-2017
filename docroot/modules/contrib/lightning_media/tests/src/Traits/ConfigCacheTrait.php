<?php

namespace Drupal\Tests\lightning_media\Traits;

use Drupal\Core\Config\Config;
use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides methods for changing config in a test and restoring it afterwards.
 */
trait ConfigCacheTrait {

  /**
   * Raw config data to be restored at the end of the test, keyed by ID.
   *
   * @var array[]
   */
  private $config = [];

  /**
   * Caches raw config data to be restored at the end of the test.
   *
   * @param string|ConfigEntityInterface|Config $config
   *   The config to be cached. Can be a simple config object, a config entity,
   *   or a config ID.
   */
  protected function cacheConfig($config) {
    if ($config instanceof Config) {
      $key = $config->getName();
      $this->config[$key] = $config->getRawData();
    }
    else {
      $id = $config instanceof ConfigEntityInterface
        ? $config->getConfigDependencyName()
        : $config;

      $this->config[$id] = $this->container->get('config.factory')
        ->get($id)
        ->getRawData();
    }
  }

  /**
   * Restores config cached during the test.
   */
  protected function restoreConfig() {
    foreach ($this->config as $id => $data) {
      $this->container->get('config.factory')
        ->getEditable($id)
        ->setData($data)
        ->save(TRUE);
    }
    $this->config = [];
  }

}

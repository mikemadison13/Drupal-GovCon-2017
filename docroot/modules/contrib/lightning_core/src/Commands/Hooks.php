<?php

namespace Drupal\lightning_core\Commands;

use Drupal\Core\Plugin\CachedDiscoveryClearerInterface;
use Drush\Commands\DrushCommands;

/**
 * Implements Drush command hooks.
 */
class Hooks extends DrushCommands {

  /**
   * The plugin cache clearer service.
   *
   * @var \Drupal\Core\Plugin\CachedDiscoveryClearerInterface
   */
  protected $pluginCacheClearer;

  /**
   * Hooks constructor.
   *
   * @param \Drupal\Core\Plugin\CachedDiscoveryClearerInterface $plugin_cache_clearer
   *   The plugin cache clearer service.
   */
  public function __construct(CachedDiscoveryClearerInterface $plugin_cache_clearer) {
    $this->pluginCacheClearer = $plugin_cache_clearer;
  }

  /**
   * Clears all plugin discovery caches before database updates begin.
   *
   * A common cause of errors during database updates is update hooks referring
   * to new or changed plugin definitions. Clearing all plugin caches before
   * updates begin ensures that the plugin system always has the latest plugin
   * definitions to work with.
   *
   * @hook pre-command updatedb
   */
  public function preUpdate() {
    $this->pluginCacheClearer->clearCachedDefinitions();
  }

}

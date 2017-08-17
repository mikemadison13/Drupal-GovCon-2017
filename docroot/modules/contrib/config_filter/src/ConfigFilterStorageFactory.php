<?php

namespace Drupal\config_filter;

use Drupal\config_filter\Config\FilteredStorage;
use Drupal\Core\Config\StorageInterface;

/**
 * Class ConfigFilterFactory.
 */
class ConfigFilterStorageFactory {

  /**
   * The decorated sync config storage.
   *
   * @var \Drupal\Core\Config\StorageInterface
   */
  protected $sync;

  /**
   * The plugin manager to load the filters from.
   *
   * @var \Drupal\config_filter\ConfigFilterManagerInterface
   */
  protected $manager;

  /**
   * ConfigFilterFactory constructor.
   *
   * @param \Drupal\Core\Config\StorageInterface $sync
   *   The original sync storage which is decorated by our filtered storage.
   * @param \Drupal\config_filter\ConfigFilterManagerInterface $manager
   *   The ConfigFilter plugin manager.
   */
  public function __construct(StorageInterface $sync, ConfigFilterManagerInterface $manager) {
    $this->sync = $sync;
    $this->manager = $manager;
  }

  /**
   * Get the sync storage Drupal uses.
   *
   * @return \Drupal\config_filter\Config\FilteredStorageInterface
   *   The decorated sync config storage.
   */
  public function getSync() {
    return $this->getFilteredStorage($this->sync, ['config.storage.sync']);
  }

  /**
   * Get a decorated storage with filters applied.
   *
   * @param \Drupal\Core\Config\StorageInterface $storage
   *   The storage to decorate.
   * @param string[] $storage_names
   *   The names of the storage, so the correct filters can be applied.
   * @param string[] $excluded
   *   The ids of filters to exclude.
   *
   * @return \Drupal\config_filter\Config\FilteredStorageInterface
   *   The decorated storage with the filters applied.
   */
  public function getFilteredStorage(StorageInterface $storage, array $storage_names, array $excluded = []) {
    return new FilteredStorage($storage, $this->manager->getFiltersForStorages($storage_names, $excluded));
  }

}

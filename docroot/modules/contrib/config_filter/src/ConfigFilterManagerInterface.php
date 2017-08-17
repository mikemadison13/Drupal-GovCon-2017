<?php

namespace Drupal\config_filter;

use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Config\StorageInterface;

/**
 * Interface ConfigFilterManagerInterface.
 */
interface ConfigFilterManagerInterface extends PluginManagerInterface {

  /**
   * Get the applicable filters for given storage names.
   *
   * @param string[] $storage_names
   *   The names of the storage plugins apply to.
   * @param string[] $excluded
   *   The ids of filters to exclude.
   *
   * @return \Drupal\config_filter\Plugin\ConfigFilterInterface[]
   *   The configured plugin instances.
   */
  public function getFiltersForStorages(array $storage_names, array $excluded = []);

  /**
   * Get a configured filter instance by plugin id.
   *
   * @param string $id
   *   The plugin id of the filter to load.
   *
   * @return \Drupal\config_filter\Plugin\ConfigFilterInterface
   *   The ConfigFilter.
   */
  public function getFilterInstance($id);

  /**
   * Get a decorated storage with filters applied.
   *
   * @param \Drupal\Core\Config\StorageInterface $storage
   *   The storage to decorate.
   * @param string $storage_name
   *   The name of the storage, so the correct filters can be applied.
   * @param string[] $excluded
   *   The ids of filters to exclude.
   *
   * @return \Drupal\config_filter\Config\FilteredStorageInterface
   *   The decorated storage with the filters applied.
   *
   * @deprecated in rc1 and will be removed in 1.0
   */
  public function getFilteredStorage(StorageInterface $storage, $storage_name, array $excluded = []);

  /**
   * Returns a ConfigStorage object working with the sync config directory.
   *
   * @return \Drupal\config_filter\Config\FilteredStorageInterface
   *   The filtered sync storage.
   *
   * @deprecated in rc1 and will be removed in 1.0
   */
  public function getFilteredSyncStorage();

}

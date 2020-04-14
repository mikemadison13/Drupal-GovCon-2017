<?php

namespace Drupal\acsf\Event;

/**
 * Handles the scrubbing of Drupal core state / configuration.
 *
 * Note that 'scrubbing' in our case doesn't mean just clearing configuration
 * values but also initializing them for use in a new website.
 *
 * Anything that is not specifically core or absolutely required by ACSF should
 * live in a separate contrib / distribution specific module. (See e.g.
 * gardens_duplication module in the Gardens distribution.)
 */
class AcsfDuplicationScrubConfigurationHandler extends AcsfEventHandler {

  /**
   * Implements AcsfEventHandler::handle().
   */
  public function handle() {
    drush_print(dt('Entered @class', ['@class' => get_class($this)]));

    // Delete selected state values.
    $variables = [
      // The Acquia Connector module puts the below values in the state system
      // (because it's a general module, not only running on Acquia Hosting
      // infrastructure) but our actual authoritative values are in an include
      // file from Hosting, e.g. D8-<hosting_site>-common-settings.inc:
      // $config['ah_network_key'] and $config['ah_network_identifier']. So we
      // need to clear them here because they are stale after we do a cross-
      // sitegroup duplication. (Hosting/ACE has no method for this because only
      // ACSF ever does cross-sitegroup site copies.)
      'acquia_connector.identifier',
      'acquia_connector.key',
      'node.min_max_update_time',
      'system.cron_last',
      'system.private_key',
    ];
    $state_storage = \Drupal::state();
    foreach ($variables as $name) {
      $state_storage->delete($name);
    }
  }

}

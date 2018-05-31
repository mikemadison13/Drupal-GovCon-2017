<?php

/**
 * @file
 * Contains \Drupal\acsf\Event\AcsfDuplicationScrubTruncateTablesHandler.
 */

namespace Drupal\acsf\Event;

/**
 * Truncates various undesirable Drupal core tables.
 */
class AcsfDuplicationScrubTruncateTablesHandler extends AcsfEventHandler {

  /**
   * Implements AcsfEventHandler::handle().
   */
  public function handle() {
    drush_print(dt('Entered @class', array('@class' => get_class($this))));

    $tables = array();

    // Clear search indexes and associated caches.
    if (\Drupal::moduleHandler()->moduleExists('search')) {
      search_index_clear();
      // search_index_clear() does not truncate the following tables:
      $tables[] = 'search_total';
    }

    $tables[] = 'node_counter';
    $tables[] = 'batch';
    $tables[] = 'queue';
    $tables[] = 'semaphore';
    $tables[] = 'sessions';
    $tables[] = 'themebuilder_session';

    $this->truncateTables($tables);
  }

  /**
   * Truncates database tables.
   *
   * @param array $tables
   *   The list of tables to be truncated.
   */
  public function truncateTables(array $tables = array()) {
    $connection = \Drupal::database();
    foreach ($tables as $table) {
      if ($connection->schema()->tableExists($table)) {
        $connection->truncate($table)->execute();
      }
    }
  }

}

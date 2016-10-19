<?php

/**
 * @file
 * Contains \Drupal\acsf\Event\AcsfDuplicationScrubTemporaryFilesHandler.
 */

namespace Drupal\acsf\Event;

/**
 * Handles the scrubbing of Drupal temporary files.
 */
class AcsfDuplicationScrubTemporaryFilesHandler extends AcsfEventHandler {

  /**
   * Implements AcsfEventHandler::handle().
   */
  public function handle() {
    drush_print(dt('Entered @class', array('@class' => get_class($this))));

    $file_storage = \Drupal::entityManager()->getStorage('file');

    // Remove all temporary files. As in file_cron(), temporary is encoded as
    // "<> FILE_STATUS_PERMANENT".
    $fids = $file_storage->getQuery()
      ->condition('status', FILE_STATUS_PERMANENT, '<>')
      ->range(0, 1000)
      ->execute();

    $files = $file_storage->loadMultiple($fids);
    foreach ($files as $file) {
      $file->delete();
    }
  }

}

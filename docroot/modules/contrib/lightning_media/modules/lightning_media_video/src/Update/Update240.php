<?php

namespace Drupal\lightning_media_video\Update;

use Drupal\lightning_core\ConfigHelper;

/**
 * Contains optional updates targeting Lightning Media Video 2.4.0.
 *
 * @Update("2.4.0")
 */
final class Update240 {

  /**
   * Installs a media type for locally hosted video files.
   *
   * @update
   *
   * @ask Do you want to install the "Video file" media type?
   */
  public function installVideoFileMedia() {
    $helper = ConfigHelper::forModule('lightning_media_video')
      ->optional();

    $helper->getEntity('media_type', 'video')->save();
    $helper->getEntity('field_storage_config', 'media.field_media_video_file')->save();
    $helper->getEntity('field_config', 'media.video.field_media_video_file')->save();
    $helper->getEntity('field_config', 'media.video.field_media_in_library')->save();
    $helper->getEntity('entity_view_display', 'media.video.embedded')->save();
    $helper->getEntity('entity_view_display', 'media.video.thumbnail')->save();

    // Handle entity displays as simple config, since they are created
    // automatically when the media type is imported.
    $helper->get('core.entity_form_display.media.video.default')->save(TRUE);
    $helper->get('core.entity_view_display.media.video.default')->save(TRUE);
  }

}

<?php

namespace Drupal\Tests\lightning_media\ExistingSite;

use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * Tests that the site is configured properly.
 *
 * @group lightning
 * @group lightning_media
 */
class ConfigTest extends ExistingSiteBase {

  public function test() {
    $media_types = $this->container->get('entity_type.manager')
      ->getStorage('media_type')
      ->getQuery()
      ->execute();

    $this->assertContains('audio_file', $media_types);
  }

}

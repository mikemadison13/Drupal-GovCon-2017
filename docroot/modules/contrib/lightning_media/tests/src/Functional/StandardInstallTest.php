<?php

namespace Drupal\Tests\lightning_media\Functional;

use Drupal\media\Entity\MediaType;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests that our configuration is correctly installed in Standard.
 *
 * @group lightning_media
 */
class StandardInstallTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected $profile = 'standard';

  /**
   * Tests that media types are installed from the profile override.
   */
  public function testInstallMediaTypesFromStandard() {
    // These are the source field names for each of these media types as they
    // exist in Standard. We expect these to "win" over the configuration that
    // we ship in our sub-components.
    $source_fields = [
      'audio' => 'field_media_audio_file',
      'image' => 'field_media_image',
      'document' => 'field_media_document',
      'remote_video' => 'field_media_oembed_video',
      'video' => 'field_media_video_file',
    ];

    // None of these media types should exist yet, since Standard does not
    // install the media system.
    foreach (array_keys($source_fields) as $media_type) {
      $this->assertTrue($this->config("media.type.$media_type")->isNew());
    }

    $this->container->get('module_installer')->install([
      'lightning_media_audio',
      'lightning_media_image',
      'lightning_media_document',
      'lightning_media_video',
    ]);
    foreach ($source_fields as $media_type => $source_field) {
      /** @var \Drupal\media\MediaTypeInterface $media_type */
      $media_type = MediaType::load($media_type);
      $this->assertInstanceOf(MediaType::class, $media_type);
      $this->assertSame($source_field, $media_type->getSource()->getSourceFieldDefinition($media_type)->getName());
    }
  }

}

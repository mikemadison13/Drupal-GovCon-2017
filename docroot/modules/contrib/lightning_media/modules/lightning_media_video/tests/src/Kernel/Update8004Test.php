<?php

namespace Drupal\Tests\lightning_media_video\Kernel;

use Drupal\Core\Entity\Entity\EntityFormMode;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;

/**
 * Tests Lightning Media Video's update path.
 *
 * @group lightning_media_video
 * @group lightning_media
 *
 * @covers lightning_media_video_update_8004()
 */
class Update8004Test extends KernelTestBase {

  use MediaTypeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'field',
    'image',
    'lightning_media_video',
    'media',
    'media_test_source',
  ];

  /**
   * Tests the update function.
   */
  public function testUpdate() {
    $this->createMediaType('test', [
      'id' => 'video',
    ]);
    $this->createMediaType('test', [
      'id' => 'video_file',
    ]);

    EntityFormMode::create([
      'targetEntityType' => 'media',
      'id' => 'media.media_library',
    ])->save();

    module_load_install('lightning_media_video');
    lightning_media_video_update_8004();

    $form_display = $this->container->get('entity_display.repository')
      ->getFormDisplay('media', 'video', 'media_library');
    $this->assertFalse($form_display->isNew());
    $this->assertSame('media.video.media_library', $form_display->id());
    $this->assertSame('video', $form_display->getTargetBundle());
    $hidden_components = $form_display->get('hidden');
    $this->assertArrayNotHasKey('field_media_oembed_video', $hidden_components);
    $this->assertTrue($hidden_components['field_media_test']);

    $form_display = $this->container->get('entity_display.repository')
      ->getFormDisplay('media', 'video_file', 'media_library');
    $this->assertFalse($form_display->isNew());
    $this->assertSame('media.video_file.media_library', $form_display->id());
    $this->assertSame('video_file', $form_display->getTargetBundle());
    $hidden_components = $form_display->get('hidden');
    $this->assertArrayNotHasKey('field_media_video_file', $hidden_components);
    $this->assertTrue($hidden_components['field_media_test_1']);
  }

}

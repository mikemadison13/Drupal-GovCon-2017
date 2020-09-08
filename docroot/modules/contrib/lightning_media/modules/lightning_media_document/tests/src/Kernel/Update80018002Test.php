<?php

namespace Drupal\Tests\lightning_media_document\Kernel;

use Drupal\Core\Entity\Entity\EntityFormMode;
use Drupal\Core\Entity\Entity\EntityViewMode;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;

/**
 * Tests Lightning Media Document's update path.
 *
 * @group lightning_media_document
 * @group lightning_media
 *
 * @covers lightning_media_document_update_8001()
 * @covers lightning_media_document_update_8002()
 */
class Update80018002Test extends KernelTestBase {

  use MediaTypeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'field',
    'image',
    'lightning_media_document',
    'media',
    'media_test_source',
  ];

  /**
   * Tests the update function.
   */
  public function testUpdate() {
    $this->createMediaType('test', ['id' => 'document']);

    EntityViewMode::create([
      'targetEntityType' => 'media',
      'id' => 'media.thumbnail',
    ])->save();

    EntityFormMode::create([
      'targetEntityType' => 'media',
      'id' => 'media.media_library',
    ])->save();

    module_load_install('lightning_media_document');
    lightning_media_document_update_8001();
    lightning_media_document_update_8002();
  }

}

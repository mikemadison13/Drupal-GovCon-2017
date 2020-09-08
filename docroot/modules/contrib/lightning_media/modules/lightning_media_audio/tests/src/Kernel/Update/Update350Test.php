<?php

namespace Drupal\Tests\lightning_media_audio\Kernel\Update;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\KernelTests\KernelTestBase;
use Drupal\lightning_media_audio\Update\Update350;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;
use Prophecy\Argument;
use Symfony\Component\Console\Style\StyleInterface;

/**
 * Tests configuration updates targeting Lightning Media Audio 3.5.0.
 *
 * @group lightning_media
 * @group lightning_media_audio
 *
 * @coversDefaultClass \Drupal\lightning_media_audio\Update\Update350
 */
class Update350Test extends KernelTestBase {

  use MediaTypeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'field',
    'media',
    'media_test_source',
    'system',
    'user',
  ];

  /**
   * @covers ::removeAudioFileLibraryFieldTranslatability
   */
  public function test() {
    $this->createMediaType('test', [
      'id' => 'audio_file',
    ]);

    $field_storage = FieldStorageConfig::create([
      'type' => 'boolean',
      'entity_type' => 'media',
      'field_name' => 'field_media_in_library',
    ]);
    $field_storage->save();

    FieldConfig::create([
      'field_storage' => $field_storage,
      'bundle' => 'audio_file',
      'translatable' => TRUE,
    ])->save();

    $io = $this->prophesize(StyleInterface::class);
    $io->confirm(Argument::type('string'))->willReturn(TRUE);

    Update350::create($this->container)
      ->removeAudioFileLibraryFieldTranslatability($io->reveal());

    $this->assertFalse(
      FieldConfig::loadByName('media', 'audio_file', 'field_media_in_library')->isTranslatable()
    );
  }

}

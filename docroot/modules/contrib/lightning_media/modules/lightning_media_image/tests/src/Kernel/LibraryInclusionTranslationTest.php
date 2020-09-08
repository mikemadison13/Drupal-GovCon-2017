<?php

namespace Drupal\Tests\lightning_media_image\Kernel;

use Drupal\file\Entity\File;
use Drupal\KernelTests\KernelTestBase;
use Drupal\language\Entity\ConfigurableLanguage;
use Drupal\media\Entity\Media;

/**
 * Tests that field_media_in_library is not translatable.
 *
 * @group lightning_media
 * @group lightning_media_image
 */
class LibraryInclusionTranslationTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['system', 'user'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->installEntitySchema('user');

    $this->container->get('module_installer')->install([
      'content_translation',
      'lightning_media_image',
    ]);
    ConfigurableLanguage::createFromLangcode('hu')->save();
  }

  /**
   * Tests that field_media_in_library is not translatable.
   */
  public function test() {
    $uri = uniqid('public://') . '.png';
    $this->assertGreaterThan(0, file_put_contents($uri, $this->getRandomGenerator()->paragraphs()));

    $file = File::create(['uri' => $uri]);
    $file->save();

    $media = Media::create([
      'bundle' => 'image',
      'name' => $this->randomString(),
      'field_media_image' => $file->id(),
      'field_media_in_library' => TRUE,
    ]);
    $media->addTranslation('hu', [
      'field_media_in_library' => FALSE,
    ]);
    $media->save();

    $this->assertTrue($media->field_media_in_library->value);
    $this->assertTrue($media->getTranslation('hu')->field_media_in_library->value);
  }

}

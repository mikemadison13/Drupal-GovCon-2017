<?php

namespace Drupal\Tests\lightning_media_video\Kernel;

use Drupal\file\Entity\File;
use Drupal\KernelTests\KernelTestBase;
use Drupal\language\Entity\ConfigurableLanguage;
use Drupal\media\Entity\Media;
use Drupal\media\OEmbed\Resource;
use Drupal\media\OEmbed\ResourceFetcherInterface;
use Drupal\media\OEmbed\UrlResolverInterface;

/**
 * Tests translatability of field_media_in_library.
 *
 * @group lightning_media
 * @group lightning_media_video
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
      'lightning_media_video',
    ]);
    ConfigurableLanguage::createFromLangcode('hu')->save();
  }

  /**
   * Tests that field_media_in_library is not translatable for video.
   */
  public function testVideoFile() {
    $uri = uniqid('public://') . '.mp4';
    $this->assertGreaterThan(0, file_put_contents($uri, $this->getRandomGenerator()->paragraphs()));

    $file = File::create(['uri' => $uri]);
    $file->save();

    $media = Media::create([
      'bundle' => 'video',
      'name' => $this->randomString(),
      'field_media_video_file' => $file->id(),
      'field_media_in_library' => TRUE,
    ]);
    $media->addTranslation('hu', [
      'field_media_in_library' => FALSE,
    ]);
    $media->save();

    $this->assertTrue($media->field_media_in_library->value);
    $this->assertTrue($media->getTranslation('hu')->field_media_in_library->value);
  }

  /**
   * Tests that field_media_in_library is not translatable for remote_video.
   */
  public function testRemoteVideo() {
    $url = $this->randomString();

    $url_resolver = $this->prophesize(UrlResolverInterface::class);
    $url_resolver->getResourceUrl($url)->willReturnArgument(0);
    $this->container->set('media.oembed.url_resolver', $url_resolver->reveal());

    $resource = Resource::link();
    $resource_fetcher = $this->prophesize(ResourceFetcherInterface::class);
    $resource_fetcher->fetchResource($url)->willReturn($resource);
    $this->container->set('media.oembed.resource_fetcher', $resource_fetcher->reveal());

    $media = Media::create([
      'bundle' => 'remote_video',
      'field_media_oembed_video' => $url,
      'field_media_in_library' => TRUE,
    ]);
    $media->addTranslation('hu', [
      'field_media_in_library' => FALSE,
      'field_media_oembed_video' => $url,
    ]);
    $media->save();

    $this->assertTrue($media->field_media_in_library->value);
    $this->assertTrue($media->getTranslation('hu')->field_media_in_library->value);
  }

}

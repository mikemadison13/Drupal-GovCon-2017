<?php

namespace Drupal\Tests\lightning_media\Functional;

use Drupal\media\Entity\Media;
use Drupal\node\Entity\Node;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests the handling of entity labels when embedding media in WYSIWYG.
 *
 * @group lightning_media
 */
class EmbeddedMediaLabelTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'lightning_media_twitter',
    'node',
  ];

  /**
   * The label of an embedded media item should not appear in the host entity.
   */
  public function testEmbeddedMediaItem() {
    $node_type = $this->drupalCreateContentType()->id();

    $media = Media::create([
      'bundle' => 'tweet',
      'name' => 'Here be dragons',
      'embed_code' => 'https://twitter.com/50NerdsofGrey/status/757319527151636480',
    ]);
    $media->setPublished();
    $media->save();

    $node = Node::create([
      'type' => $node_type,
      'body' => '<drupal-entity data-embed-button="media_browser" data-entity-embed-display="view_mode:media.embedded" data-entity-type="media" data-entity-uuid="' . $media->uuid() . '"></drupal-entity>',
      'title' => $this->getRandomGenerator()->word(16),
    ]);
    $node->setPublished();
    $node->save();

    $this->drupalGet($node->toUrl());
    $this->assertSession()->pageTextNotContains($media->label());
  }

}

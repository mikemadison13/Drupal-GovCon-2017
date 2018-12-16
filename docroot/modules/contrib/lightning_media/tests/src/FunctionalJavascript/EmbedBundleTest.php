<?php

namespace Drupal\Tests\lightning_media\FunctionalJavascript;

use Drupal\entity_browser\Element\EntityBrowserElement;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\media\Entity\Media;
use Drupal\node\Entity\Node;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;

/**
 * @group lightning
 * @group lightning_media
 */
class EmbedBundleTest extends WebDriverTestBase {

  use MediaTypeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'lightning_media_video',
  ];

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $this->createMediaType('video_embed_field', [
      'id' => 'advertisement',
      'label' => 'Advertisement',
    ]);
    $this->createContentType([
      'type' => 'article',
      'name' => 'Article',
    ]);

    $field_storage = FieldStorageConfig::create([
      'field_name' => 'field_media',
      'entity_type' => 'node',
      'type' => 'entity_reference',
      'settings' => [
        'target_type' => 'media',
      ],
    ]);
    $field_storage->save();

    FieldConfig::create([
      'field_storage' => $field_storage,
      'bundle' => 'article',
      'label' => 'Media',
      'settings' => [
        'handler_settings' => [
          'target_bundles' => [
            'video' => 'video',
            'advertisement' => 'advertisement',
          ],
        ],
      ],
    ])->save();

    $this->container->get('entity_type.manager')
      ->getStorage('entity_form_display')
      ->load('node.article.default')
      ->setComponent('field_media', [
        'type' => 'entity_browser_entity_reference',
        'settings' => [
          'entity_browser' => 'media_browser',
          'field_widget_display' => 'rendered_entity',
          'field_widget_edit' => TRUE,
          'field_widget_remove' => TRUE,
          'selection_mode' => EntityBrowserElement::SELECTION_MODE_APPEND,
          'field_widget_display_settings' => [
            'view_mode' => 'thumbnail',
          ],
          'open' => TRUE,
        ],
        'region' => 'content',
      ])
      ->save();

    $user = $this->createUser([], NULL, TRUE);
    $this->drupalLogin($user);
  }

  /**
   * Tests that select is shown when media bundle is ambiguous.
   */
  public function testEmbed() {
    $session = $this->getSession();
    $web_assert = $this->assertSession();

    // Create an article with a media via the embed widget.
    $this->drupalGet('node/add/article');
    $web_assert->fieldExists('Title')->setValue('Foo');

    $session->switchToIFrame('entity_browser_iframe_media_browser');
    $web_assert->elementExists('named', ['link', 'Create embed'])->click();
    $video_url = 'https://www.youtube.com/watch?v=zQ1_IbFFbzA';
    $web_assert->fieldExists('input')->setValue($video_url);
    $web_assert->assertWaitOnAjaxRequest();
    // There are 2 ajax requests, wait for the second one with sleep.
    sleep(1);
    $web_assert->waitForField('Bundle')->selectOption('Advertisement');
    $web_assert->waitForField('Video Url');
    $web_assert->fieldExists('Name')->setValue('Bar');
    $web_assert->buttonExists('Place')->click();
    $web_assert->waitForButton('Remove');

    $session->switchToWindow();
    $web_assert->buttonExists('Save')->click();

    // Assert the correct entities are created.
    $nodes = Node::loadMultiple();
    $this->assertCount(1, $nodes);
    /** @var \Drupal\node\NodeInterface $node */
    $node = reset($nodes);
    $this->assertSame('Foo', $node->getTitle());

    $medias = Media::loadMultiple();
    $this->assertCount(1, $medias);
    /** @var \Drupal\media\MediaInterface $media */
    $media = reset($medias);
    $this->assertEquals($node->field_media->target_id, $media->id());
    $this->assertSame('advertisement', $media->bundle());
    $this->assertSame('Bar', $media->getName());
    $this->assertSame($video_url, $media->field_media_video_embed_field->value);
  }

  /**
   * Tests that an error message is displayed for malformed urls.
   */
  public function testErrorMessages() {
    $this->drupalGet('node/add/article');
    $web_assert = $this->assertSession();
    $this->getSession()->switchToIFrame('entity_browser_iframe_media_browser');

    // Error message is displayed for malformed urls.
    $web_assert->elementExists('named', ['link', 'Create embed'])->click();
    $web_assert->fieldExists('input')->setValue('Foo');
    $web_assert->assertWaitOnAjaxRequest();
    $error_message = $web_assert->elementExists('css', 'div[role="alert"]')->getText();
    $this->assertSame("Error message Could not match any bundles to input: 'Foo'", $error_message);
    $web_assert->fieldExists('input')->setValue('');
    $web_assert->assertWaitOnAjaxRequest();
    $error_message = $web_assert->elementExists('css', 'div[role="alert"]')->getText();
    $this->assertSame('Error message You must enter a URL or embed code.', $error_message);

    // Error message is hidden when url is correct.
    $web_assert->fieldExists('input')->setValue('https://www.youtube.com/watch?v=zQ1_IbFFbzA');
    $web_assert->assertWaitOnAjaxRequest();
    $web_assert->waitForField('Bundle');
    $web_assert->elementNotExists('css', 'div[role="alert"]');

    // Rerender the form if url is changed.
    $web_assert->fieldExists('input')->setValue('Bar');
    $web_assert->assertWaitOnAjaxRequest();
    $web_assert->waitForElement('css', 'div[role="alert"]');
    $web_assert->fieldNotExists('Bundle');
  }

}

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
class UploadBundleTest extends WebDriverTestBase {

  use MediaTypeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'lightning_media_image',
  ];

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $this->createMediaType('image', [
      'id' => 'picture',
      'label' => 'Picture',
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
            'image' => 'image',
            'picture' => 'picture',
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
  public function testUpload() {
    $session = $this->getSession();
    $web_assert = $this->assertSession();

    // Create an article with a media via the upload widget.
    $this->drupalGet('node/add/article');
    $web_assert->fieldExists('Title')->setValue('Foo');

    $session->switchToIFrame('entity_browser_iframe_media_browser');
    $uri = $this->getRandomGenerator()->image('public://test_image.png', '240x240', '640x480');
    $path = $this->container->get('file_system')->realpath($uri);
    $web_assert->fieldExists('input_file')->attachFile($path);
    $web_assert->waitForField('Bundle')->selectOption('Picture');
    $web_assert->waitForField('Name')->setValue('Bar');
    $web_assert->fieldExists('Alternative text')->setValue('Baz');
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
    $this->assertSame('picture', $media->bundle());
    $this->assertSame('Bar', $media->getName());
    $this->assertSame('Baz', $media->field_media_image->alt);
    $this->assertSame('test_image_0.png', $media->field_media_image->entity->getFilename());
  }

  /**
   * Tests that select is shown after first uploading an incorrect file.
   */
  public function testWrongExtension() {
    $this->drupalGet('node/add/article');
    $this->getSession()->switchToIFrame('entity_browser_iframe_media_browser');
    $web_assert = $this->assertSession();

    // Alert is displayed when uploading a .txt file.
    file_put_contents('public://test_text.txt', $this->getRandomGenerator()->paragraphs());
    $path = $this->container->get('file_system')->realpath('public://test_text.txt');
    $web_assert->fieldExists('input_file')->attachFile($path);
    $error_message = $web_assert->waitForElement('css', 'div[role="alert"]')->getText();
    $this->assertSame('Error message Only files with the following extensions are allowed: <em class="placeholder">png gif jpg jpeg</em>.', $error_message);

    // Previous alert gets hidden after uploading .png file.
    $this->getRandomGenerator()->image('public://test_image.png', '240x240', '640x480');
    $path = $this->container->get('file_system')->realpath('public://test_image.png');
    $web_assert->fieldExists('input_file')->attachFile($path);
    $web_assert->waitForField('Bundle');
    $web_assert->elementNotExists('css', 'div[role="alert"]');
  }

  /**
   * Tests that image resolution changes after selecting bundle.
   */
  public function testResolutionChange() {
    FieldConfig::load('media.image.image')
      ->setSetting('max_resolution', '100x100')
      ->save();

    $this->drupalGet('node/add/article');
    $this->getSession()->switchToIFrame('entity_browser_iframe_media_browser');
    $web_assert = $this->assertSession();

    // Upload a 200x200 image.
    $this->getRandomGenerator()->image('public://test_image.png', '200x200', '200x200');
    $path = $this->container->get('file_system')->realpath('public://test_image.png');
    $web_assert->fieldExists('input_file')->attachFile($path);
    $bundle = $web_assert->waitForField('Bundle');
    $web_assert->elementNotExists('css', 'div[role="contentinfo"]');
    $bundle->selectOption('Image');

    // Assert the image resolution is changed to 100x100.
    $status_message = $web_assert->waitForElement('css', 'div[role="contentinfo"]')->getText();
    $this->assertSame('Status message The image was resized to fit within the maximum allowed dimensions of 100x100 pixels. The new dimensions of the resized image are 100x100 pixels.', $status_message);
  }

}

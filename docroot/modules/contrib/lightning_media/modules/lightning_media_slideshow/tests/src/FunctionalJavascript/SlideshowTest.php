<?php

namespace Drupal\Tests\lightning_media_slideshow\FunctionalJavascript;

use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\media\Entity\Media;
use Drupal\Tests\lightning_media\FunctionalJavascript\WebDriverWebAssert;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;

/**
 * Tests the basic functionality of Lightning Media's slideshow component.
 *
 * @group lightning_media_slideshow
 * @group lightning_media
 */
class SlideshowTest extends WebDriverTestBase {

  use MediaTypeCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'classy';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'block_content',
    'lightning_media_slideshow',
    'media_test_source',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->createMediaType('test', [
      'id' => 'alpha',
      'label' => 'Alpha',
    ]);
    $this->createMediaType('test', [
      'id' => 'beta',
      'label' => 'Beta',
    ]);
    $this->createMedia('alpha');
    $this->createMedia('beta');
  }

  /**
   * Creates a media item of a specific type.
   *
   * The created media item will have a randomly generated label and source
   * field value.
   *
   * @param string $media_type
   *   The type of media to create.
   */
  private function createMedia($media_type) {
    /** @var \Drupal\media\MediaInterface $media */
    $media = Media::create(['bundle' => $media_type]);

    $source_field = $media->getSource()
      ->getSourceFieldDefinition($media->bundle->entity)
      ->getName();

    $media
      ->setName($this->randomString())
      ->set('field_media_in_library', TRUE)
      ->set($source_field, $this->randomString())
      ->setPublished()
      ->save();
  }

  /**
   * Tests creating a slideshow block with media items in it.
   */
  public function testSlideshow() {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $account = $this->drupalCreateUser([
      'access content',
      'access media overview',
      'view media',
      'create media',
      'update media',
      'administer blocks',
    ]);
    $this->drupalLogin($account);

    $this->drupalGet('/block/add/media_slideshow');
    $page->fillField('Block description', 'Test Block');

    // This is an amazingly sketchy way to use the media library, but it will
    // suffice for now until there is a trait in core that allows us to write
    // interact with it more cleanly.
    $page->pressButton('Add media');
    $assert_session->waitForText('Add or select media');
    $assert_session->waitForElement('css', '.js-media-library-item')->click();

    // Switch to the other media type.
    $links = $page->findAll('css', '.js-media-library-menu a');
    $this->assertCount(2, $links);
    $links[1]->click();

    $assert_session->assertWaitOnAjaxRequest();
    $assert_session->waitForElement('css', '.js-media-library-item')->click();
    $assert_session->elementExists('css', '.ui-dialog-buttonpane')->pressButton('Insert selected');

    // Wait for the selected items to actually appear on the page.
    $assert_session->assertWaitOnAjaxRequest();
    $assert_session->waitForElement('css', '.js-media-library-selection .js-media-library-item');

    $page->pressButton('Save');
    $page->selectFieldOption('Region', 'Content');
    $page->pressButton('Save block');
    $this->drupalGet('<front>');

    $this->assertNotEmpty($assert_session->waitForElement('css', 'button.slick-prev.slick-arrow'));
    $assert_session->elementExists('css', 'button.slick-next.slick-arrow');
  }

  /**
   * {@inheritdoc}
   */
  public function assertSession($name = NULL) {
    return new WebDriverWebAssert($this->getSession($name), $this->baseUrl);
  }

}

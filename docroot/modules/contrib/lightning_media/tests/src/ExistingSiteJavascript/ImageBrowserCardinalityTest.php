<?php

namespace Drupal\Tests\lightning_media\ExistingSiteJavascript;

use Behat\Mink\Element\ElementInterface;
use Behat\Mink\Element\NodeElement;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\entity_browser\Element\EntityBrowserElement;
use Drupal\file\Entity\File;
use Drupal\FunctionalJavascriptTests\JSWebAssert;
use Drupal\media\Entity\Media;
use weitzman\DrupalTestTraits\ExistingSiteJavascriptBase;

/**
 * @group lightning
 * @group lightning_media
 */
class ImageBrowserCardinalityTest extends ExistingSiteJavascriptBase {

  /**
   * Media items created during the test.
   *
   * @var \Drupal\media\MediaInterface[]
   */
  private $media = [];

  /**
   * The session assertion helper.
   *
   * @var JSWebAssert
   */
  private $assert;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $field_storage = entity_create('field_storage_config', [
      'field_name' => 'field_multi_image',
      'entity_type' => 'node',
      'type' => 'image',
      'cardinality' => 3,
    ]);
    $field_storage->save();

    entity_create('field_config', [
      'field_storage' => $field_storage,
      'bundle' => 'page',
      'label' => 'Multi-Image',
    ])->save();

    $field_storage = entity_create('field_storage_config', [
      'field_name' => 'field_unlimited_images',
      'entity_type' => 'node',
      'type' => 'image',
      'cardinality' => FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED,
    ]);
    $field_storage->save();

    entity_create('field_config', [
      'field_storage' => $field_storage,
      'bundle' => 'page',
      'label' => 'Unlimited Images',
    ])->save();

    entity_get_form_display('node', 'page', 'default')
      ->setComponent('field_multi_image', [
        'type' => 'entity_browser_file',
        'settings' => [
          'entity_browser' => 'image_browser',
          'field_widget_edit' => TRUE,
          'field_widget_remove' => TRUE,
          'view_mode' => 'default',
          'preview_image_style' => 'thumbnail',
          'open' => TRUE,
          'selection_mode' => EntityBrowserElement::SELECTION_MODE_APPEND,
        ],
        'region' => 'content',
      ])
      ->setComponent('field_unlimited_images', [
        'type' => 'entity_browser_file',
        'settings' => [
          'entity_browser' => 'image_browser',
          'field_widget_edit' => TRUE,
          'field_widget_remove' => TRUE,
          'view_mode' => 'default',
          'preview_image_style' => 'thumbnail',
          'open' => TRUE,
          'selection_mode' => EntityBrowserElement::SELECTION_MODE_APPEND,
        ],
        'region' => 'content',
      ])
      ->save();

    for ($i = 0; $i < 4; $i++) {
      $uri = $this->getRandomGenerator()->image(uniqid('public://random_') . '.png', '240x240', '640x480');

      $file = File::create([
        'uri' => $uri,
      ]);
      $file->setMimeType('image/png');
      $file->setTemporary();
      $file->save();

      $media = Media::create([
        'bundle' => 'image',
        'name' => $this->getRandomGenerator()->name(32),
        'image' => $file->id(),
        'field_media_in_library' => TRUE,
      ]);
      $media->save();
      array_push($this->media, $media);
    }

    $account = $this->createUser();
    $account->addRole('media_creator');
    $account->save();

    $this->assertNotEmpty($account->passRaw);
    $this->visit('/user/login');

    $this->assert = new JSWebAssert($this->getSession());
    $this->assert->fieldExists('name')->setValue($account->getAccountName());
    $this->assert->fieldExists('pass')->setValue($account->passRaw);
    $this->assert->buttonExists('Log in')->press();
  }

  /**
   * {@inheritdoc}
   */
  public function tearDown() {
    while ($this->media) {
      array_pop($this->media)->delete();
    }

    entity_load('field_config', 'node.page.field_multi_image')->delete();
    entity_load('field_config', 'node.page.field_unlimited_images')->delete();
    field_purge_batch(10);

    parent::tearDown();
  }

  /**
   * Tests that multiple cardinality is enforced in the image browser.
   */
  public function testMultipleCardinality() {
    $this->visit('/node/add/page');
    $session = $this->getSession();
    $page = $session->getPage();

    $this->open('Multi-Image');
    $items = $page->findAll('css', '[data-selectable]');
    $this->assertGreaterThanOrEqual(4, count($items));
    $this->select($items[0]);
    $this->select($items[1]);

    $this->assert->buttonExists('Select')->press();
    $session->switchToIFrame(NULL);
    $this->assert->assertWaitOnAjaxRequest();

    $this->open('Multi-Image');
    $this->select($items[2]);

    $disabled = $page->findAll('css', '[data-selectable].disabled');
    $this->assertGreaterThanOrEqual(3, count($disabled));
  }

  /**
   * Tests that the image browser respects unlimited cardinality.
   */
  public function testUnlimitedCardinality() {
    $this->visit('/node/add/page');
    $session = $this->getSession();
    $page = $session->getPage();

    $this->open('Unlimited Images');
    $items = $page->findAll('css', '[data-selectable]');
    $this->assertGreaterThanOrEqual(4, count($items));
    $this->select($items[0]);
    $this->select($items[1]);
    $this->select($items[2]);

    $this->assert->buttonExists('Select')->press();
    $session->switchToIFrame(NULL);
    $this->assert->assertWaitOnAjaxRequest();

    $this->open('Unlimited Images');
    $this->select($items[3]);

    $disabled = $page->findAll('css', '[data-selectable].disabled');
    $this->assertEmpty($disabled);
  }

  /**
   * Opens a modal image browser.
   *
   * @param string $label
   *   The label of the image field.
   */
  private function open($label) {
    $this->assert->buttonExists('Select Image(s)', $this->getWrapper($label))->press();
    $this->assert->assertWaitOnAjaxRequest();
    $this->getSession()->switchToIFrame('entity_browser_iframe_image_browser');
  }

  /**
   * Finds a details element by its summary text.
   *
   * @param string $label
   *   The summary.
   *
   * @return NodeElement
   *   The details element.
   */
  private function getWrapper($label) {
    $elements = $this->getSession()
      ->getPage()
      ->findAll('css', 'details > summary');

    $filter =  function (ElementInterface $element) use ($label) {
      return $element->getText() === $label;
    };
    $wrappers = array_filter($elements, $filter);
    $this->assertNotEmpty($wrappers);

    return reset($wrappers)->getParent();
  }

  /**
   * Selects an item in the image browser.
   *
   * @param \Behat\Mink\Element\NodeElement $element
   *   The item to select.
   */
  private function select(NodeElement $element) {
    $element->click();
    $this->assert->fieldExists('Select this item', $element)->check();
  }

}

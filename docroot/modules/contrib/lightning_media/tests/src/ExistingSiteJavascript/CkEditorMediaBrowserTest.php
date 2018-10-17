<?php

namespace Drupal\Tests\lightning_media\ExistingSiteJavascript;

use Drupal\FunctionalJavascriptTests\JSWebAssert;
use weitzman\DrupalTestTraits\ExistingSiteJavascriptBase;

/**
 * @group lightning
 * @group lightning_media
 */
class CkEditorMediaBrowserTest extends ExistingSiteJavascriptBase {

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
   * The ID of the current user.
   *
   * @var int
   */
  private $uid = 0;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $this->addMedia([
      'bundle' => 'tweet',
      'name' => 'Code Wisdom 1',
      'embed_code' => 'https://twitter.com/CodeWisdom/status/707945860936691714',
    ]);
    $this->addMedia([
      'bundle' => 'tweet',
      'embed_code' => 'https://twitter.com/CodeWisdom/status/826500049760821248',
    ]);
    $this->addMedia([
      'bundle' => 'tweet',
      'embed_code' => 'https://twitter.com/CodeWisdom/status/826460810121773057',
    ]);

    $account = $this->createUser();
    $account->addRole('media_creator');
    $account->save();

    $this->assertNotEmpty($account->passRaw);
    $this->visit('/user/login');

    $this->assert = new JSWebAssert($this->getSession());
    $this->assert->fieldExists('name')->setValue($account->getAccountName());
    $this->assert->fieldExists('pass')->setValue($account->passRaw);
    $this->assert->buttonExists('Log in')->press();

    $this->uid = $account->id();
  }

  /**
   * {@inheritdoc}
   */
  public function tearDown() {
    while ($this->media) {
      array_pop($this->media)->delete();
    }
    parent::tearDown();
  }

  /**
   * Tests exposed filters in the media browser.
   */
  public function testExposedFilters() {
    $this->visit('/node/add/page');
    $this->open();

    $this->getSession()->switchToIFrame('entity_browser_iframe_media_browser');

    // All items should be visible.
    $this->assertCount(3, $this->getItems());

    // Try filtering by media type.
    $this->assert->fieldExists('Type')->selectOption('Image');
    $this->applyFilters();
    $this->assertEmpty($this->getItems());

    // Clear the type filter.
    $this->assert->fieldExists('Type')->selectOption('- Any -');
    $this->applyFilters();
    $this->assertCount(3, $this->getItems());

    // Try filtering by keywords.
    $this->assert->fieldExists('Keywords')->setValue('Code Wisdom 1');
    $this->applyFilters();
    $this->assertCount(1, $this->getItems());

    // Clear the keyword filter.
    $this->assert->fieldExists('Keywords')->setValue('');
    $this->applyFilters();
    $this->assertCount(3, $this->getItems());
  }

  /**
   * Tests that cardinality is never enforced in the media browser.
   */
  public function testUnlimitedCardinality() {
    $session = $this->getSession();

    $this->visit('/node/add/page');
    $this->open();
    $session->switchToIFrame('entity_browser_iframe_media_browser');

    $items = $this->getItems();
    $this->assertGreaterThanOrEqual(3, count($items));
    $this->assert->fieldExists('Select this item', $items[0])->check();
    $items[0]->click();
    $this->assert->fieldExists('Select this item', $items[1])->check();
    $items[1]->click();

    // Only one item can be selected at any time, but nothing is ever disabled.
    $this->assert->elementsCount('css', '[data-selectable].selected', 1);
    $this->assert->elementNotExists('css', '[data-selectable].disabled');
  }

  /**
   * Tests that the entity embed dialog opens when editing a pre-existing embed.
   */
  public function testEditEmbed() {
    $session = $this->getSession();

    $node = $this->createNode([
      'type' => 'page',
      'title' => 'Blorf',
      'uid' => $this->uid,
      'body' => [
        'value' => '',
        'format' => 'rich_text',
      ],
    ]);

    $this->visit('/node/' . $node->id() . '/edit');
    $this->open();
    $session->switchToIFrame('entity_browser_iframe_media_browser');

    $items = $this->getItems();
    $this->assertGreaterThanOrEqual(3, count($items));
    $this->assert->fieldExists('Select this item', $items[0])->check();
    $this->assert->buttonExists('Place')->press();
    $session->switchToIFrame(NULL);
    $this->assert->assertWaitOnAjaxRequest();

    $embed_dialog = $this->assert->elementExists('css', 'form.entity-embed-dialog');
    $this->assert->buttonExists('Embed', $embed_dialog)->press();
    $this->assert->assertWaitOnAjaxRequest();

    $this->assert->buttonExists('Save')->press();
    $this->visit('/node/' . $node->id() . '/edit');
    $this->open();
    $this->assert->assertWaitOnAjaxRequest();
    $this->assert->elementExists('css', 'form.entity-embed-dialog');
  }

  /**
   * Tests that the image embed plugin is used to embed an image.
   *
   * @depends testExposedFilters
   */
  public function testImageEmbed() {
    $session = $this->getSession();

    /** @var \Drupal\Core\Entity\EntityStorageInterface $file_storage */
    $file_storage = $this->container->get('entity_type.manager')->getStorage('file');
    $uri = uniqid('public://') . '.png';
    $uri = $this->getRandomGenerator()->image($uri, '640x480', '800x600');
    $image = $file_storage->create([
      'uri' => $uri,
    ]);
    $file_storage->save($image);

    $media = $this->addMedia([
      'bundle' => 'image',
      'name' => 'Foobar',
      'image' => $image->id(),
    ]);
    $media->image->alt = 'I am the greetest';
    $this->assertSame(SAVED_UPDATED, $media->save());

    $this->visit('/node/add/page');
    $this->open();
    $session->switchToIFrame('entity_browser_iframe_media_browser');

    $this->assert->fieldExists('Type')->selectOption('Image');
    $this->applyFilters();

    $items = $this->getItems();
    $this->assertGreaterThanOrEqual(1, count($items));
    $items[0]->click();
    $this->assert->buttonExists('Place')->press();
    $session->switchToIFrame(NULL);
    $this->assert->assertWaitOnAjaxRequest();

    $embed_dialog = $this->assert->elementExists('css', 'form.entity-embed-dialog');
    $this->assert->optionExists('Image style', 'Cropped: Freeform', $embed_dialog);
    $this->assert->fieldValueEquals('Alternate text', 'I am the greetest', $embed_dialog);
    $this->assert->fieldValueEquals('attributes[title]', 'Foobar', $embed_dialog);
  }

  /**
   * Tests that the image embed plugin is not used to embed a document.
   *
   * @depends testExposedFilters
   */
  public function testDocumentEmbed() {
    $session = $this->getSession();

    /** @var \Drupal\Core\Entity\EntityStorageInterface $file_storage */
    $file_storage = $this->container->get('entity_type.manager')->getStorage('file');
    $uri = uniqid('public://') . '.txt';
    file_put_contents($uri, $this->getRandomGenerator()->paragraphs());
    $file = $file_storage->create([
      'uri' => $uri,
    ]);
    $file_storage->save($file);

    $this->addMedia([
      'bundle' => 'document',
      'field_document' => $file->id(),
    ]);

    $this->visit('/node/add/page');
    $this->open();
    $session->switchToIFrame('entity_browser_iframe_media_browser');

    $this->assert->fieldExists('Type')->selectOption('Document');
    $this->applyFilters();

    $items = $this->getItems();
    $this->assertGreaterThanOrEqual(1, count($items));
    $items[0]->click();
    $this->assert->buttonExists('Place')->press();
    $session->switchToIFrame(NULL);
    $this->assert->assertWaitOnAjaxRequest();

    $embed_dialog = $this->assert->elementExists('css', 'form.entity-embed-dialog');
    $this->assert->fieldNotExists('Image style', $embed_dialog);
    $this->assert->fieldNotExists('Alternative text', $embed_dialog);
    $this->assert->fieldNotExists('attributes[title]', $embed_dialog);
  }

  /**
   * Adds a media item to the library and marks it for deletion in tearDown().
   *
   * @param array $values
   *   The values with which to create the media item.
   *
   * @return \Drupal\media\MediaInterface
   *   The saved media item.
   */
  private function addMedia(array $values) {
    /** @var \Drupal\Core\Entity\EntityStorageInterface $storage */
    $storage = $this->container->get('entity_type.manager')
      ->getStorage('media');

    $values += [
      'name' => $this->randomString(),
    ];
    /** @var \Drupal\media\MediaInterface $media */
    $media = $storage->create($values);
    $media->set('field_media_in_library', TRUE)->setPublished();

    $this->assertSame(SAVED_NEW, $storage->save($media));
    array_push($this->media, $media);

    return $media;
  }

  /**
   * Returns all selectable items in the media browser.
   *
   * @return \Behat\Mink\Element\NodeElement[]
   *   The selectable items.
   */
  private function getItems() {
    return $this->getSession()
      ->getPage()
      ->findAll('css', '[data-selectable]');
  }

  /**
   * Applies exposed Views filters.
   */
  private function applyFilters() {
    $this->assert->elementExists('css', '.views-exposed-form .form-actions input[type = "submit"]')->press();
    $this->assert->assertWaitOnAjaxRequest();
    sleep(2);
  }

  /**
   * Opens the CKeditor media browser.
   */
  private function open() {
    // Assert that at least one CKeditor instance is initialized.
    $session = $this->getSession();
    $status = $session->wait(10000, 'Object.keys( CKEDITOR.instances ).length > 0');
    $this->assertTrue($status);

    // Assert that we have a valid list of CKeditor instance IDs.
    $editors = $session->evaluateScript('Object.keys( CKEDITOR.instances )');
    $this->assertInternalType('array', $editors);
    /** @var string[] $editors */
    $editors = array_filter($editors);
    $this->assertNotEmpty($editors);

    // Assert that the editor is ready.
    $editor = reset($editors);
    $status = $session->wait(10000, "CKEDITOR.instances['$editor'].status === 'ready'");
    $this->assertTrue($status);

    $status = $session->evaluateScript("CKEDITOR.instances['$editor'].execCommand('editdrupalentity', { id: 'media_browser' });");
    $this->assertNotEmpty($status);
    sleep(3);
  }

}

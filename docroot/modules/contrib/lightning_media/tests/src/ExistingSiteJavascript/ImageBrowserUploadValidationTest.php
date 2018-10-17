<?php

namespace Drupal\Tests\lightning_media\ExistingSiteJavascript;

use Behat\Mink\Element\ElementInterface;
use Behat\Mink\Element\NodeElement;
use Drupal\entity_browser\Element\EntityBrowserElement;
use Drupal\FunctionalJavascriptTests\JSWebAssert;
use weitzman\DrupalTestTraits\ExistingSiteJavascriptBase;

/**
 * @group lightning
 * @group lightning_media
 */
class ImageBrowserUploadValidationTest extends ExistingSiteJavascriptBase {

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
      'field_name' => 'field_lightweight_image',
      'entity_type' => 'node',
      'type' => 'image',
      'cardinality' => 1,
    ]);
    $field_storage->save();

    entity_create('field_config', [
      'field_storage' => $field_storage,
      'bundle' => 'page',
      'label' => 'Lightweight Image',
      'settings' => [
        'max_filesize' => '5 KB',
      ]
    ])->save();

    entity_get_form_display('node', 'page', 'default')
      ->setComponent('field_lightweight_image', [
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
    entity_load('field_config', 'node.page.field_lightweight_image')->delete();
    field_purge_batch(10);

    parent::tearDown();
  }

  /**
   * Tests that image browser upload widget respects max file size of the field.
   */
  public function testUploadFileSizeValidation() {
    $this->visit('/node/add/page');
    $this->open('Lightweight Image');

    $this->assert->elementExists('named', ['link', 'Upload'])->click();
    $this->assert->fieldExists('input_file')->attachFile(__DIR__ . '/../../files/test.jpg');
    $this->assert->assertWaitOnAjaxRequest();
    sleep(1);
    $this->assert->elementExists('css', '.messages [role="alert"]');
    $this->assert->elementExists('css', 'input.form-file.error');
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

}

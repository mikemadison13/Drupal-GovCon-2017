<?php

namespace Drupal\Tests\lightning_media\ExistingSiteJavascript;

use Drupal\FunctionalJavascriptTests\JSWebAssert;
use weitzman\DrupalTestTraits\ExistingSiteJavascriptBase;

/**
 * @group lightning
 * @group lightning_media
 */
class MediaImageFieldTest extends ExistingSiteJavascriptBase {

  /**
   * The name of the media item created during the test.
   *
   * @var string
   */
  private $name;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $field_storage = entity_create('field_storage_config', [
      'field_name' => 'field_image',
      'entity_type' => 'media',
      'type' => 'image',
    ]);
    $field_storage->save();

    entity_create('field_config', [
      'field_storage' => $field_storage,
      'bundle' => 'video',
      'label' => 'Image',
    ])->save();

    $form_display = entity_get_form_display('media', 'video', 'default');
    // Add field_image to the display and save it; lightning_media_image will
    // default it to the image browser widget.
    $form_display->setComponent('field_image', ['type' => 'image_image'])->save();
    // Then switch it to a standard image widget.
    $form_display
      ->setComponent('field_image', [
        'type' => 'image_image',
        'weight' => 4,
        'settings' => [
          'preview_image_style' => 'thumbnail',
          'progress_indicator' => 'throbber',
        ],
        'region' => 'content',
      ])
      ->save();
  }

  /**
   * Tests clearing an image field on an existing media item.
   */
  public function test() {
    $account = $this->createUser(['create media', 'update media']);
    $this->assertNotEmpty($account->passRaw);
    $this->visit('/user/login');

    $assert = new JSWebAssert($this->getSession());
    $assert->fieldExists('name')->setValue($account->getAccountName());
    $assert->fieldExists('pass')->setValue($account->passRaw);
    $assert->buttonExists('Log in')->press();

    $this->name = $this->randomString();

    $this->visit('/media/add/video');
    $assert->fieldExists('Name')->setValue($this->name);
    $assert->fieldExists('Video URL')->setValue('https://www.youtube.com/watch?v=z9qY4VUZzcY');
    $assert->assertWaitOnAjaxRequest();
    $assert->fieldExists('Image')->attachFile('/Users/phen/lightning-media/tests/files/test.jpg');
    $assert->assertWaitOnAjaxRequest();
    $assert->fieldExists('Alternative text')->setValue('This is a beauty.');
    $assert->buttonExists('Save')->press();
    $assert->elementExists('named', ['link', 'Edit'])->click();
    $assert->buttonExists('field_image_0_remove_button')->press();
    $assert->assertWaitOnAjaxRequest();
    // Ensure that the widget has actually been cleared. This test was written
    // because the AJAX operation would fail due to a 500 error at the server,
    // which would prevent the widget from being cleared.
    $assert->buttonNotExists('field_image_0_remove_button');
  }

  /**
   * {@inheritdoc}
   */
  public function tearDown() {
    if ($this->name) {
      /** @var \Drupal\Core\Entity\EntityStorageInterface $storage */
      $storage = $this->container->get('entity_type.manager')
        ->getStorage('media');

      $media = $storage->loadByProperties([
        'name' => $this->name,
      ]);
      $storage->delete($media);
    }
    entity_load('field_config', 'media.video.field_image')->delete();
    field_purge_batch(10);

    parent::tearDown();
  }

}

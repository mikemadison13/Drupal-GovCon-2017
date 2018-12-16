<?php

namespace Drupal\Tests\lightning_media\ExistingSite;

use Drupal\Core\Session\AccountInterface;
use Drupal\entity_browser\Element\EntityBrowserElement;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;
use Drupal\Tests\WebAssert;
use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning
 * @group lightning_media
 */
class MediaBrowserUploadBundleTest extends ExistingSiteBase {

  use MediaTypeCreationTrait;

  /**
   * The session assertion helper.
   *
   * @var WebAssert
   */
  private $assert;

  /**
   * The media entity storage handler.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  private $storage;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    $this->assert = new WebAssert($this->getSession());

    $this->storage = $this->container->get('entity_type.manager')
      ->getStorage('media');

    $this->createMediaType('image', [
      'id' => 'z_image',
    ]);

    $field_storage = entity_create('field_storage_config', [
      'field_name' => 'field_z_image',
      'entity_type' => 'node',
      'type' => 'entity_reference',
      'settings' => [
        'target_type' => 'media',
      ],
    ]);
    $field_storage->save();

    entity_create('field_config', [
      'field_storage' => $field_storage,
      'bundle' => 'page',
      'label' => 'Z Image',
      'settings' => [
        'handler_settings' => [
          'target_bundles' => [
            'z_image' => 'z_image',
          ],
        ],
      ],
    ])->save();

    entity_get_form_display('node', 'page', 'default')
      ->setComponent('field_z_image', [
        'type' => 'entity_browser_entity_reference',
        'settings' => [
          'entity_browser' => 'media_browser',
          'field_widget_display' => 'rendered_entity',
          'field_widget_edit' => TRUE,
          'field_widget_remove' => TRUE,
          'selection_mode' => EntityBrowserElement::SELECTION_MODE_APPEND,
          'field_widget_display_settings' => [
            'view_mode' => 'embedded',
          ],
          'open' => TRUE,
        ],
        'region' => 'content',
      ])
      ->save();
  }

  /**
   * {@inheritdoc}
   */
  public function tearDown() {
    entity_get_form_display('node', 'page', 'default')
      ->removeComponent('field_z_image')
      ->save();

    $media = $this->storage->loadByProperties(['bundle' => 'z_image']);
    $this->storage->delete($media);

    entity_load('field_config', 'node.page.field_z_image')->delete();
    entity_load('media_type', 'z_image')->delete();
    field_purge_batch(10);

    parent::tearDown();
  }

  /**
   * Tests that the upload widget respects bundles allowed by the field.
   */
  public function test() {
    $account = $this->createUser();
    $account->addRole('media_creator');
    $account->addRole('media_manager');
    $account->save();
    $this->logIn($account);

    $this->visit('/node/add/page');
    $this->assert->statusCodeEquals(200);

    $uuid = $this->assert
      ->elementExists('named', ['link', 'Select entities'])
      ->getAttribute('data-uuid');
    $this->assertNotEmpty($uuid);

    $this->visit("/entity-browser/iframe/media_browser?uuid=$uuid");
    $this->assert->statusCodeEquals(200);

    // Switch to the "Upload" tab of the media browser, which should be the
    // first button named "Upload" on the page.
    $this->assert->buttonExists('Upload')->press();

    $this->assert->fieldExists('File')->attachFile(__DIR__ . '/../../files/test.jpg');
    $wrapper = $this->assert->elementExists('css', '.js-form-managed-file');
    $this->assert->buttonExists('Upload', $wrapper)->press();
    $this->assert->fieldExists('Name')->setValue($this->randomString());
    $this->assert->fieldExists('Alternative text')->setValue($this->randomString());
    $this->assert->buttonExists('Place')->press();

    $media = $this->storage->loadByProperties(['bundle' => 'z_image']);
    $this->assertCount(1, $media);

    $media = $this->storage->loadByProperties(['bundle' => 'image']);
    $this->assertEmpty($media);
  }

  /**
   * Logs in a user.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The account to log in.
   */
  private function logIn(AccountInterface $account) {
    $this->assertNotEmpty($account->passRaw);
    $this->visit('/user/login');

    $this->assert->fieldExists('name')->setValue($account->getAccountName());
    $this->assert->fieldExists('pass')->setValue($account->passRaw);
    $this->assert->buttonExists('Log in')->press();
  }

}

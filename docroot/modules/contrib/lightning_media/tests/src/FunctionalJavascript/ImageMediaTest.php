<?php

namespace Drupal\Tests\lightning_media\FunctionalJavascript;

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

/**
 * Tests the image media type.
 *
 * @group lightning_media
 */
class ImageMediaTest extends WebDriverTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'classy';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'image_widget_crop',
    'lightning_media_image',
    'lightning_roles',
  ];

  /**
   * Tests creating an image to be ignored by the media library.
   */
  public function testCreateIgnoredImage() {
    $session = $this->getSession();
    $assert_session = new WebDriverWebAssert($session, $this->baseUrl);
    $page = $session->getPage();

    $node_type = $this->drupalCreateContentType()->id();

    $account = $this->drupalCreateUser(["create $node_type content"]);
    $account->addRole('media_creator');
    $account->save();
    $this->drupalLogin($account);

    $this->drupalGet('/media/add/image');
    $path = realpath(__DIR__ . '/../../files/test.jpg');
    $this->assertNotEmpty($path);
    $page->attachFileToField('Image', $path);

    // Cropping should be enabled.
    $summary = $assert_session->waitForElement('css', 'details > summary:contains(Crop image)');
    $this->assertTrue($summary->getParent()->hasAttribute('open'));
    $assert_session->elementExists('css', 'details > summary:contains(Freeform)');

    $page->fillField('Name', 'Blorg');
    $page->uncheckField('Show in media library');
    $page->pressButton('Save');

    $this->drupalGet('/admin/content/media');
    $assert_session->linkExists('Blorg');
    $this->drupalGet('/admin/content/media-grid');
    $assert_session->linkExists('Blorg');

    $field_storage = FieldStorageConfig::create([
      'type' => 'entity_reference',
      'entity_type' => 'node',
      'field_name' => 'field_media',
      'settings' => [
        'target_type' => 'media',
      ],
    ]);
    $field_storage->save();

    FieldConfig::create([
      'field_storage' => $field_storage,
      'bundle' => $node_type,
      'label' => 'Media',
    ])->save();

    $this->container->get('entity_display.repository')
      ->getFormDisplay('node', $node_type)
      ->setComponent('field_media', [
        'type' => 'media_library_widget',
      ])
      ->save();

    $this->drupalGet("/node/add/$node_type");
    $page->pressButton('Add media');
    $assert_session->waitForText('Add or select media');
    $assert_session->pageTextContains('No media available.');
    $assert_session->fieldNotExists('Select Blorg');
  }

}

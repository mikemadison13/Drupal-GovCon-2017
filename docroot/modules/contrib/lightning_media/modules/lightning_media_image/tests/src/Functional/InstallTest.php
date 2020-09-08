<?php

namespace Drupal\Tests\lightning_media_image\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests install-time logic and configuration of Lightning Media Image.
 *
 * @group lightning_media
 * @group lightning_media_image
 */
class InstallTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'lightning_media_image',
    'image_widget_crop',
  ];

  /**
   * Tests Lightning Media Image's install-time logic.
   */
  public function test() {
    // Assert that a local copy of the Cropper library is being used.
    $settings = $this->config('image_widget_crop.settings')->get('settings');
    $lib = 'libraries/cropper/dist';
    $this->assertStringContainsString("$lib/cropper.min.js", $settings['library_url']);
    $this->assertStringContainsString("$lib/cropper.min.css", $settings['css_url']);

    $form_displays = $this->container
      ->get('entity_type.manager')
      ->getStorage('entity_form_display')
      ->loadByProperties([
        'targetEntityType' => 'media',
        'bundle' => 'image',
        'mode' => ['default', 'media_browser'],
      ]);

    /** @var \Drupal\Core\Entity\Display\EntityFormDisplayInterface $form_display */
    foreach ($form_displays as $form_display) {
      $component = $form_display->getComponent('field_media_image');
      $this->assertIsArray($component);
      $this->assertSame('image_widget_crop', $component['type']);
      $this->assertSame(['freeform'], $component['settings']['crop_list']);
    }
  }

}

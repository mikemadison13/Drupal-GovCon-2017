<?php

namespace Drupal\Tests\lightning_media\Functional;

use Drupal\editor\Entity\Editor;
use Drupal\entity_browser\Element\EntityBrowserElement;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\lightning_media\Update\Update400;
use Drupal\Tests\BrowserTestBase;
use Symfony\Component\Console\Style\StyleInterface;

/**
 * Tests optional migrations to the Media Library module.
 *
 * @group lightning_media
 *
 * @covers \Drupal\lightning_media\Update\Update400
 */
class Update400Test extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'ckeditor',
    'lightning_media',
    'user',
  ];

  /**
   * Tests that field widgets are changed to use Media Library.
   */
  public function test() {
    $this->createContentType([
      'type' => 'article',
      'name' => 'Article',
    ]);

    $field_storage = FieldStorageConfig::create([
      'field_name' => 'field_migrate',
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
      'label' => 'Field to migrate',
    ])->save();

    // Create a second field that does not use entity browser.
    $field_storage = FieldStorageConfig::create([
      'field_name' => 'field_ignore',
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
      'label' => 'Field to ignore',
    ])->save();

    $this->container->get('entity_display.repository')
      ->getFormDisplay('node', 'article')
      ->setComponent('field_migrate', [
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
      ->setComponent('field_ignore', [
        'type' => 'entity_reference_autocomplete',
        'region' => 'content',
      ])
      ->save();

    // Revert the rich_text editor to its pre-update state, using the
    // media_browser embed button instead of the media library.
    /** @var \Drupal\editor\EditorInterface $editor */
    $editor = Editor::load('rich_text');
    $settings = $editor->getSettings();
    $settings['toolbar']['rows'][0][3]['items'][3] = 'media_browser';
    $editor->setSettings($settings)->save();

    $format = $editor->getFilterFormat();
    $format->setFilterConfig('filter_html', [
      'settings' => [
        'allowed_html' => '<a href hreflang>',
      ],
      'status' => TRUE,
    ]);
    // Initialize the filter collection before calling removeFilter() to avoid
    // a fatal error due to internal quirks of the FilterFormat class.
    $format->filters();
    $format->removeFilter('media_embed');
    $format->save();

    $io = $this->prophesize(StyleInterface::class);
    $io->confirm('Do you want to convert the Field to migrate field of the Article content type to use the media library in the default form mode?')
      ->willReturn(TRUE)
      ->shouldBeCalled();
    $io->confirm('Do you want to convert the Field to ignore field of the Article content type to use the media library in the default form mode?')
      ->shouldNotBeCalled();
    $io->confirm('Do you want to convert the Rich text WYSIWYG editor to use the media library?')
      ->willReturn(TRUE)
      ->shouldBeCalled();

    $io = $io->reveal();
    $updater = Update400::create($this->container);
    $updater->convertMediaReferenceFieldsToMediaLibrary($io);
    $updater->convertEditorsToMediaLibrary($io);

    $components = $this->container->get('entity_display.repository')
      ->getFormDisplay('node', 'article')
      ->getComponents();

    $this->assertSame('media_library_widget', $components['field_migrate']['type']);
    $this->assertSame('entity_reference_autocomplete', $components['field_ignore']['type']);

    $editor = Editor::load('rich_text');
    $settings = $editor->getSettings();
    $this->assertSame('DrupalMediaLibrary', $settings['toolbar']['rows'][0][3]['items'][3]);

    $filters = $editor->getFilterFormat()->filters();

    $configuration = $filters->get('media_embed')->getConfiguration();
    $this->assertTrue($configuration['status']);
    $this->assertSame('embedded', $configuration['settings']['default_view_mode']);

    $configuration = $filters->get('filter_html')->getConfiguration();
    $this->assertTrue($configuration['status']);
    $this->assertStringContainsString('<drupal-media data-entity-type data-entity-uuid data-view-mode data-align data-caption alt>', $configuration['settings']['allowed_html']);
  }

}

<?php

namespace Drupal\lightning_media\Update;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\Display\EntityFormDisplayInterface;
use Drupal\Core\Entity\EntityDisplayRepositoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\editor\EditorInterface;
use Drupal\filter\FilterFormatInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Contains optional updates targeting Lightning Media 4.0.0.
 *
 * @Update("4.0.0")
 */
final class Update400 implements ContainerInjectionInterface {

  use StringTranslationTrait;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityTypeManager;

  /**
   * Update400 constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * Optionally changes entity browser field widgets to media library widgets.
   *
   * @param \Symfony\Component\Console\Style\StyleInterface $io
   *   The I/O style.
   *
   * @update
   */
  public function convertMediaReferenceFieldsToMediaLibrary(StyleInterface $io) {
    $storage = $this->entityTypeManager->getStorage('entity_form_display');

    /** @var \Drupal\Core\Entity\Display\EntityFormDisplayInterface $display */
    foreach ($storage->loadMultiple() as $display) {
      $changed = FALSE;

      foreach ($display->getComponents() as $name => $component) {
        if ($component['type'] === 'entity_browser_entity_reference' && $component['settings']['entity_browser'] === 'media_browser') {
          $question = $this->getQuestionForMediaReferenceField($display, $name);

          if ($io->confirm($question)) {
            $display->setComponent($name, ['type' => 'media_library_widget']);
            $changed = TRUE;
          }
        }

        if ($changed) {
          $storage->save($display);
        }
      }
    }
  }

  /**
   * Optionally converts WYSIWYG editors to use the media library.
   *
   * @param \Symfony\Component\Console\Style\StyleInterface $io
   *   The I/O style.
   *
   * @update
   */
  public function convertEditorsToMediaLibrary(StyleInterface $io) {
    $storage = $this->entityTypeManager->getStorage('editor');

    /** @var \Drupal\editor\EditorInterface[] $editors */
    $editors = $storage->loadByProperties(['editor' => 'ckeditor']);
    foreach ($editors as $editor) {
      // Check if the editor has the media_browser embed button enabled at all.
      // If it doesn't, there's nothing to do.
      $button_path = $this->getPathToMediaBrowserButton($editor);
      if (empty($button_path)) {
        continue;
      }

      $question = (string) $this->t('Do you want to convert the @editor WYSIWYG editor to use the media library?', [
        '@editor' => $editor->label(),
      ]);
      if ($io->confirm($question)) {
        // Change the 'media_browser' toolbar item to 'drupalmedialibrary'.
        $settings = $editor->getSettings();
        NestedArray::setValue($settings, $button_path, 'DrupalMediaLibrary');
        $editor->setSettings($settings);
        $storage->save($editor);

        // Ensure that the associated filter format, if any, is correctly
        // configured for embedding media.
        if ($editor->hasAssociatedFilterFormat()) {
          $this->setUpFilterFormat($editor->getFilterFormat());
        }
      }
    }
  }

  /**
   * Determines the array path to an editor's media_browser embed button.
   *
   * @param \Drupal\editor\EditorInterface $editor
   *   The editor. It is assumed that it uses CKEditor.
   *
   * @return array
   *   The path to the first media_browser embed button found in the editor's
   *   toolbar items. Empty if the button is not found at all.
   */
  private function getPathToMediaBrowserButton(EditorInterface $editor) {
    $settings = $editor->getSettings();

    foreach ($settings['toolbar']['rows'] as $row_key => $row) {
      foreach ($row as $group_key => $group) {
        $item_key = array_search('media_browser', $group['items'], TRUE);
        if ($item_key !== FALSE) {
          return ['toolbar', 'rows', $row_key, $group_key, 'items', $item_key];
        }
      }
    }
    return [];
  }

  /**
   * Enables the media_embed filter on a single input format.
   *
   * @param \Drupal\filter\FilterFormatInterface $format
   *   The input format.
   */
  private function setUpFilterFormat(FilterFormatInterface $format) {
    $filters = $format->filters();

    // If the format already has the media_embed filter, assume it is set up
    // correctly and bail out.
    $embed_filter = $filters->get('media_embed');
    if ($embed_filter && $embed_filter->status) {
      return;
    }

    // If the HTML filter is enabled, ensure that it allows the custom embed
    // tag used by the media_embed filter.
    $html_filter = $filters->get('filter_html');
    if ($html_filter && $html_filter->status) {
      $configuration = $html_filter->getConfiguration();
      $configuration['settings']['allowed_html'] .= ' <drupal-media data-entity-type data-entity-uuid data-view-mode data-align data-caption alt>';
      $format->setFilterConfig('filter_html', $configuration);
    }

    $format->setFilterConfig('media_embed', [
      'settings' => [
        'default_view_mode' => 'embedded',
        'allowed_view_modes' => [],
      ],
      'status' => TRUE,
    ]);
    $this->entityTypeManager->getStorage('filter_format')->save($format);
  }

  /**
   * Generates a question before migrating a field in an entity form display.
   *
   * @param \Drupal\Core\Entity\Display\EntityFormDisplayInterface $display
   *   The entity form display being processed.
   * @param string $name
   *   The component name.
   *
   * @return string
   *   The question to ask.
   */
  private function getQuestionForMediaReferenceField(EntityFormDisplayInterface $display, $name) {
    $entity_type = $display->getTargetEntityTypeId();
    $bundle = $display->getTargetBundle();

    $variables = [];

    // Get the human-readable field label (e.g. 'Images').
    $variables['@field'] = $this->entityTypeManager
      ->getStorage('field_config')
      ->load("$entity_type.$bundle.$name")
      ->getLabel();

    // Get the human-readable name of the form mode (e.g., 'Media Browser').
    $form_mode = $display->getMode();
    // If this display is for the default form mode, it will not be possible to
    // load the form mode as an entity, so just hard-code the name of the form
    // mode to 'default'.
    if ($form_mode === EntityDisplayRepositoryInterface::DEFAULT_DISPLAY_MODE) {
      $variables['@form_mode'] = (string) $this->t('default');
    }
    else {
      $variables['@form_mode'] = $this->entityTypeManager
        ->getStorage('entity_form_mode')
        ->load("$entity_type.$form_mode")
        ->label();
    }

    $entity_type = $this->entityTypeManager->getDefinition($entity_type);

    $bundle_entity_type = $entity_type->getBundleEntityType();
    if ($bundle_entity_type) {
      // The human-readable name of the bundle entity type, e.g. 'content type'.
      $variables['@bundle_type'] = lcfirst($entity_type->getBundleLabel());

      // The actual label of the specific bundle in use, e.g. 'Article'.
      $variables['@bundle'] = $this->entityTypeManager->getStorage($bundle_entity_type)
        ->load($bundle)
        ->label();

      $question = $this->t('Do you want to convert the @field field of the @bundle @bundle_type to use the media library in the @form_mode form mode?', $variables);
    }
    else {
      // The plural human-readable name of the of the entity type targeted by
      // the display, e.g., 'content items'.
      $variables['@entity_type'] = $this->entityTypeManager
        ->getDefinition($entity_type)
        ->getPluralLabel();

      $question = $this->t('Do you want to convert the @field field of @entity_type to use the media library in the @form_mode form mode?', $variables);
    }
    return (string) $question;
  }

}

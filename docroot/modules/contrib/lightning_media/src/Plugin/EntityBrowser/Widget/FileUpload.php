<?php

namespace Drupal\lightning_media\Plugin\EntityBrowser\Widget;

use Drupal\Core\Ajax\PrependCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormStateInterface;
use Drupal\lightning_media\Element\AjaxUpload;
use Drupal\lightning_media\MediaHelper;
use Drupal\media\MediaInterface;

/**
 * An Entity Browser widget for creating media entities from uploaded files.
 *
 * @EntityBrowserWidget(
 *   id = "file_upload",
 *   label = @Translation("File Upload"),
 *   description = @Translation("Allows creation of media entities from file uploads."),
 * )
 */
class FileUpload extends EntityFormProxy {

  /**
   * {@inheritdoc}
   */
  protected function getInputValue(FormStateInterface $form_state) {
    return $form_state->getValue(['input', 'fid']);
  }

  /**
   * {@inheritdoc}
   */
  protected function prepareEntities(array $form, FormStateInterface $form_state) {
    $entities = parent::prepareEntities($form, $form_state);

    $get_file = function (MediaInterface $entity) {
      return MediaHelper::getSourceField($entity)->entity;
    };

    if ($this->configuration['return_file']) {
      return array_map($get_file, $entities);
    }
    else {
      return $entities;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getForm(array &$original_form, FormStateInterface $form_state, array $additional_widget_parameters) {
    $form = parent::getForm($original_form, $form_state, $additional_widget_parameters);

    $form['entity_form']['input'] = [
      '#type' => 'ajax_upload',
      '#title' => $this->t('File'),
      '#process' => [
        [$this, 'processUploadElement'],
      ],
      '#weight' => 70,
    ];

    $validators = $form_state->get(['entity_browser', 'widget_context', 'upload_validators']) ?: [];

    // If the widget context didn't specify any file extension validation, add
    // it as the first validator, allowing it to accept only file extensions
    // associated with existing media bundles.
    if (empty($validators['file_validate_extensions'])) {
      $allowed_bundles = $this->getAllowedBundles($form_state);
      $extensions = implode(' ', $this->helper->getFileExtensions(TRUE, $allowed_bundles));

      $validators = array_merge([
        'file_validate_extensions' => [
          $extensions,
        ],
      ], $validators);
    }
    $form['entity_form']['input']['#upload_validators'] = $validators;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validate(array &$form, FormStateInterface $form_state) {
    $fid = $this->getInputValue($form_state);

    if ($fid) {
      parent::validate($form, $form_state);
      $allowed_bundles = $this->getAllowedBundles($form_state);

      // Only validate uploaded file if the exact bundle is known.
      if (count($allowed_bundles) === 1) {
        $file = $this->entityTypeManager->getStorage('file')->load($fid);
        $errors = lightning_media_validate_upload($file, $allowed_bundles);

        foreach ($errors as $error) {
          $form_state->setError($form['widget']['entity_form']['input'], $error);
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submit(array &$element, array &$form, FormStateInterface $form_state) {
    /** @var \Drupal\media\MediaInterface $entity */
    $entity = $element['entity_form']['entity']['#entity'];

    $file = MediaHelper::useFile(
      $entity,
      MediaHelper::getSourceField($entity)->entity
    );
    $file->setPermanent();
    $file->save();
    $entity->save();

    $selection = [
      $this->configuration['return_file'] ? $file : $entity,
    ];
    $this->selectEntities($selection, $form_state);
  }

  /**
   * Processes the upload element.
   *
   * @param array $element
   *   The upload element.
   * @param FormStateInterface $form_state
   *   The current form state.
   *
   * @return array
   *   The processed upload element.
   */
  public function processUploadElement(array $element, FormStateInterface $form_state) {
    $element = AjaxUpload::process($element, $form_state);

    $element['upload']['#ajax']['callback'] =
    $element['remove']['#ajax']['callback'] = [static::class, 'ajax'];

    $element['remove']['#value'] = $this->t('Cancel');

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $configuration = parent::defaultConfiguration();
    $configuration['return_file'] = FALSE;
    return $configuration;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['return_file'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Return source file entity'),
      '#default_value' => $this->configuration['return_file'],
      '#description' => $this->t('If checked, the source file(s) of the media entity will be returned from this widget.'),
    ];
    return $form;
  }

}

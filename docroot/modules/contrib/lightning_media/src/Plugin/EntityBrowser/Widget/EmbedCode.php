<?php

namespace Drupal\lightning_media\Plugin\EntityBrowser\Widget;

use Drupal\Core\Form\FormStateInterface;

/**
 * An Entity Browser widget for creating media entities from embed codes.
 *
 * @EntityBrowserWidget(
 *   id = "embed_code",
 *   label = @Translation("Embed Code"),
 *   description = @Translation("Allows creation of media entities from embed codes."),
 * )
 */
class EmbedCode extends EntityFormProxy {

  /**
   * {@inheritdoc}
   */
  public function getForm(array &$original_form, FormStateInterface $form_state, array $additional_widget_parameters) {
    $form = parent::getForm($original_form, $form_state, $additional_widget_parameters);

    $form['entity_form']['input'] = [
      '#type' => 'textarea',
      '#placeholder' => $this->t('Enter a URL...'),
      '#attributes' => [
        'class' => ['keyup-change'],
      ],
      '#ajax' => [
        'event' => 'change',
        'wrapper' => 'entity-form',
        'method' => 'html',
        'callback' => [static::class, 'ajax'],
      ],
      // I don't know why, but this is needed to display error messages.
      '#limit_validation_errors' => [
        ['input'],
      ],
    ];

    // Allow the form to be rebuilt without using AJAX.
    $form['entity_form']['update'] = [
      '#type' => 'submit',
      '#value' => $this->t('Update'),
      '#attributes' => [
        'class' => ['js-hide'],
      ],
      '#submit' => [
        [static::class, 'update'],
      ],
    ];

    return $form;
  }

  /**
   * Submit callback for the Update button.
   *
   * @param array $form
   *   The complete form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current form state.
   */
  public static function update(array &$form, FormStateInterface $form_state) {
    $form_state->setRebuild();
  }

  /**
   * {@inheritdoc}
   */
  public function validate(array &$form, FormStateInterface $form_state) {
    $value = trim($this->getInputValue($form_state));

    if ($value) {
      parent::validate($form, $form_state);
    }
    else {
      $form_state->setError($form['widget']['entity_form']['input'], $this->t('You must enter a URL or embed code.'));
    }

    // Form state errors can't be set here, because then the form won't get
    // rebuilt. Use the messenger service to display error messages.
    foreach ($form_state->getErrors() as $error) {
      $this->messenger()->addError($error);
    }

    $form_state->clearErrors();
  }

}

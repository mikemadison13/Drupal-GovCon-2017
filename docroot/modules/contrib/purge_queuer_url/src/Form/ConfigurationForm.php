<?php

namespace Drupal\purge_queuer_url\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\purge_ui\Form\QueuerConfigFormBase;

/**
 * Configuration form for the Url and Path queuer.
 */
class ConfigurationForm extends QueuerConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['purge_queuer_url.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'purge_queuer_url.configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('purge_queuer_url.settings');
    $form['queue_paths'] = [
      '#title' => $this->t('Queue paths instead of URLs.'),
      '#type' => 'checkbox',
      '#description' => $this->t("If checked this queues paths without the scheme and domain name."),
      '#default_value' => $config->get('queue_paths'),
    ];
    $form['host_override'] = [
      '#title' => $this->t('Hostname'),
      '#type' => 'checkbox',
      '#description' => $this->t("You can override the hostname of the URLs that are queued. When you do this, you will lose any gathered domain names that have been collected but do have full control over how the queued URLs look like."),
      '#default_value' => $config->get('host_override'),
      '#states' => [
        'visible' => [
          ':input[name="queue_paths"]' => ['checked' => FALSE],
        ],
      ],
    ];
    $form['host'] = [
      '#type' => 'textfield',
      '#size' => 30,
      '#default_value' => $config->get('host'),
      '#states' => [
        'visible' => [
          ':input[name="queue_paths"]' => ['checked' => FALSE],
          ':input[name="host_override"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['scheme_override'] = [
      '#title' => $this->t('Scheme'),
      '#type' => 'checkbox',
      '#description' => $this->t("When checked, you can enforce a single scheme like https:// for all the queued URLs instead of logging the schemes that visitors used."),
      '#default_value' => $config->get('scheme_override'),
      '#states' => [
        'visible' => [
          ':input[name="queue_paths"]' => ['checked' => FALSE],
        ],
      ],
    ];
    $form['scheme'] = [
      '#type' => 'select',
      '#default_value' => $config->get('scheme'),
      '#options' => [
        'http' => 'http://',
        'https' => 'https://',
      ],
      '#states' => [
        'visible' => [
          ':input[name="queue_paths"]' => ['checked' => FALSE],
          ':input[name="scheme_override"]' => ['checked' => TRUE],
        ],
      ],
    ];

    // Define a clear button to allow clearing the registry.
    $form['actions']['clear'] = [
      '#type' => 'submit',
      '#value' => $this->t('Clear traffic history'),
      '#weight' => 10,
      '#button_type' => 'danger',
    ];
    if ($this->isDialog($form, $form_state)) {
      $form['actions']['clear']['#ajax'] = ['callback' => '::submitFormClear'];
    }
    else {
      $form['actions']['clear']['#submit'] = [[$this, 'submitFormClear']];
    }

    return parent::buildForm($form, $form_state);
  }

  /**
   * Submit handler that clears the traffic registry.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitFormClear(array &$form, FormStateInterface $form_state) {

    // Clear the traffic registry IF there are no ordinary form errors.
    if (!$form_state->getErrors()) {
      \Drupal::service('purge_queuer_url.registry')->clear();
      drupal_set_message($this->t("The traffic registry has been cleared, your site needs to get regular traffic before it starts queueing URLs or paths again!"));
    }

    // Determine all the AJAX and non-AJAX logic depending on how we're called.
    if ($this->isDialog($form, $form_state)) {
      $response = new AjaxResponse();
      unset($form['#prefix'], $form['#suffix']);
      $form['status_messages'] = [
        '#type' => 'status_messages',
        '#weight' => -10,
      ];
      $response->addCommand(new HtmlCommand('#purgedialogform', $form));
      return $response;
    }

    return parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitFormSuccess(array &$form, FormStateInterface $form_state) {
    $this->config('purge_queuer_url.settings')
      ->set('queue_paths', $form_state->getValue('queue_paths'))
      ->set('host_override', $form_state->getValue('host_override'))
      ->set('host', $form_state->getValue('host'))
      ->set('scheme_override', $form_state->getValue('scheme_override'))
      ->set('scheme', $form_state->getValue('scheme'))
      ->save();
  }

}

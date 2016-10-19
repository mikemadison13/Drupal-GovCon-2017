<?php

namespace Drupal\multiversion\Form;

use Behat\Mink\Exception\Exception;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CloseModalDialogCommand;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Extension\ModuleInstallerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Url;
use Drupal\multiversion\MultiversionManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class MultiversionUninstallForm.
 *
 * @package Drupal\deploy\Form
 */
class MultiversionUninstallForm extends FormBase {

  /**
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * @var \Drupal\multiversion\MultiversionManagerInterface
   */
  protected $multiversionManager;

  /**
   * @var \Drupal\Core\Extension\ModuleInstallerInterface
   */
  protected $moduleInstaller;

  /**
   * @param \Drupal\Core\Render\RendererInterface $renderer
   * @param \Drupal\multiversion\MultiversionManagerInterface $multiversion_manager
   * @param \Drupal\Core\Extension\ModuleInstallerInterface $module_installer
   */
  function __construct(RendererInterface $renderer, MultiversionManagerInterface $multiversion_manager, ModuleInstallerInterface $module_installer) {
    $this->renderer = $renderer;
    $this->multiversionManager = $multiversion_manager;
    $this->moduleInstaller = $module_installer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('renderer'),
      $container->get('multiversion.manager'),
      $container->get('module_installer')
    );
  }

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'uninstall_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $supported_entity_types = $this->multiversionManager->getSupportedEntityTypes();
    $form['warning_list'] = [
      '#theme' => 'item_list',
      '#title' => $this->t('Uninstalling Multiversion will cause loss of revisions in the following entity types:'),
      '#items' => [],
    ];
    foreach ($supported_entity_types as $entity_type) {
      $form['warning_list']['#items'][$entity_type->id()] = $entity_type->getLabel();
    }

    $form['uninstall'] = [
      '#type' => 'submit',
      '#value' => t('Uninstall'),
      '#ajax' => [
        'callback' => [$this, 'uninstallAjax'],
        'event' => 'mousedown',
        'prevent' => 'click',
        'progress' => [
          'type' => 'throbber',
          'message' => 'Uninstalling Multiversion...',
        ],
      ],
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $this->multiversionManager->disableEntityTypes();
      $this->moduleInstaller->uninstall(['multiversion']);
      drupal_set_message('Successfully uninstalled Multiversion.');
      $form_state->setRedirect('system.modules_list');
    }
    catch (Exception $e) {
      watchdog_exception('multiversion', $e);
      drupal_set_message('An error occurred while uninstalling Multiversion: ' . $e->getMessage(), 'error');
    }
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return AjaxResponse
   */
  public function uninstallAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $response->addCommand(new CloseModalDialogCommand());
    $response->addCommand(new RedirectCommand(Url::fromRoute('system.modules_list')->toString()));
    return $response;
  }

}

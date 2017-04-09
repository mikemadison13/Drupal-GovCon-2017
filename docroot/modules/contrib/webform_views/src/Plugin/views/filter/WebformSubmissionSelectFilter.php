<?php

namespace Drupal\webform_views\Plugin\views\filter;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\filter\InOperator;
use Drupal\webform_views\Plugin\views\WebformSubmissionTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Select filter based on value of a webform submission.
 *
 * @ViewsFilter("webform_submission_select_filter")
 */
class WebformSubmissionSelectFilter extends InOperator {

  use WebformSubmissionTrait;

  protected $valueFormType = 'select';

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }

  /**
   * WebformSubmissionFieldFilter constructor.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function valueForm(&$form, FormStateInterface $form_state) {
    parent::valueForm($form, $form_state);
    unset($form['value']['#options']['all']);
  }

  /**
   * {@inheritdoc}
   */
  public function getValueOptions() {
    if (!isset($this->valueOptions)) {
      $webform = $this->entityTypeManager->getStorage('webform')->load($this->definition['webform_id']);
      $element = $webform->getElementInitialized($this->definition['webform_submission_field']);

      $this->valueOptions = $element['#options'];
    }
    return $this->valueOptions;
  }

}

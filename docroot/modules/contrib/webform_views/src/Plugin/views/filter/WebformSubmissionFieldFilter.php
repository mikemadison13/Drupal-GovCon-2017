<?php

namespace Drupal\webform_views\Plugin\views\filter;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\filter\StringFilter;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Filter based on value of a webform submission.
 *
 * @ViewsFilter("webform_submission_field_filter")
 */
class WebformSubmissionFieldFilter extends StringFilter {

  /**
   * Constant that denotes using webform element type for value form.
   *
   * @var string
   */
  const ELEMENT_TYPE = 'element';

  /**
   * @var EntityTypeManagerInterface
   */
  protected $entityTypeManager;

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
    $webform = $this->entityTypeManager->getStorage('webform')->load($this->definition['webform_id']);
    $operator_definition = $this->operators()[$this->operator];
    $element = $webform->getElementInitialized($this->definition['webform_submission_field']);
    $element['#default_value'] = $this->value;

    if (isset($operator_definition['webform_views_element_type']) && $operator_definition['webform_views_element_type'] != self::ELEMENT_TYPE) {
      $element['#type'] = $operator_definition['webform_views_element_type'];
    }

    $form['value'] = $element;
  }

  /**
   * {@inheritdoc}
   */
  public function acceptExposedInput($input) {
    if (parent::acceptExposedInput($input)) {
      if (empty($this->options['exposed'])) {
        return TRUE;
      }

      if (!empty($this->options['expose']['identifier'])) {
        $value = $input[$this->options['expose']['identifier']];

        return (bool) $value;
      }
    }
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  function operators() {
    $operators = parent::operators();

    // We additionally mark each operator as whether it should use element form
    // or just a text field. For example, when you filter by email, generally
    // you want to use #type => 'email', i.e. the element form, but when you do
    // "contains" or "regex" or similar operator, you want to have just a text
    // field.
    $operator_map = [
      '=' => self::ELEMENT_TYPE,
      '!=' => self::ELEMENT_TYPE,
      'contains' => 'textfield',
      'word' => 'textfield',
      'allwords' => 'textfield',
      'starts' => 'textfield',
      'not_starts' => 'textfield',
      'ends' => 'textfield',
      'not_ends' => 'textfield',
      'not' => 'textfield',
      'shorterthan' => 'number',
      'longerthan' => 'number',
      'regular_expression' => 'textfield',
    ];

    foreach ($operators as $k => $v) {
      if (isset($operator_map[$k])) {
        $operators[$k]['webform_views_element_type'] = $operator_map[$k];
      }
    }

    return $operators;
  }

}

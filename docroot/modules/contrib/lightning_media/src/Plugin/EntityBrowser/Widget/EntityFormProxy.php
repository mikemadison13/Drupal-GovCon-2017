<?php

namespace Drupal\lightning_media\Plugin\EntityBrowser\Widget;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\PrependCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormStateInterface;
use Drupal\entity_browser\WidgetBase;
use Drupal\inline_entity_form\ElementSubmit;
use Drupal\lightning_media\Exception\IndeterminateBundleException;
use Drupal\lightning_media\MediaHelper;
use Drupal\media\MediaTypeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Base class for EB widgets which wrap around an (inline) entity form.
 */
abstract class EntityFormProxy extends WidgetBase {

  /**
   * The media helper service.
   *
   * @var \Drupal\lightning_media\MediaHelper
   */
  protected $helper;

  /**
   * EntityFormProxy constructor.
   *
   * @param array $configuration
   *   Plugin configuration.
   * @param string $plugin_id
   *   The plugin ID.
   * @param mixed $plugin_definition
   *   The plugin definition.
   * @param mixed $event_dispatcher
   *   The event dispatcher.
   * @param mixed $entity_type_manager
   *   The entity type manager service.
   * @param mixed $widget_validation_manager
   *   The widget validation manager.
   * @param \Drupal\lightning_media\MediaHelper $helper
   *   The media helper service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, $event_dispatcher, $entity_type_manager, $widget_validation_manager, MediaHelper $helper) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $event_dispatcher, $entity_type_manager, $widget_validation_manager);
    $this->helper = $helper;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('event_dispatcher'),
      $container->get('entity_type.manager'),
      $container->get('plugin.manager.entity_browser.widget_validation'),
      $container->get('lightning.media_helper')
    );
  }

  /**
   * Returns the bundles that this widget may use.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current form state.
   *
   * @return string[]
   *   The bundles that this widget may use. If all bundles may be used, the
   *   returned array will be empty.
   */
  protected function getAllowedBundles(FormStateInterface $form_state) {
    $bundle = $form_state->getValue('bundle');
    if ($bundle) {
      return [
        $bundle,
      ];
    }

    return (array) $form_state->get(['entity_browser', 'widget_context', 'target_bundles']);
  }

  /**
   * {@inheritdoc}
   */
  public function getForm(array &$original_form, FormStateInterface $form_state, array $additional_widget_parameters) {
    $form = parent::getForm($original_form, $form_state, $additional_widget_parameters);

    if (isset($form['actions'])) {
      $form['actions']['#weight'] = 100;
    }

    $form['entity_form'] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => 'entity-form',
      ],
      'entity' => [
        '#prefix' => '<div id="entity">',
        '#suffix' => '</div>',
        '#weight' => 90,
      ],
      'bundle' => [
        '#prefix' => '<div id="bundle">',
        '#suffix' => '</div>',
        '#weight' => 80,
      ],
    ];

    $value = $this->getInputValue($form_state);
    if (empty($value)) {
      return $form;
    }

    $allowed_bundles = $this->getAllowedBundles($form_state);
    $applicable_bundles = $this->helper->getBundlesFromInput($value, $allowed_bundles);

    // Show bundle select for ambiguous bundles before creating the entity.
    if (count($applicable_bundles) > 1 && count($allowed_bundles) !== 1) {
      // Options array for the Bundle select.
      // @code
      //   $options = [
      //     '' => 'None',
      //     'image' => 'Image',
      //     'image_2' => 'Image 2',
      //   ];
      // @endcode
      $options = array_reduce(
        $applicable_bundles,
        function (array $options, MediaTypeInterface $media_type) {
          $options[$media_type->id()] = $media_type->label();

          return $options;
        },
        [
          '' => $this->t('- Select -'),
        ]
      );

      $form['entity_form']['bundle'] += [
        '#type' => 'select',
        '#title' => $this->t('Bundle'),
        '#options' => $options,
        '#required' => TRUE,
        '#default_value' => '',
        '#ajax' => [
          'callback' => [
            static::class, 'ajax',
          ],
        ],
      ];

      return $form;
    }

    try {
      $entity = $this->helper->createFromInput($value, $allowed_bundles);
    }
    catch (IndeterminateBundleException $e) {
      return $form;
    }

    $form['entity_form']['entity'] += [
      '#type' => 'inline_entity_form',
      '#entity_type' => $entity->getEntityTypeId(),
      '#bundle' => $entity->bundle(),
      '#default_value' => $entity,
      '#form_mode' => $this->configuration['form_mode'],
    ];
    // Without this, IEF won't know where to hook into the widget. Don't pass
    // $original_form as the second argument to addCallback(), because it's not
    // just the entity browser part of the form, not the actual complete form.
    ElementSubmit::addCallback($form['actions']['submit'], $form_state->getCompleteForm());

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  protected function prepareEntities(array $form, FormStateInterface $form_state) {
    if (isset($form['widget']['entity_form']['entity']['#entity'])) {
      return [
        $form['widget']['entity_form']['entity']['#entity'],
      ];
    }
    else {
      return [];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function validate(array &$form, FormStateInterface $form_state) {
    parent::validate($form, $form_state);

    $value = $this->getInputValue($form_state);
    try {
      $this->helper->getBundleFromInput($value, TRUE, $this->getAllowedBundles($form_state));
    }
    catch (IndeterminateBundleException $e) {
      $form_state->setError($form['widget']['entity_form']['input'], $e->getMessage());
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submit(array &$element, array &$form, FormStateInterface $form_state) {
    // IEF will take care of creating the entity upon submission. All we need to
    // do is send it upstream to Entity Browser.
    $entity = $form['widget']['entity_form']['entity']['#entity'];
    $this->selectEntities([$entity], $form_state);
  }

  /**
   * AJAX callback. Returns the rebuilt inline entity form.
   *
   * @param array $form
   *   The complete form.
   * @param FormStateInterface $form_state
   *   The current form state.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   The AJAX response.
   */
  public static function ajax(array &$form, FormStateInterface $form_state) {
    return (new AjaxResponse())
      ->addCommand(
        new ReplaceCommand('#entity-form', $form['widget']['entity_form'])
      )
      ->addCommand(
        new PrependCommand('#entity-form', ['#type' => 'status_messages'])
      );
  }

  /**
   * Returns the current input value, if any.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current form state.
   *
   * @return mixed
   *   The input value, ready for further processing. Nothing will be done with
   *   the value if it's empty.
   */
  protected function getInputValue(FormStateInterface $form_state) {
    return $form_state->getValue('input');
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $configuration = parent::defaultConfiguration();
    $configuration['form_mode'] = 'media_browser';
    return $configuration;
  }

}

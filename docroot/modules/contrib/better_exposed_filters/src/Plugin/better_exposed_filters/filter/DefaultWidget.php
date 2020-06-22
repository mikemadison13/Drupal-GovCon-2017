<?php

namespace Drupal\better_exposed_filters\Plugin\better_exposed_filters\filter;

use Drupal\Core\Form\FormStateInterface;

/**
 * Default widget implementation.
 *
 * @BetterExposedFiltersFilterWidget(
 *   id = "default",
 *   label = @Translation("Default"),
 * )
 */
class DefaultWidget extends FilterWidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function isApplicable($filter = NULL, array $filter_options = []) {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function exposedFormAlter(array &$form, FormStateInterface $form_state) {
    $field_id = $this->getExposedFilterFieldId();
    $type = $this->getExposedFilterWidgetType();

    parent::exposedFormAlter($form, $form_state);

    if ($type === 'select') {
      // Workaround to add support for merging process and pre-render functions
      // to the render array of an element.
      // @todo remove once core issue is resolved.
      // @see https://www.drupal.org/project/drupal/issues/2070131
      $form[$field_id]['#process'][] = ['\Drupal\Core\Render\Element\Select', 'processSelect'];
      $form[$field_id]['#process'][] = ['\Drupal\Core\Render\Element\Select', 'processAjaxForm'];
      $form[$field_id]['#pre_render'][] = ['\Drupal\Core\Render\Element\Select', 'preRenderSelect'];
    }
  }

}

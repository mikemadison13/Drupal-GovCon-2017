<?php

/**
 * Field handler to show commerce discount operations in dropbutton.
 */
class commerce_discount_handler_field_type extends views_handler_field_machine_name {
  /**
   * @var array Stores the available options.
   */
  var $value_options;

  function option_definition() {
    $options = parent::option_definition();
    return $options;
  }

  function get_value_options() {
    if (isset($this->value_options)) {
      return;
    }

    if (isset($this->definition['options callback']) && is_callable($this->definition['options callback'])) {
      if (isset($this->definition['options arguments']) && is_array($this->definition['options arguments'])) {
        $this->value_options = call_user_func_array($this->definition['options callback'], $this->definition['options arguments']);
      }
      else {
        $this->value_options = call_user_func($this->definition['options callback']);
      }
    }
    else {
      $this->value_options = array();
    }
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
  }

  function pre_render(&$values) {
    $this->get_value_options();
  }

  function render($values) {
    $value = $values->{$this->field_alias};
    if (!empty($this->options['machine_name']) || !isset($this->value_options[$value])) {
      $result = check_plain($value);
    }
    // We must attempt to fetch the currency here in the view for fixed amount
    // because the label is cached in the entity info to the site default currency.
    else if ($value == 'fixed_amount') {
      $result = t('@currency off', array('@currency' => commerce_currency_get_symbol(commerce_default_currency())));
    }
    else {
      $result = $this->value_options[$value];
    }

    return $result;
  }
}
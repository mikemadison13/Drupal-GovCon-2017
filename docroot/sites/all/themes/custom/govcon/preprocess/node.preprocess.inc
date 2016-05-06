<?php

/**
 * Implements hook_preprocess_node().
 */

function govcon_preprocess_node(&$vars) {
  if (variable_get('node_submitted_' . $vars['node']->type, TRUE)) {
    $date = format_date($vars['node']->created, 'date_no_time');
    $vars['submitted'] = t('!username on !datetime', array('!username' => $vars['name'], '!datetime' => $date));
  }
}
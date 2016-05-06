<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * GovCon theme.
 */

 /**
 * Implementation of hook_form_alter(). *
 *  
 */
function govcon_form_alter(&$form, &$form_state, $form_id) {  
  if ($form_id == 'user_login' || $form_id == 'user_pass') {  
    $form['#attributes']['class'][] = 'bevel';
	}
}

function govcon_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' <span class="arrow"></span> ', $breadcrumb) . '</div>';
    return $output;
  }
}
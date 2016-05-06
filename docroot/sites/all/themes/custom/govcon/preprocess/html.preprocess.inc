<?php

/**
 * Implements hook_preprocess_html().
 */
function govcon_preprocess_html(&$variables) {
  drupal_add_css('//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic',array('type' => 'external'));
  drupal_add_css('//fonts.googleapis.com/css?family=Courgette',array('type' => 'external'));
}
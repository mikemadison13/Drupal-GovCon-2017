<?php
/**
 * @file
 * Views hooks for cod_session feature
 */

/**
 * Implements hook_views_plugins().
 */
function cod_session_views_plugins() {
  return array(
    'module' => 'cod_session',
    'pager' => array(
      'session_more' => array(
        'title' => t('COD Session Link Pager'),
        'help' => t('cod_session'),
        'help topic' => '',
        'handler' => 'views_plugin_pager_session_more',
        'uses options' => TRUE,
        'parent' => 'some'
      ),
    ),
  );
}

/**
 * Implements hook_views_data_alter().
 */
function cod_session_views_data_alter(&$data) {
  // Allow views to relate registrations to users.
  $return = $data;
  $data['taxonomy_term_data']['session_track_link'] = array(
    'field' => array(
      'title' => t('Session Track Link'),
      'help' => t('Filter or unfilter a track on the sessions page'),
      'handler' => 'cod_session_views_handler_field_track_link',
    ),
  );
  $data['views']['sessions_more_link'] = array(
    'title' => t('Session Track Link'),
    'help' => t('Display a more sessions based on track link.'),
    'area' => array(
      'handler' => 'cod_session_views_handler_field_track_link',
    ),
  );
}

/**
 * Implements hook_views_plugins_alter().
 */
function cod_session_views_plugins_alter(&$plugins) {
  if (isset($plugins['argument validator']['taxonomy_term']['handler'])) {
    $handler = 'views_plugin_argument_validate_cod_session';
    $path = drupal_get_path('module', 'cod_session') . '/views/modules/taxonomy';
    $file = 'views_plugin_argument_validate_cod_session.inc';

    $plugins['argument validator']['taxonomy_term']['handler'] = $handler;
    $plugins['argument validator']['taxonomy_term']['path'] = $path;
    $plugins['argument validator']['taxonomy_term']['file'] = $file;
    $plugins['argument validator']['taxonomy_term']['module'] = 'cod_session';
  }
}

/**
 * Implements hook_views_data().

function cod_session_views_data() {
  $data = array();
  $data['views']['sessions_more_link'] = array(
    'title' => t('Session Track Link'),
    'help' => t('Display a more sessions based on track link.'),
    'area' => array(
      'handler' => 'cod_session_views_handler_area_more_link',
    ),
  );
  return $data;
}*/

<?php
/**
 * @file
 * cod_news_session.features.field_instance.inc
 */

/**
 * Implements hook_field_default_field_instances().
 */
function cod_news_session_field_default_field_instances() {
  $field_instances = array();

  // Exported field_instance: 'node-session-field_news_image'.
  $field_instances['node-session-field_news_image'] = array(
    'bundle' => 'session',
    'deleted' => 0,
    'description' => 'An image to be used for highlighted sessions in the front page rotator.',
    'display' => array(
      'default' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 9,
      ),
      'listing' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
      'teaser' => array(
        'label' => 'above',
        'settings' => array(),
        'type' => 'hidden',
        'weight' => 0,
      ),
    ),
    'entity_type' => 'node',
    'field_name' => 'field_news_image',
    'label' => 'Image',
    'required' => 0,
    'settings' => array(
      'alt_field' => 0,
      'default_image' => 0,
      'file_directory' => '',
      'file_extensions' => 'png gif jpg jpeg',
      'max_filesize' => '',
      'max_resolution' => '',
      'min_resolution' => '',
      'title_field' => 0,
      'user_register_form' => FALSE,
    ),
    'widget' => array(
      'active' => 1,
      'module' => 'image',
      'settings' => array(
        'preview_image_style' => 'thumbnail',
        'progress_indicator' => 'throbber',
      ),
      'type' => 'image_image',
      'weight' => 9,
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Image');

  return $field_instances;
}

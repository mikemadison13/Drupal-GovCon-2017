<?php
/**
 * @file
 * cod_session_confirm.features.inc
 */

/**
 * Implements hook_eck_bundle_info().
 */
function cod_session_confirm_eck_bundle_info() {
  $items = array(
    'cod_email_accepted_session' => array(
      'machine_name' => 'cod_email_accepted_session',
      'entity_type' => 'cod_email',
      'name' => 'accepted_session',
      'label' => 'Accepted Session',
      'config' => array(),
    ),
  );
  return $items;
}

/**
 * Implements hook_flag_default_flags().
 */
function cod_session_confirm_flag_default_flags() {
  $flags = array();
  // Exported flag: "Session Accept".
  $flags['session_accept'] = array(
    'entity_type' => 'node',
    'title' => 'Session Accept',
    'global' => 1,
    'types' => array(
      0 => 'session',
    ),
    'flag_short' => 'Accept Session',
    'flag_long' => 'Notify authors of acceptance',
    'flag_message' => 'Email Sent',
    'unflag_short' => 'Unaccept Session',
    'unflag_long' => 'Reset accept filter.',
    'unflag_message' => 'Session unaccepted',
    'unflag_denied_text' => '',
    'link_type' => 'toggle',
    'weight' => -8,
    'show_in_links' => array(
      'full' => 'full',
      'teaser' => 'teaser',
      'token' => 'token',
      'rss' => 0,
      'search_index' => 0,
      'search_result' => 0,
      'listing' => 0,
      'diff_standard' => 0,
    ),
    'show_as_field' => 1,
    'show_on_form' => 0,
    'access_author' => '',
    'show_contextual_link' => 0,
    'i18n' => 0,
    'api_version' => 3,
    'module' => 'cod_session_confirm',
    'locked' => array(
      0 => 'name',
    ),
  );
  // Exported flag: "Speaker confirmation flag".
  $flags['session_confirm'] = array(
    'entity_type' => 'node',
    'title' => 'Speaker confirmation flag',
    'global' => 0,
    'types' => array(
      0 => 'session',
    ),
    'flag_short' => 'I confirm that I can present this sesssion at the listed date and time.',
    'flag_long' => 'Once confirmed, you cannot unconfirm without contacting the session organizers.',
    'flag_message' => 'Thanks for confirming that you can present [node:title] at this date and time!',
    'unflag_short' => 'Cancel confirmation',
    'unflag_long' => '',
    'unflag_message' => '',
    'unflag_denied_text' => 'You have confirmed that you will be presenting for this session.',
    'link_type' => 'toggle',
    'weight' => 0,
    'show_in_links' => array(
      'teaser' => TRUE,
      'full' => TRUE,
    ),
    'show_as_field' => FALSE,
    'show_on_form' => 0,
    'access_author' => 'own',
    'show_contextual_link' => 0,
    'i18n' => 0,
    'module' => 'cod_session',
    'locked' => array(
      0 => 'name',
    ),
    'api_version' => 3,
  );
  return $flags;

}

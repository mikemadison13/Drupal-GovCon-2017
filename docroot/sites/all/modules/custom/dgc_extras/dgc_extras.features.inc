<?php
/**
 * @file
 * dgc_extras.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function dgc_extras_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_field_default_field_bases_alter().
 */
function dgc_extras_field_default_field_bases_alter(&$data) {
  if (isset($data['field_dietary_needs'])) {
    $data['field_dietary_needs']['settings']['allowed_values']['None'] = 'None'; /* WAS: '' */
    unset($data['field_dietary_needs']['foreign keys']);
  }
  if (isset($data['field_t_shirt_size'])) {
    $data['field_t_shirt_size']['settings']['allowed_values']['2XL'] = '2XL'; /* WAS: '' */
    $data['field_t_shirt_size']['settings']['allowed_values']['Large'] = 'Large'; /* WAS: '' */
    $data['field_t_shirt_size']['settings']['allowed_values']['Small'] = 'Small'; /* WAS: '' */
    unset($data['field_t_shirt_size']['foreign keys']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Mens L']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Mens M']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Mens S']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Mens XL']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Mens XS']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Womens L']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Womens M']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Womens S']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Womens XL']);
    unset($data['field_t_shirt_size']['settings']['allowed_values']['Womens XS']);
  }
}

/**
 * Implements hook_field_group_info_alter().
 */
function dgc_extras_field_group_info_alter(&$data) {
  if (isset($data['group_cod_profile_details|user|user|form'])) {
    $data['group_cod_profile_details|user|user|form']->data['weight'] = 13; /* WAS: 11 */
  }
  if (isset($data['group_cod_profile_social|user|user|form'])) {
    $data['group_cod_profile_social|user|user|form']->data['weight'] = 12; /* WAS: 10 */
  }
}

/**
 * Implements hook_field_default_field_instances_alter().
 */
function dgc_extras_field_default_field_instances_alter(&$data) {
  if (isset($data['user-user-field_profile_bio'])) {
    $data['user-user-field_profile_bio']['widget']['weight'] = 10; /* WAS: 8 */
  }
  if (isset($data['user-user-field_profile_interests'])) {
    $data['user-user-field_profile_interests']['widget']['weight'] = 11; /* WAS: 9 */
  }
  if (isset($data['user-user-field_profile_location'])) {
    unset($data['user-user-field_profile_location']);
  }
  if (isset($data['user-user-field_profile_org'])) {
    $data['user-user-field_profile_org']['widget']['weight'] = 7; /* WAS: 5 */
  }
  if (isset($data['user-user-field_profile_phone'])) {
    $data['user-user-field_profile_phone']['widget']['weight'] = 8; /* WAS: 6 */
  }
  if (isset($data['user-user-field_t_shirt_size'])) {
    $data['user-user-field_t_shirt_size']['description'] = 'All sizes listed are men\'s, so please select appropriately.'; /* WAS: '' */
  }
}

/**
 * Implements hook_flag_default_flags_alter().
 */
function dgc_extras_flag_default_flags_alter(&$data) {
  if (isset($data['session_schedule'])) {
    $data['session_schedule']['show_as_field'] = 0; /* WAS: FALSE */
    $data['session_schedule']['show_in_links']['diff_standard'] = 0; /* WAS: '' */
    $data['session_schedule']['show_in_links']['full'] = 'full'; /* WAS: TRUE */
    $data['session_schedule']['show_in_links']['listing'] = 0; /* WAS: '' */
    $data['session_schedule']['show_in_links']['rss'] = 0; /* WAS: '' */
    $data['session_schedule']['show_in_links']['search_index'] = 0; /* WAS: '' */
    $data['session_schedule']['show_in_links']['search_result'] = 0; /* WAS: '' */
    $data['session_schedule']['show_in_links']['teaser'] = 0; /* WAS: '' */
    $data['session_schedule']['show_in_links']['token'] = 0; /* WAS: '' */
  }
}

/**
 * Implements hook_default_page_manager_pages_alter().
 */
function dgc_extras_default_page_manager_pages_alter(&$data) {
  if (isset($data['cod_schedule_public'])) {
    $data['cod_schedule_public']->access['settings'] = NULL; /* WAS: '' */
    $data['cod_schedule_public']->access['type'] = 'none'; /* WAS: '' */
    $data['cod_schedule_public']->default_handlers['page_cod_schedule_public__panel_context_931cc9dd-ba60-4165-9530-0abad52c7c4b']->conf['display']->content['new-57a703d0-e549-4b24-8ca2-634eb677c6d7'] = (object) array(
      'pid' => 'new-57a703d0-e549-4b24-8ca2-634eb677c6d7',
      'panel' => 'content',
      'type' => 'block',
      'subtype' => 'views-d0ac992818bd16258ffbea5a3c8fd25c',
      'shown' => TRUE,
      'access' => array(),
      'configuration' => array(
        'inherit_path' => 1,
        'override_title' => 0,
        'override_title_text' => '',
        'override_title_heading' => 'h2',
      ),
      'cache' => array(),
      'style' => array(
        'settings' => NULL,
      ),
      'css' => array(),
      'extras' => array(),
      'position' => 0,
      'locks' => array(),
      'uuid' => '57a703d0-e549-4b24-8ca2-634eb677c6d7',
    ); /* WAS: '' */
    $data['cod_schedule_public']->default_handlers['page_cod_schedule_public__panel_context_931cc9dd-ba60-4165-9530-0abad52c7c4b']->conf['display']->content['new-9e8372a0-8ecc-47e1-9a24-f1442c15066f'] = (object) array(
      'pid' => 'new-9e8372a0-8ecc-47e1-9a24-f1442c15066f',
      'panel' => 'preface',
      'type' => 'custom',
      'subtype' => 'custom',
      'shown' => TRUE,
      'access' => array(),
      'configuration' => array(
        'admin_title' => 'Schedule links',
        'title' => '',
        'body' => '<p><a class="button btn-big" href="">Conference Schedule</a> <a class="button btn-big" href="%node:url/schedule/mine">My Schedule</a> <a class="button btn-big" href="%node:url/bofs">BoFs</a> <a class="button btn-big" href="%node:url/floor-layouts">Floor Layouts</a></p>
                                                ',
        'format' => 'filtered_html',
        'substitute' => 1,
      ),
      'cache' => array(),
      'style' => array(
        'settings' => NULL,
      ),
      'css' => array(),
      'extras' => array(),
      'position' => 0,
      'locks' => array(),
      'uuid' => '9e8372a0-8ecc-47e1-9a24-f1442c15066f',
    ); /* WAS: '' */
    $data['cod_schedule_public']->default_handlers['page_cod_schedule_public__panel_context_931cc9dd-ba60-4165-9530-0abad52c7c4b']->conf['display']->content['new-da4f4f1a-2b55-4e8e-95ce-e40a92a0dbfb']->position = 1; /* WAS: 0 */
    $data['cod_schedule_public']->default_handlers['page_cod_schedule_public__panel_context_931cc9dd-ba60-4165-9530-0abad52c7c4b']->conf['display']->panels['content'][1] = 'new-57a703d0-e549-4b24-8ca2-634eb677c6d7'; /* WAS: '' */
    $data['cod_schedule_public']->default_handlers['page_cod_schedule_public__panel_context_931cc9dd-ba60-4165-9530-0abad52c7c4b']->conf['display']->panels['preface'] = array(
      0 => 'new-9e8372a0-8ecc-47e1-9a24-f1442c15066f',
    ); /* WAS: '' */
  }
}

/**
 * Implements hook_strongarm_alter().
 */
function dgc_extras_strongarm_alter(&$data) {
  if (isset($data['field_bundle_settings_user__user'])) {
    $data['field_bundle_settings_user__user']->value['extra_fields']['form']['ckeditor']['weight'] = 15; /* WAS: 12 */
    $data['field_bundle_settings_user__user']->value['extra_fields']['form']['contact'] = array(
      'weight' => 5,
    ); /* WAS: '' */
    $data['field_bundle_settings_user__user']->value['extra_fields']['form']['redirect'] = array(
      'weight' => 17,
    ); /* WAS: '' */
    $data['field_bundle_settings_user__user']->value['extra_fields']['form']['timezone']['weight'] = 16; /* WAS: 14 */
  }
}

/**
 * Implements hook_views_default_views_alter().
 */
function dgc_extras_views_default_views_alter(&$data) {
  if (isset($data['cod_bof_schedule'])) {
    $data['cod_bof_schedule']->display['default']->display_options['fields']['field_evttime_date_1']['settings']['format_type'] = 'day_of_the_week'; /* WAS: 'time_slot' */
    $data['cod_bof_schedule']->display['default']->display_options['fields']['field_evttime_date_1']['settings']['show_remaining_days'] = 0; /* WAS: '' */
    $data['cod_bof_schedule']->display['default']->display_options['fields']['field_evttime_date_1']['ui_name'] = 'Time: Date and time (Time slot day)'; /* WAS: '' */
    $data['cod_bof_schedule']->display['default']->display_options['fields']['field_evttime_date_2'] = array(
      'id' => 'field_evttime_date_2',
      'table' => 'field_data_field_evttime_date',
      'field' => 'field_evttime_date',
      'ui_name' => 'Time: Date and time (Time slot time)',
      'label' => '',
      'element_label_colon' => FALSE,
      'settings' => array(
        'format_type' => 'cod_time',
        'fromto' => 'both',
        'multiple_number' => '',
        'multiple_from' => '',
        'multiple_to' => '',
        'show_remaining_days' => 0,
      ),
    ); /* WAS: '' */
    $data['cod_bof_schedule']->display['default']->display_options['fields']['field_evttime_date']['settings']['format_type'] = 'day_of_the_week'; /* WAS: 'date_no_time' */
    $data['cod_bof_schedule']->display['default']->display_options['fields']['field_evttime_date']['settings']['show_remaining_days'] = 0; /* WAS: '' */
  }
  if (isset($data['cod_schedule'])) {
    $data['cod_schedule']->display['my_schedule_times'] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:6:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:8:"defaults";a:5:{s:5:"title";b:0;s:13:"relationships";b:0;s:6:"fields";b:0;s:13:"filter_groups";b:0;s:7:"filters";b:0;}s:13:"relationships";a:1:{s:17:"og_membership_rel";a:3:{s:2:"id";s:17:"og_membership_rel";s:5:"table";s:14:"cod_event_time";s:5:"field";s:17:"og_membership_rel";}}s:6:"fields";a:5:{s:6:"evttid";a:5:{s:2:"id";s:6:"evttid";s:5:"table";s:14:"cod_event_time";s:5:"field";s:6:"evttid";s:7:"exclude";b:1;s:9:"separator";s:0:"";}s:18:"field_evttime_date";a:6:{s:2:"id";s:18:"field_evttime_date";s:5:"table";s:29:"field_data_field_evttime_date";s:5:"field";s:18:"field_evttime_date";s:5:"label";s:7:"Day Tab";s:7:"exclude";b:1;s:8:"settings";a:6:{s:11:"format_type";s:15:"day_of_the_week";s:6:"fromto";s:5:"value";s:15:"multiple_number";s:0:"";s:13:"multiple_from";s:0:"";s:11:"multiple_to";s:0:"";s:19:"show_remaining_days";i:0;}}s:20:"field_evttime_date_1";a:7:{s:2:"id";s:20:"field_evttime_date_1";s:5:"table";s:29:"field_data_field_evttime_date";s:5:"field";s:18:"field_evttime_date";s:7:"ui_name";s:35:"Time: Date and time (Time slot day)";s:5:"label";s:0:"";s:19:"element_label_colon";b:0;s:8:"settings";a:6:{s:11:"format_type";s:15:"day_of_the_week";s:6:"fromto";s:4:"both";s:15:"multiple_number";s:0:"";s:13:"multiple_from";s:0:"";s:11:"multiple_to";s:0:"";s:19:"show_remaining_days";i:0;}}s:20:"field_evttime_date_2";a:7:{s:2:"id";s:20:"field_evttime_date_2";s:5:"table";s:29:"field_data_field_evttime_date";s:5:"field";s:18:"field_evttime_date";s:7:"ui_name";s:36:"Time: Date and time (Time slot time)";s:5:"label";s:0:"";s:19:"element_label_colon";b:0;s:8:"settings";a:6:{s:11:"format_type";s:8:"cod_time";s:6:"fromto";s:4:"both";s:15:"multiple_number";s:0:"";s:13:"multiple_from";s:0:"";s:11:"multiple_to";s:0:"";s:19:"show_remaining_days";i:0;}}s:4:"view";a:8:{s:2:"id";s:4:"view";s:5:"table";s:5:"views";s:5:"field";s:4:"view";s:5:"label";s:0:"";s:19:"element_label_colon";b:0;s:10:"hide_empty";b:1;s:4:"view";s:23:"dgc_my_schedule_content";s:9:"arguments";s:43:"[!evttid]/session+schedule_item+bof_session";}}s:14:"argument_input";a:1:{s:3:"gid";a:6:{s:4:"type";s:4:"user";s:7:"context";s:21:"entity:comment.author";s:16:"context_optional";i:0;s:5:"panel";s:1:"0";s:5:"fixed";s:0:"";s:5:"label";s:10:"Conference";}}s:19:"inherit_panels_path";s:1:"1";}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:17:"my_schedule_times";s:13:"display_title";s:17:"My schedule times";s:14:"display_plugin";s:10:"panel_pane";s:8:"position";i:0;}'); /* WAS: '' */
    $data['cod_schedule']->display['panel_pane_1']->display_options['defaults']['fields'] = FALSE; /* WAS: '' */
    $data['cod_schedule']->display['panel_pane_1']->display_options['defaults']['filter_groups'] = FALSE; /* WAS: '' */
    $data['cod_schedule']->display['panel_pane_1']->display_options['defaults']['filters'] = FALSE; /* WAS: '' */
    $data['cod_schedule']->display['panel_pane_1']->display_options['defaults']['relationships'] = FALSE; /* WAS: '' */
    $data['cod_schedule']->display['panel_pane_1']->display_options['fields'] = array(
      'evttid' => array(
        'id' => 'evttid',
        'table' => 'cod_event_time',
        'field' => 'evttid',
        'exclude' => TRUE,
        'separator' => '',
      ),
      'field_evttime_date' => array(
        'id' => 'field_evttime_date',
        'table' => 'field_data_field_evttime_date',
        'field' => 'field_evttime_date',
        'label' => 'Day Tab',
        'exclude' => TRUE,
        'settings' => array(
          'format_type' => 'day_of_the_week',
          'fromto' => 'value',
          'multiple_number' => '',
          'multiple_from' => '',
          'multiple_to' => '',
          'show_remaining_days' => 0,
        ),
      ),
      'field_evttime_date_1' => array(
        'id' => 'field_evttime_date_1',
        'table' => 'field_data_field_evttime_date',
        'field' => 'field_evttime_date',
        'ui_name' => 'Time: Date and time (Time slot day)',
        'label' => '',
        'element_label_colon' => FALSE,
        'settings' => array(
          'format_type' => 'day_of_the_week',
          'fromto' => 'both',
          'multiple_number' => '',
          'multiple_from' => '',
          'multiple_to' => '',
          'show_remaining_days' => 0,
        ),
      ),
      'field_evttime_date_2' => array(
        'id' => 'field_evttime_date_2',
        'table' => 'field_data_field_evttime_date',
        'field' => 'field_evttime_date',
        'ui_name' => 'Time: Date and time (Time slot time)',
        'label' => '',
        'element_label_colon' => FALSE,
        'settings' => array(
          'format_type' => 'cod_time',
          'fromto' => 'both',
          'multiple_number' => '',
          'multiple_from' => '',
          'multiple_to' => '',
          'show_remaining_days' => 0,
        ),
      ),
      'view' => array(
        'id' => 'view',
        'table' => 'views',
        'field' => 'view',
        'label' => '',
        'element_label_colon' => FALSE,
        'hide_empty' => TRUE,
        'view' => 'cod_schedule_content',
        'arguments' => '[!evttid]/session+schedule_item',
      ),
    ); /* WAS: '' */
    $data['cod_schedule']->display['panel_pane_1']->display_options['relationships'] = array(
      'og_membership_rel' => array(
        'id' => 'og_membership_rel',
        'table' => 'cod_event_time',
        'field' => 'og_membership_rel',
      ),
    ); /* WAS: '' */
  }
  if (isset($data['cod_schedule_content'])) {
    $data['cod_schedule_content']->display['default']->display_options['exposed_form']['options'] = array(
      'autosubmit' => TRUE,
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['fields']['count'] = array(
      'id' => 'count',
      'table' => 'flag_counts',
      'field' => 'count',
      'relationship' => 'flag_count_rel',
      'label' => 'Attending',
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['fields']['field_experience'] = array(
      'id' => 'field_experience',
      'table' => 'field_data_field_experience',
      'field' => 'field_experience',
      'label' => '',
      'element_label_colon' => FALSE,
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['fields']['og_vocabulary'] = array(
      'id' => 'og_vocabulary',
      'table' => 'field_data_og_vocabulary',
      'field' => 'og_vocabulary',
      'label' => '',
      'alter' => array(
        'alter_text' => TRUE,
        'text' => '<div class="track-icon-[og_vocabulary-target_id]">[og_vocabulary]</div>',
      ),
      'element_type' => 0,
      'element_label_colon' => FALSE,
      'element_wrapper_type' => 0,
      'element_default_classes' => FALSE,
      'settings' => array(
        'link' => 0,
      ),
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['fields']['ops'] = array(
      'id' => 'ops',
      'table' => 'flagging',
      'field' => 'ops',
      'relationship' => 'flag_content_rel',
      'label' => '',
      'element_label_colon' => FALSE,
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['filters']['tid'] = array(
      'id' => 'tid',
      'table' => 'taxonomy_term_data',
      'field' => 'tid',
      'relationship' => 'term_node_tid',
      'exposed' => TRUE,
      'expose' => array(
        'operator_id' => 'tid_op',
        'label' => 'Filter by Session Track',
        'operator' => 'tid_op',
        'identifier' => 'session_track',
        'remember_roles' => array(
          2 => 2,
          1 => 0,
          21 => 0,
          11 => 0,
          26 => 0,
          31 => 0,
          16 => 0,
        ),
      ),
      'type' => 'select',
      'vocabulary' => 'session_tracks_1',
      'error_message' => FALSE,
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['relationships']['flag_content_rel'] = array(
      'id' => 'flag_content_rel',
      'table' => 'node',
      'field' => 'flag_content_rel',
      'label' => 'attending session',
      'required' => 0,
      'flag' => 'session_schedule',
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['relationships']['flag_count_rel'] = array(
      'id' => 'flag_count_rel',
      'table' => 'node',
      'field' => 'flag_count_rel',
      'label' => 'attending session count',
      'required' => 0,
      'flag' => 'session_schedule',
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['default']->display_options['relationships']['term_node_tid'] = array(
      'id' => 'term_node_tid',
      'table' => 'node',
      'field' => 'term_node_tid',
      'label' => 'session_track',
      'vocabularies' => array(
        'session_tracks_1' => 'session_tracks_1',
        'news_tags' => 0,
        'sponsorship_level' => 0,
      ),
    ); /* WAS: '' */
    $data['cod_schedule_content']->display['page_2'] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:3:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:13:"exposed_block";b:1;s:4:"path";s:16:"node/%/schedule2";}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:6:"page_2";s:13:"display_title";s:6:"Page 2";s:14:"display_plugin";s:4:"page";s:8:"position";i:0;}'); /* WAS: '' */
  }
}

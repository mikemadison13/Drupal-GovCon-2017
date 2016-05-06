<?php
/**
 * @file
 * dgc_deploy.features.features_overrides.inc
 */

/**
 * Implements hook_features_override_default_overrides().
 */
function dgc_deploy_features_override_default_overrides() {
  // This code is only used for UI in features. Exported alters hooks do the magic.
  $overrides = array();

  // Exported overrides for: ckeditor_profile.
  $overrides["ckeditor_profile.Advanced.settings|allowed_content"] = 't';
  $overrides["ckeditor_profile.Advanced.settings|extraAllowedContent"] = '';
  $overrides["ckeditor_profile.Advanced.settings|toolbar"] = '[
          [\'Format\'],
          [\'Bold\',\'Italic\',\'Strike\'],
          [\'NumberedList\',\'BulletedList\',\'Indent\',\'Outdent\',\'Blockquote\'],
          [\'Link\',\'Unlink\',\'Anchor\',\'Image\']
      ]';

  // Exported overrides for: field_base.
  $overrides["field_base.field_accepted.settings|allowed_values|proposed"] = 'Proposed';
  $overrides["field_base.field_ticket_attendee_listing.field_permissions|type"] = 0;
  $overrides["field_base.field_ticket_attendee_listing.foreign keys"]["DELETED"] = TRUE;

  // Exported overrides for: field_instance.
  $overrides["field_instance.node-news-body.display|teaser|settings|trim_length"] = 400;
  $overrides["field_instance.node-session-field_accepted.default_value|0|value"] = 'proposed';
  $overrides["field_instance.node-session-field_speakers.required"] = 1;

  // Exported overrides for: filter.
  $overrides["filter.filtered_html.filters|filter_html|settings|allowed_html"] = '<a> <em> <strong> <u> <cite> <blockquote> <code> <ul> <ol> <li> <dl> <dt> <dd> <h2> <h3> <h4> <h5> <h6>  <p> <br> <img> <strike>';

  // Exported overrides for: page_manager_pages.
  $overrides["page_manager_pages.cod_bof_pages.default_handlers|page_cod_bof_pages__panel_context_d1b7e4a1-edf8-4c94-bc18-5b7362409cc6|conf|display|content|new-c13e87dc-7afd-4320-9611-a34e2dda526d"] = (object) array(
    'pid' => 'new-c13e87dc-7afd-4320-9611-a34e2dda526d',
    'panel' => 'preface',
    'type' => 'custom',
    'subtype' => 'custom',
    'shown' => TRUE,
    'access' => array(),
    'configuration' => array(
      'admin_title' => 'Schedule links',
      'title' => '',
      'body' => '<p><a class="button btn-big" href="%node:url/schedule">Conference Schedule</a> <a class="button btn-big" href="%node:url/schedule/mine">My Schedule</a> <a class="button btn-big" href="">BoFs</a> <a class="button btn-big" href="%node:url/floor-layouts">Floor Layouts</a></p>
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
    'uuid' => 'c13e87dc-7afd-4320-9611-a34e2dda526d',
  );
  $overrides["page_manager_pages.cod_bof_pages.default_handlers|page_cod_bof_pages__panel_context_d1b7e4a1-edf8-4c94-bc18-5b7362409cc6|conf|display|panels|preface"] = array(
    0 => 'new-c13e87dc-7afd-4320-9611-a34e2dda526d',
  );
  $overrides["page_manager_pages.community.access|settings"] = NULL;
  $overrides["page_manager_pages.community.access|type"] = 'none';
  $overrides["page_manager_pages.community.default_handlers|page_community_panel_context|conf|display|content|new-797bfb61-a42b-47a1-94da-7e49df24efbc|shown"] = FALSE;
  $overrides["page_manager_pages.community.default_handlers|page_community_panel_context|conf|display|content|new-bc2d3d3f-97e4-418e-ba6e-a16d3552bbe3"] = (object) array(
    'pid' => 'new-bc2d3d3f-97e4-418e-ba6e-a16d3552bbe3',
    'panel' => 'center',
    'type' => 'views_panes',
    'subtype' => 'dgc_community_attendees-panel_pane_1',
    'shown' => TRUE,
    'access' => array(),
    'configuration' => array(
      'context' => array(
        0 => 'argument_entity_id:node_1',
      ),
    ),
    'cache' => array(),
    'style' => array(
      'settings' => NULL,
    ),
    'css' => array(),
    'extras' => array(),
    'position' => 2,
    'locks' => array(),
    'uuid' => 'bc2d3d3f-97e4-418e-ba6e-a16d3552bbe3',
  );
  $overrides["page_manager_pages.community.default_handlers|page_community_panel_context|conf|display|content|new-dafcfd0f-4f89-4ace-b9b7-bee77657b467|shown"] = FALSE;
  $overrides["page_manager_pages.community.default_handlers|page_community_panel_context|conf|display|panels|center|2"] = 'new-bc2d3d3f-97e4-418e-ba6e-a16d3552bbe3';

  // Exported overrides for: panelizer_defaults.
  $overrides["panelizer_defaults.node:bof_session:default:default.display|content|new-c7e47058-062c-41b1-9053-c3682255164e"] = (object) array(
    'pid' => 'new-c7e47058-062c-41b1-9053-c3682255164e',
    'panel' => 'top_right_content',
    'type' => 'flag_link',
    'subtype' => 'node',
    'shown' => TRUE,
    'access' => array(),
    'configuration' => array(
      'flag_name' => 'session_schedule',
      'context' => 'panelizer',
      'override_title' => 1,
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
    'uuid' => 'c7e47058-062c-41b1-9053-c3682255164e',
  );
  $overrides["panelizer_defaults.node:bof_session:default:default.display|content|new-e975fc00-3daf-43bf-bdb3-edbb829493b6|position"] = 1;
  $overrides["panelizer_defaults.node:bof_session:default:default.display|panels|top_right_content|1"] = 'new-c7e47058-062c-41b1-9053-c3682255164e';
  $overrides["panelizer_defaults.node:bof_session:default:default.pipeline"] = 'standard';
  $overrides["panelizer_defaults.node:session:default:default.display|content|new-0da34661-2455-4e0b-918b-5c11fd44fd6a|position"] = 1;
  $overrides["panelizer_defaults.node:session:default:default.display|content|new-604f1c98-aefd-4044-ad5a-d566a6a28303"] = (object) array(
    'pid' => 'new-604f1c98-aefd-4044-ad5a-d566a6a28303',
    'panel' => 'footer',
    'type' => 'node_comment_wrapper',
    'subtype' => 'node_comment_wrapper',
    'shown' => TRUE,
    'access' => array(),
    'configuration' => array(
      'mode' => 1,
      'comments_per_page' => 50,
      'context' => 'panelizer',
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
    'uuid' => '604f1c98-aefd-4044-ad5a-d566a6a28303',
  );
  $overrides["panelizer_defaults.node:session:default:default.display|content|new-7bee847d-a66f-46fa-b584-3f7131b1137e"] = (object) array(
    'pid' => 'new-7bee847d-a66f-46fa-b584-3f7131b1137e',
    'panel' => 'top_right_content',
    'type' => 'flag_link',
    'subtype' => 'node',
    'shown' => TRUE,
    'access' => array(),
    'configuration' => array(
      'flag_name' => 'session_schedule',
      'context' => 'panelizer',
      'override_title' => 1,
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
    'uuid' => '7bee847d-a66f-46fa-b584-3f7131b1137e',
  );
  $overrides["panelizer_defaults.node:session:default:default.display|content|new-b01a3d0c-16f1-43ec-8d15-a359a49d0ef0|configuration|formatter_settings|link"] = 1;
  $overrides["panelizer_defaults.node:session:default:default.display|content|new-b4b99930-c93b-4de8-97f8-08a81413b531|position"] = 2;
  $overrides["panelizer_defaults.node:session:default:default.display|content|new-d1c2e7df-53fe-4dc5-9c77-51c7e83580e2|position"] = 3;
  $overrides["panelizer_defaults.node:session:default:default.display|panels|footer"] = array(
    0 => 'new-604f1c98-aefd-4044-ad5a-d566a6a28303',
  );
  $overrides["panelizer_defaults.node:session:default:default.display|panels|top_right_content|3"] = 'new-7bee847d-a66f-46fa-b584-3f7131b1137e';
  $overrides["panelizer_defaults.node:session:default:default.link_to_entity"] = FALSE;

  // Exported overrides for: user_permission.
  $overrides["user_permission.view schedule.roles|anonymous user"] = 'anonymous user';
  $overrides["user_permission.view sponsors.roles|anonymous user"] = 'anonymous user';

  // Exported overrides for: variable.
  $overrides["variable.node_options_session.value|0"] = 'status';
  $overrides["variable.node_options_session.value|1"] = 'panelizer';
  $overrides["variable.node_submitted_bof_session.value"] = 0;
  $overrides["variable.node_submitted_news.value"] = 0;
  $overrides["variable.node_submitted_schedule_item.value"] = 0;
  $overrides["variable.node_submitted_session.value"] = 0;
  $overrides["variable.og_node_access_strict.value"] = 0;
  $overrides["variable.subpathauto_depth.value"] = 3;

  // Exported overrides for: views_view.
  $overrides["views_view.cod_bof_schedule_content.display|default|display_options|fields|count"] = array(
    'id' => 'count',
    'table' => 'flag_counts',
    'field' => 'count',
    'relationship' => 'flag_count_rel',
    'label' => 'Attending',
  );
  $overrides["views_view.cod_bof_schedule_content.display|default|display_options|fields|ops"] = array(
    'id' => 'ops',
    'table' => 'flagging',
    'field' => 'ops',
    'relationship' => 'flag_content_rel',
    'label' => '',
    'element_label_colon' => FALSE,
  );
  $overrides["views_view.cod_bof_schedule_content.display|default|display_options|relationships|flag_content_rel"] = array(
    'id' => 'flag_content_rel',
    'table' => 'node',
    'field' => 'flag_content_rel',
    'label' => 'session attending',
    'required' => 0,
    'flag' => 'session_schedule',
  );
  $overrides["views_view.cod_bof_schedule_content.display|default|display_options|relationships|flag_count_rel"] = array(
    'id' => 'flag_count_rel',
    'table' => 'node',
    'field' => 'flag_count_rel',
    'label' => 'attending counter',
    'required' => 0,
    'flag' => 'session_schedule',
  );
  $overrides["views_view.cod_news.display|default|display_options|pager|options|id"]["DELETED"] = TRUE;
  $overrides["views_view.cod_news.display|default|display_options|pager|options|items_per_page"]["DELETED"] = TRUE;
  $overrides["views_view.cod_news.display|default|display_options|pager|type"] = 'none';
  $overrides["views_view.cod_news.display|panel_pane_1|display_options|allow"] = array(
    'use_pager' => 0,
    'items_per_page' => 'items_per_page',
    'offset' => 0,
    'link_to_view' => 0,
    'more_link' => 0,
    'path_override' => 0,
    'title_override' => 0,
    'exposed_form' => 0,
    'fields_override' => 0,
  );
  $overrides["views_view.cod_news.display|panel_pane_1|display_options|row_options"]["DELETED"] = TRUE;
  $overrides["views_view.cod_session_tracks.display|panel_pane_2"] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:8:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:8:"defaults";a:5:{s:12:"style_plugin";b:0;s:13:"style_options";b:0;s:10:"row_plugin";b:0;s:11:"row_options";b:0;s:6:"fields";b:0;}s:12:"style_plugin";s:7:"default";s:10:"row_plugin";s:6:"fields";s:6:"fields";a:1:{s:4:"name";a:6:{s:2:"id";s:4:"name";s:5:"table";s:18:"taxonomy_term_data";s:5:"field";s:4:"name";s:5:"label";s:0:"";s:5:"alter";a:2:{s:13:"word_boundary";b:0;s:8:"ellipsis";b:0;}s:16:"link_to_taxonomy";b:1;}}s:10:"pane_title";s:20:"Event Session Tracks";s:5:"allow";a:9:{s:9:"use_pager";i:0;s:14:"items_per_page";i:0;s:6:"offset";i:0;s:12:"link_to_view";i:0;s:9:"more_link";i:0;s:13:"path_override";i:0;s:14:"title_override";s:14:"title_override";s:12:"exposed_form";i:0;s:15:"fields_override";i:0;}s:14:"argument_input";a:1:{s:12:"machine_name";a:6:{s:4:"type";s:4:"user";s:7:"context";s:21:"entity:comment.author";s:16:"context_optional";i:0;s:5:"panel";s:1:"0";s:5:"fixed";s:0:"";s:5:"label";s:33:"Taxonomy vocabulary: Machine name";}}}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:12:"panel_pane_2";s:13:"display_title";s:12:"Content pane";s:14:"display_plugin";s:10:"panel_pane";s:8:"position";i:0;}');
  $overrides["views_view.cod_sponsors.display|page_1"] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:12:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:8:"defaults";a:10:{s:9:"css_class";b:0;s:16:"hide_admin_links";b:0;s:12:"style_plugin";b:0;s:13:"style_options";b:0;s:10:"row_plugin";b:0;s:11:"row_options";b:0;s:13:"relationships";b:0;s:6:"fields";b:0;s:5:"sorts";b:0;s:9:"arguments";b:0;}s:9:"css_class";s:5:"bevel";s:12:"style_plugin";s:7:"default";s:13:"style_options";a:4:{s:8:"grouping";a:1:{i:0;a:3:{s:5:"field";s:31:"field_sponsor_sponsorship_level";s:8:"rendered";i:1;s:14:"rendered_strip";i:0;}}s:9:"row_class";s:7:"sponsor";s:17:"default_row_class";b:0;s:17:"row_class_special";b:0;}s:10:"row_plugin";s:6:"fields";s:13:"relationships";a:2:{s:17:"og_membership_rel";a:5:{s:2:"id";s:17:"og_membership_rel";s:5:"table";s:4:"node";s:5:"field";s:17:"og_membership_rel";s:5:"label";s:10:"Conference";s:8:"required";b:1;}s:35:"field_sponsor_sponsorship_level_tid";a:5:{s:2:"id";s:35:"field_sponsor_sponsorship_level_tid";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:35:"field_sponsor_sponsorship_level_tid";s:5:"label";s:17:"Sponsorship Level";s:8:"required";b:1;}}s:6:"fields";a:4:{s:5:"title";a:11:{s:2:"id";s:5:"title";s:5:"table";s:4:"node";s:5:"field";s:5:"title";s:5:"label";s:0:"";s:7:"exclude";b:1;s:5:"alter";a:2:{s:13:"word_boundary";b:0;s:8:"ellipsis";b:0;}s:12:"element_type";s:2:"h3";s:13:"element_class";s:5:"title";s:19:"element_label_colon";b:0;s:23:"element_default_classes";b:0;s:12:"link_to_node";b:0;}s:17:"field_sponsor_url";a:8:{s:2:"id";s:17:"field_sponsor_url";s:5:"table";s:28:"field_data_field_sponsor_url";s:5:"field";s:17:"field_sponsor_url";s:5:"label";s:0:"";s:7:"exclude";b:1;s:19:"element_label_colon";b:0;s:17:"click_sort_column";s:3:"url";s:4:"type";s:13:"link_absolute";}s:18:"field_sponsor_logo";a:8:{s:2:"id";s:18:"field_sponsor_logo";s:5:"table";s:29:"field_data_field_sponsor_logo";s:5:"field";s:18:"field_sponsor_logo";s:5:"label";s:0:"";s:5:"alter";a:3:{s:9:"make_link";b:1;s:4:"path";s:19:"[field_sponsor_url]";s:3:"alt";s:7:"[title]";}s:19:"element_label_colon";b:0;s:17:"click_sort_column";s:3:"fid";s:8:"settings";a:2:{s:11:"image_style";s:12:"cod_sponsors";s:10:"image_link";s:0:"";}}s:31:"field_sponsor_sponsorship_level";a:10:{s:2:"id";s:31:"field_sponsor_sponsorship_level";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:31:"field_sponsor_sponsorship_level";s:5:"label";s:0:"";s:7:"exclude";b:1;s:19:"element_label_colon";b:0;s:20:"element_wrapper_type";s:2:"h2";s:21:"element_wrapper_class";s:5:"level";s:23:"element_default_classes";b:0;s:4:"type";s:29:"taxonomy_term_reference_plain";}}s:5:"sorts";a:1:{s:6:"weight";a:4:{s:2:"id";s:6:"weight";s:5:"table";s:18:"taxonomy_term_data";s:5:"field";s:6:"weight";s:12:"relationship";s:35:"field_sponsor_sponsorship_level_tid";}}s:9:"arguments";a:1:{s:3:"gid";a:11:{s:2:"id";s:3:"gid";s:5:"table";s:13:"og_membership";s:5:"field";s:3:"gid";s:12:"relationship";s:17:"og_membership_rel";s:14:"default_action";s:5:"empty";s:21:"default_argument_type";s:5:"fixed";s:7:"summary";a:2:{s:17:"number_of_records";s:1:"0";s:6:"format";s:15:"default_summary";}s:15:"summary_options";a:1:{s:14:"items_per_page";s:2:"25";}s:18:"specify_validation";b:1;s:8:"validate";a:1:{s:4:"type";s:4:"node";}s:16:"validate_options";a:2:{s:5:"types";a:1:{s:5:"event";s:5:"event";}s:6:"access";b:1;}}}s:4:"path";s:15:"node/%/sponsors";s:4:"menu";a:6:{s:4:"type";s:3:"tab";s:5:"title";s:8:"Sponsors";s:6:"weight";s:2:"-1";s:4:"name";s:9:"main-menu";s:7:"context";i:0;s:19:"context_only_inline";i:0;}}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:6:"page_1";s:13:"display_title";s:12:"Sponsor Page";s:14:"display_plugin";s:4:"page";s:8:"position";i:0;}');
  $overrides["views_view.cod_sponsors.display|page|display_options|enabled"] = FALSE;
  $overrides["views_view.cod_sponsors.display|page|display_options|fields|field_sponsor_logo|alter|path"] = '[field_sponsor_url]';
  $overrides["views_view.cod_sponsors.display|page|display_options|fields|field_sponsor_logo|settings|image_link"] = '';
  $overrides["views_view.cod_sponsors.display|page|display_options|fields|field_sponsor_url"] = array(
    'id' => 'field_sponsor_url',
    'table' => 'field_data_field_sponsor_url',
    'field' => 'field_sponsor_url',
    'label' => '',
    'exclude' => TRUE,
    'element_label_colon' => FALSE,
    'click_sort_column' => 'url',
    'type' => 'link_absolute',
  );
  $overrides["views_view.cod_sponsors.display|panel_pane_1"] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:13:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:8:"defaults";a:10:{s:12:"style_plugin";b:0;s:13:"style_options";b:0;s:10:"row_plugin";b:0;s:11:"row_options";b:0;s:13:"relationships";b:0;s:6:"fields";b:0;s:5:"sorts";b:0;s:9:"arguments";b:0;s:13:"filter_groups";b:0;s:7:"filters";b:0;}s:12:"style_plugin";s:4:"list";s:13:"style_options";a:1:{s:8:"grouping";a:1:{i:0;a:3:{s:5:"field";s:31:"field_sponsor_sponsorship_level";s:8:"rendered";i:1;s:14:"rendered_strip";i:0;}}}s:10:"row_plugin";s:6:"fields";s:13:"relationships";a:2:{s:17:"og_membership_rel";a:4:{s:2:"id";s:17:"og_membership_rel";s:5:"table";s:4:"node";s:5:"field";s:17:"og_membership_rel";s:5:"label";s:10:"Conference";}s:35:"field_sponsor_sponsorship_level_tid";a:4:{s:2:"id";s:35:"field_sponsor_sponsorship_level_tid";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:35:"field_sponsor_sponsorship_level_tid";s:5:"label";s:17:"Sponsorship Level";}}s:6:"fields";a:4:{s:5:"title";a:7:{s:2:"id";s:5:"title";s:5:"table";s:4:"node";s:5:"field";s:5:"title";s:5:"label";s:0:"";s:7:"exclude";b:1;s:5:"alter";a:2:{s:13:"word_boundary";b:0;s:8:"ellipsis";b:0;}s:19:"element_label_colon";b:0;}s:17:"field_sponsor_url";a:8:{s:2:"id";s:17:"field_sponsor_url";s:5:"table";s:28:"field_data_field_sponsor_url";s:5:"field";s:17:"field_sponsor_url";s:5:"label";s:0:"";s:7:"exclude";b:1;s:19:"element_label_colon";b:0;s:17:"click_sort_column";s:3:"url";s:4:"type";s:13:"link_absolute";}s:18:"field_sponsor_logo";a:8:{s:2:"id";s:18:"field_sponsor_logo";s:5:"table";s:29:"field_data_field_sponsor_logo";s:5:"field";s:18:"field_sponsor_logo";s:5:"label";s:0:"";s:5:"alter";a:3:{s:9:"make_link";b:1;s:4:"path";s:19:"[field_sponsor_url]";s:3:"alt";s:7:"[title]";}s:19:"element_label_colon";b:0;s:17:"click_sort_column";s:3:"fid";s:8:"settings";a:2:{s:11:"image_style";s:12:"cod_sponsors";s:10:"image_link";s:0:"";}}s:31:"field_sponsor_sponsorship_level";a:8:{s:2:"id";s:31:"field_sponsor_sponsorship_level";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:31:"field_sponsor_sponsorship_level";s:5:"label";s:0:"";s:7:"exclude";b:1;s:5:"alter";a:2:{s:10:"alter_text";b:1;s:4:"text";s:42:"[field_sponsor_sponsorship_level] Sponsors";}s:19:"element_label_colon";b:0;s:4:"type";s:29:"taxonomy_term_reference_plain";}}s:5:"sorts";a:1:{s:6:"weight";a:4:{s:2:"id";s:6:"weight";s:5:"table";s:18:"taxonomy_term_data";s:5:"field";s:6:"weight";s:12:"relationship";s:35:"field_sponsor_sponsorship_level_tid";}}s:9:"arguments";a:1:{s:3:"gid";a:11:{s:2:"id";s:3:"gid";s:5:"table";s:13:"og_membership";s:5:"field";s:3:"gid";s:12:"relationship";s:17:"og_membership_rel";s:14:"default_action";s:5:"empty";s:21:"default_argument_type";s:5:"fixed";s:7:"summary";a:2:{s:17:"number_of_records";s:1:"0";s:6:"format";s:15:"default_summary";}s:15:"summary_options";a:1:{s:14:"items_per_page";s:2:"25";}s:18:"specify_validation";b:1;s:8:"validate";a:2:{s:4:"type";s:4:"node";s:4:"fail";s:5:"empty";}s:16:"validate_options";a:2:{s:5:"types";a:1:{s:5:"event";s:5:"event";}s:6:"access";b:1;}}}s:7:"filters";a:3:{s:6:"status";a:6:{s:2:"id";s:6:"status";s:5:"table";s:4:"node";s:5:"field";s:6:"status";s:5:"value";i:1;s:5:"group";i:1;s:6:"expose";a:1:{s:8:"operator";b:0;}}s:4:"type";a:4:{s:2:"id";s:4:"type";s:5:"table";s:4:"node";s:5:"field";s:4:"type";s:5:"value";a:1:{s:7:"sponsor";s:7:"sponsor";}}s:35:"field_sponsor_sponsorship_level_tid";a:8:{s:2:"id";s:35:"field_sponsor_sponsorship_level_tid";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:35:"field_sponsor_sponsorship_level_tid";s:7:"exposed";b:1;s:6:"expose";a:6:{s:11:"operator_id";s:38:"field_sponsor_sponsorship_level_tid_op";s:5:"label";s:17:"Sponsorship Level";s:8:"operator";s:38:"field_sponsor_sponsorship_level_tid_op";s:10:"identifier";s:35:"field_sponsor_sponsorship_level_tid";s:8:"multiple";b:1;s:14:"remember_roles";a:7:{i:2;s:1:"2";i:1;i:0;i:21;i:0;i:11;i:0;i:26;i:0;i:31;i:0;i:16;i:0;}}s:4:"type";s:6:"select";s:10:"vocabulary";s:17:"sponsorship_level";s:13:"error_message";b:0;}}s:10:"pane_title";s:37:"Sponsors grouped by sponsorship level";s:5:"allow";a:9:{s:9:"use_pager";i:0;s:14:"items_per_page";i:0;s:6:"offset";i:0;s:12:"link_to_view";i:0;s:9:"more_link";i:0;s:13:"path_override";i:0;s:14:"title_override";s:14:"title_override";s:12:"exposed_form";s:12:"exposed_form";s:15:"fields_override";i:0;}s:14:"argument_input";a:1:{s:3:"gid";a:6:{s:4:"type";s:7:"context";s:7:"context";s:15:"entity:node.nid";s:16:"context_optional";i:0;s:5:"panel";s:1:"0";s:5:"fixed";s:0:"";s:5:"label";s:23:"OG membership: Group ID";}}}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:12:"panel_pane_1";s:13:"display_title";s:27:"Sponsor pane group by level";s:14:"display_plugin";s:10:"panel_pane";s:8:"position";i:0;}');
  $overrides["views_view.cod_sponsors.display|panel_pane_2"] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:12:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:8:"defaults";a:10:{s:12:"style_plugin";b:0;s:13:"style_options";b:0;s:10:"row_plugin";b:0;s:11:"row_options";b:0;s:13:"relationships";b:0;s:6:"fields";b:0;s:5:"sorts";b:0;s:9:"arguments";b:0;s:13:"filter_groups";b:0;s:7:"filters";b:0;}s:12:"style_plugin";s:4:"list";s:10:"row_plugin";s:6:"fields";s:13:"relationships";a:2:{s:17:"og_membership_rel";a:4:{s:2:"id";s:17:"og_membership_rel";s:5:"table";s:4:"node";s:5:"field";s:17:"og_membership_rel";s:5:"label";s:10:"Conference";}s:35:"field_sponsor_sponsorship_level_tid";a:4:{s:2:"id";s:35:"field_sponsor_sponsorship_level_tid";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:35:"field_sponsor_sponsorship_level_tid";s:5:"label";s:17:"Sponsorship Level";}}s:6:"fields";a:4:{s:5:"title";a:7:{s:2:"id";s:5:"title";s:5:"table";s:4:"node";s:5:"field";s:5:"title";s:5:"label";s:0:"";s:7:"exclude";b:1;s:5:"alter";a:2:{s:13:"word_boundary";b:0;s:8:"ellipsis";b:0;}s:19:"element_label_colon";b:0;}s:17:"field_sponsor_url";a:8:{s:2:"id";s:17:"field_sponsor_url";s:5:"table";s:28:"field_data_field_sponsor_url";s:5:"field";s:17:"field_sponsor_url";s:5:"label";s:0:"";s:7:"exclude";b:1;s:19:"element_label_colon";b:0;s:17:"click_sort_column";s:3:"url";s:4:"type";s:13:"link_absolute";}s:18:"field_sponsor_logo";a:8:{s:2:"id";s:18:"field_sponsor_logo";s:5:"table";s:29:"field_data_field_sponsor_logo";s:5:"field";s:18:"field_sponsor_logo";s:5:"label";s:0:"";s:5:"alter";a:3:{s:9:"make_link";b:1;s:4:"path";s:19:"[field_sponsor_url]";s:3:"alt";s:7:"[title]";}s:19:"element_label_colon";b:0;s:17:"click_sort_column";s:3:"fid";s:8:"settings";a:2:{s:11:"image_style";s:12:"cod_sponsors";s:10:"image_link";s:0:"";}}s:31:"field_sponsor_sponsorship_level";a:7:{s:2:"id";s:31:"field_sponsor_sponsorship_level";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:31:"field_sponsor_sponsorship_level";s:5:"label";s:0:"";s:7:"exclude";b:1;s:19:"element_label_colon";b:0;s:4:"type";s:29:"taxonomy_term_reference_plain";}}s:5:"sorts";a:1:{s:6:"weight";a:4:{s:2:"id";s:6:"weight";s:5:"table";s:18:"taxonomy_term_data";s:5:"field";s:6:"weight";s:12:"relationship";s:35:"field_sponsor_sponsorship_level_tid";}}s:9:"arguments";a:1:{s:3:"gid";a:11:{s:2:"id";s:3:"gid";s:5:"table";s:13:"og_membership";s:5:"field";s:3:"gid";s:12:"relationship";s:17:"og_membership_rel";s:14:"default_action";s:5:"empty";s:21:"default_argument_type";s:5:"fixed";s:7:"summary";a:2:{s:17:"number_of_records";s:1:"0";s:6:"format";s:15:"default_summary";}s:15:"summary_options";a:1:{s:14:"items_per_page";s:2:"25";}s:18:"specify_validation";b:1;s:8:"validate";a:2:{s:4:"type";s:4:"node";s:4:"fail";s:5:"empty";}s:16:"validate_options";a:2:{s:5:"types";a:1:{s:5:"event";s:5:"event";}s:6:"access";b:1;}}}s:7:"filters";a:3:{s:6:"status";a:6:{s:2:"id";s:6:"status";s:5:"table";s:4:"node";s:5:"field";s:6:"status";s:5:"value";i:1;s:5:"group";i:1;s:6:"expose";a:1:{s:8:"operator";b:0;}}s:4:"type";a:4:{s:2:"id";s:4:"type";s:5:"table";s:4:"node";s:5:"field";s:4:"type";s:5:"value";a:1:{s:7:"sponsor";s:7:"sponsor";}}s:35:"field_sponsor_sponsorship_level_tid";a:8:{s:2:"id";s:35:"field_sponsor_sponsorship_level_tid";s:5:"table";s:42:"field_data_field_sponsor_sponsorship_level";s:5:"field";s:35:"field_sponsor_sponsorship_level_tid";s:7:"exposed";b:1;s:6:"expose";a:6:{s:11:"operator_id";s:38:"field_sponsor_sponsorship_level_tid_op";s:5:"label";s:17:"Sponsorship Level";s:8:"operator";s:38:"field_sponsor_sponsorship_level_tid_op";s:10:"identifier";s:35:"field_sponsor_sponsorship_level_tid";s:8:"multiple";b:1;s:14:"remember_roles";a:7:{i:2;s:1:"2";i:1;i:0;i:21;i:0;i:11;i:0;i:26;i:0;i:31;i:0;i:16;i:0;}}s:4:"type";s:6:"select";s:10:"vocabulary";s:17:"sponsorship_level";s:13:"error_message";b:0;}}s:10:"pane_title";s:20:"Sponsors not grouped";s:5:"allow";a:9:{s:9:"use_pager";i:0;s:14:"items_per_page";i:0;s:6:"offset";i:0;s:12:"link_to_view";i:0;s:9:"more_link";i:0;s:13:"path_override";i:0;s:14:"title_override";s:14:"title_override";s:12:"exposed_form";s:12:"exposed_form";s:15:"fields_override";i:0;}s:14:"argument_input";a:1:{s:3:"gid";a:6:{s:4:"type";s:7:"context";s:7:"context";s:15:"entity:node.nid";s:16:"context_optional";i:0;s:5:"panel";s:1:"0";s:5:"fixed";s:0:"";s:5:"label";s:23:"OG membership: Group ID";}}}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:12:"panel_pane_2";s:13:"display_title";s:24:"Sponsor pane no grouping";s:14:"display_plugin";s:10:"panel_pane";s:8:"position";i:0;}');
  $overrides["views_view.ticket_attendee.display|default|display_options|empty"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_attendee.display|panel_pane_1"] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:5:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:8:"defaults";a:2:{s:5:"empty";b:0;s:6:"fields";b:0;}s:6:"fields";a:4:{s:6:"entity";a:5:{s:2:"id";s:6:"entity";s:5:"table";s:11:"ticket_type";s:5:"field";s:6:"entity";s:12:"relationship";s:16:"ticket_type_ttid";s:5:"label";s:5:"Event";}s:17:"ticket_type_label";a:4:{s:2:"id";s:17:"ticket_type_label";s:5:"table";s:28:"field_data_ticket_type_label";s:5:"field";s:17:"ticket_type_label";s:12:"relationship";s:16:"ticket_type_ttid";}s:4:"name";a:5:{s:2:"id";s:4:"name";s:5:"table";s:5:"users";s:5:"field";s:4:"name";s:12:"relationship";s:10:"author_uid";s:5:"label";s:10:"Registrant";}s:7:"created";a:4:{s:2:"id";s:7:"created";s:5:"table";s:19:"ticket_registration";s:5:"field";s:7:"created";s:11:"date_format";s:4:"long";}}s:5:"allow";a:9:{s:9:"use_pager";i:0;s:14:"items_per_page";i:0;s:6:"offset";i:0;s:12:"link_to_view";i:0;s:9:"more_link";i:0;s:13:"path_override";i:0;s:14:"title_override";s:14:"title_override";s:12:"exposed_form";i:0;s:15:"fields_override";i:0;}s:14:"argument_input";a:1:{s:8:"user_uid";a:6:{s:4:"type";s:7:"context";s:7:"context";s:15:"entity:user.uid";s:16:"context_optional";i:0;s:5:"panel";s:1:"0";s:5:"fixed";s:0:"";s:5:"label";s:29:"Ticket registration: User_uid";}}}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:12:"panel_pane_1";s:13:"display_title";s:12:"Content pane";s:14:"display_plugin";s:10:"panel_pane";s:8:"position";i:0;}');
  $overrides["views_view.ticket_registration.display|default|display_options|fields|field_profile_first"] = array(
    'id' => 'field_profile_first',
    'table' => 'field_data_field_profile_first',
    'field' => 'field_profile_first',
    'relationship' => 'author_uid',
    'ui_name' => 'Registrant first name',
    'label' => '',
    'element_label_colon' => FALSE,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|fields|field_profile_first_1"] = array(
    'id' => 'field_profile_first_1',
    'table' => 'field_data_field_profile_first',
    'field' => 'field_profile_first',
    'relationship' => 'user_uid',
    'label' => '',
    'exclude' => TRUE,
    'element_label_colon' => FALSE,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|fields|field_profile_last"] = array(
    'id' => 'field_profile_last',
    'table' => 'field_data_field_profile_last',
    'field' => 'field_profile_last',
    'relationship' => 'author_uid',
    'ui_name' => 'Registrant last name',
    'label' => '',
    'element_label_colon' => FALSE,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|fields|field_profile_last_1"] = array(
    'id' => 'field_profile_last_1',
    'table' => 'field_data_field_profile_last',
    'field' => 'field_profile_last',
    'relationship' => 'user_uid',
    'label' => '',
    'exclude' => TRUE,
    'element_label_colon' => FALSE,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|fields|field_ticket_order"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|mail_1"] = array(
    'id' => 'mail_1',
    'table' => 'users',
    'field' => 'mail',
    'relationship' => 'author_uid',
    'ui_name' => 'Registrant e-mail mailto link',
    'label' => 'Registrant',
    'alter' => array(
      'alter_text' => TRUE,
      'text' => '([mail_1])',
    ),
    'element_label_colon' => FALSE,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|fields|mail|label"] = 'Attendee E-mail';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|mail|relationship"] = 'user_uid';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|mail|ui_name"] = 'Attendee e-mail mailto link';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|name|alter"] = array(
    'alter_text' => TRUE,
    'text' => '[field_profile_first_1] [field_profile_last_1]',
    'make_link' => TRUE,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|fields|name|label"] = 'Attendee';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|name|link_to_user"] = FALSE;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|name|relationship"] = 'user_uid';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|name|ui_name"] = 'Attendee first+last name linked to user entity';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|element_label_colon"] = FALSE;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|label"] = 'Select';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_delete_item|label"] = 'Delete ticket';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_delete_item|override_label"] = 1;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_modify_action|label"] = 'Change ticket state';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_modify_action|override_label"] = 1;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_modify_action|selected"] = 1;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_modify_action|settings|display_values|_all_"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_modify_action|settings|display_values|state"] = 'state';
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_operations|action::views_bulk_operations_modify_action|settings|show_all_tokens"] = 0;
  $overrides["views_view.ticket_registration.display|default|display_options|fields|views_bulk_operations|vbo_settings|display_type"] = 1;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|combine"] = array(
    'id' => 'combine',
    'table' => 'views',
    'field' => 'combine',
    'ui_name' => 'Name combined',
    'operator' => 'contains',
    'exposed' => TRUE,
    'expose' => array(
      'operator_id' => 'combine_op',
      'label' => 'Attendee Name',
      'description' => 'Operator: contains',
      'operator' => 'combine_op',
      'identifier' => 'name',
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
    'fields' => array(
      'field_profile_first_1' => 'field_profile_first_1',
      'field_profile_last_1' => 'field_profile_last_1',
    ),
  );
  $overrides["views_view.ticket_registration.display|default|display_options|filters|field_dietary_needs_value"] = array(
    'id' => 'field_dietary_needs_value',
    'table' => 'field_data_field_dietary_needs',
    'field' => 'field_dietary_needs_value',
    'relationship' => 'user_uid',
    'ui_name' => 'Dietary needs',
    'group' => 1,
    'exposed' => TRUE,
    'expose' => array(
      'operator_id' => 'field_dietary_needs_value_op',
      'label' => 'Dietary',
      'operator' => 'field_dietary_needs_value_op',
      'identifier' => 'a_dietary_needs',
      'multiple' => TRUE,
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
  );
  $overrides["views_view.ticket_registration.display|default|display_options|filters|field_government_employee_value"] = array(
    'id' => 'field_government_employee_value',
    'table' => 'field_data_field_government_employee',
    'field' => 'field_government_employee_value',
    'relationship' => 'user_uid',
    'ui_name' => 'Government employee checkbox',
    'group' => 1,
    'exposed' => TRUE,
    'expose' => array(
      'operator_id' => 'field_government_employee_value_op',
      'label' => 'Govie?',
      'operator' => 'field_government_employee_value_op',
      'identifier' => 'govie',
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
  );
  $overrides["views_view.ticket_registration.display|default|display_options|filters|field_t_shirt_size_value"] = array(
    'id' => 'field_t_shirt_size_value',
    'table' => 'field_data_field_t_shirt_size',
    'field' => 'field_t_shirt_size_value',
    'relationship' => 'user_uid',
    'ui_name' => 'T-shirt size',
    'group' => 1,
    'exposed' => TRUE,
    'expose' => array(
      'operator_id' => 'field_t_shirt_size_value_op',
      'label' => 'T-shirt',
      'operator' => 'field_t_shirt_size_value_op',
      'identifier' => 'tshirt',
      'multiple' => TRUE,
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
  );
  $overrides["views_view.ticket_registration.display|default|display_options|filters|mail"] = array(
    'id' => 'mail',
    'table' => 'users',
    'field' => 'mail',
    'relationship' => 'user_uid',
    'ui_name' => 'E-mail',
    'operator' => 'contains',
    'group' => 1,
    'exposed' => TRUE,
    'expose' => array(
      'operator_id' => 'mail_op',
      'label' => 'Attendee e-mail',
      'description' => 'Operator: contains',
      'operator' => 'mail_op',
      'identifier' => 'mail',
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
  );
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|label"] = 'Registration state';
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|10"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|11"] = 0;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|16"] = 0;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|21"] = 0;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|26"] = 0;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|3"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|31"] = 0;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|4"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|5"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|6"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|7"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|8"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|expose|remember_roles|9"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|operator"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|filters|state|value"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|footer"] = array(
    'result' => array(
      'id' => 'result',
      'table' => 'views',
      'field' => 'result',
      'content' => 'Displaying @start - @end of @total (page @current_page of @page_count)',
    ),
  );
  $overrides["views_view.ticket_registration.display|default|display_options|header"] = array(
    'result' => array(
      'id' => 'result',
      'table' => 'views',
      'field' => 'result',
      'content' => 'Displaying @start - @end of @total (page @current_page of @page_count)',
    ),
  );
  $overrides["views_view.ticket_registration.display|default|display_options|relationships|user_uid"] = array(
    'id' => 'user_uid',
    'table' => 'ticket_registration',
    'field' => 'user_uid',
  );
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|columns|active"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|columns|field_profile_first"] = 'mail_1';
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|columns|field_profile_last"] = 'mail_1';
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|columns|mail_1"] = 'mail_1';
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|columns|state"] = 'state';
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|info|active"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|info|field_profile_first"] = array(
    'sortable' => 0,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => '',
    'empty_column' => 0,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|info|field_profile_last"] = array(
    'sortable' => 0,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => '',
    'empty_column' => 0,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|info|mail_1"] = array(
    'sortable' => 0,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => ' ',
    'empty_column' => 0,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|style_options|info|state"] = array(
    'sortable' => 0,
    'default_sort_order' => 'asc',
    'align' => '',
    'separator' => '',
    'empty_column' => 0,
  );
  $overrides["views_view.ticket_registration.display|default|display_options|use_ajax"] = TRUE;
  $overrides["views_view.ticket_registration.display|panel_pane_1|display_options|argument_input"] = array(
    'entity_id' => array(
      'type' => 'context',
      'context' => 'entity:node.nid',
      'context_optional' => 0,
      'panel' => 0,
      'fixed' => '',
      'label' => 'Ticket type: Entity ID',
    ),
  );
  $overrides["views_view.ticket_registration.display|panel_pane_1|display_options|header"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_registration.display|panel_pane_1|display_options|inherit_panels_path"] = 1;
  $overrides["views_view.ticket_registration.display|panel_pane_1|display_options|relationships|user_uid"] = array(
    'id' => 'user_uid',
    'table' => 'ticket_registration',
    'field' => 'user_uid',
  );
  $overrides["views_view.ticket_user.display|default|display_options|fields|name|hide_alter_empty"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_user.display|default|display_options|filters"]["DELETED"] = TRUE;
  $overrides["views_view.ticket_user.display|panel_pane_1"] = unserialize('O:13:"views_display":7:{s:15:"display_options";a:4:{s:5:"query";a:2:{s:4:"type";s:11:"views_query";s:7:"options";a:0:{}}s:8:"defaults";a:1:{s:5:"empty";b:0;}s:5:"allow";a:9:{s:9:"use_pager";i:0;s:14:"items_per_page";i:0;s:6:"offset";i:0;s:12:"link_to_view";i:0;s:9:"more_link";i:0;s:13:"path_override";i:0;s:14:"title_override";s:14:"title_override";s:12:"exposed_form";i:0;s:15:"fields_override";i:0;}s:14:"argument_input";a:1:{s:10:"author_uid";a:6:{s:4:"type";s:7:"context";s:7:"context";s:15:"entity:user.uid";s:16:"context_optional";i:0;s:5:"panel";s:1:"0";s:5:"fixed";s:0:"";s:5:"label";s:31:"Ticket registration: Author_uid";}}}s:8:"db_table";s:13:"views_display";s:3:"vid";i:0;s:2:"id";s:12:"panel_pane_1";s:13:"display_title";s:12:"Content pane";s:14:"display_plugin";s:10:"panel_pane";s:8:"position";i:0;}');

  return $overrides;
}

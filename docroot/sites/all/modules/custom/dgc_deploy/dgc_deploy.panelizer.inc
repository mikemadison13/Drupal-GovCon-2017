<?php
/**
 * @file
 * dgc_deploy.panelizer.inc
 */

/**
 * Implements hook_panelizer_defaults().
 */
function dgc_deploy_panelizer_defaults() {
  $export = array();

  $panelizer = new stdClass();
  $panelizer->disabled = FALSE; /* Edit this to true to make a default panelizer disabled initially */
  $panelizer->api_version = 1;
  $panelizer->name = 'node:event:dgc_2015';
  $panelizer->title = 'DGC 2015';
  $panelizer->panelizer_type = 'node';
  $panelizer->panelizer_key = 'event';
  $panelizer->no_blocks = FALSE;
  $panelizer->css_id = '';
  $panelizer->css = '';
  $panelizer->pipeline = 'standard';
  $panelizer->contexts = array(
    0 => array(
      'identifier' => 'User',
      'keyword' => 'user',
      'name' => 'user',
      'type' => 'current',
      'uid' => '',
      'id' => 1,
    ),
    1 => array(
      'identifier' => 'Session Status',
      'keyword' => 'session_status',
      'name' => 'string',
      'string' => 'accepted',
      'id' => 1,
    ),
  );
  $panelizer->relationships = array();
  $panelizer->access = array();
  $panelizer->view_mode = 'default';
  $panelizer->css_class = '';
  $panelizer->title_element = 'H2';
  $panelizer->link_to_entity = TRUE;
  $panelizer->extra = array();
  $display = new panels_display();
  $display->layout = 'hydra';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'banner' => NULL,
      'overlay' => NULL,
      'headercontent' => NULL,
      'column1' => NULL,
      'column2' => NULL,
      'footer_column_1' => NULL,
      'footer_column_2' => NULL,
      'left_header' => NULL,
      'right_header' => NULL,
      'preface' => NULL,
      'left_content' => NULL,
      'right_content' => NULL,
      'footer' => NULL,
      'top_right_content' => NULL,
      'bottom_right_content' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '%node:title';
  $display->uuid = '2d60e12a-4dcf-47e5-9c92-1fcfb6872172';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-d8a15e90-c296-4f34-8855-56168f2aabb9';
  $pane->panel = 'footer';
  $pane->type = 'views';
  $pane->subtype = 'cod_sponsors';
  $pane->shown = FALSE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '0',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'page',
    'context' => array(
      0 => 'panelizer.nid',
    ),
    'override_title' => 0,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => '',
    'css_class' => 'bevel',
  );
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = 'd8a15e90-c296-4f34-8855-56168f2aabb9';
  $display->content['new-d8a15e90-c296-4f34-8855-56168f2aabb9'] = $pane;
  $display->panels['footer'][0] = 'new-d8a15e90-c296-4f34-8855-56168f2aabb9';
  $pane = new stdClass();
  $pane->pid = 'new-3603832e-68db-4872-8063-31e51eefba45';
  $pane->panel = 'footer';
  $pane->type = 'views_panes';
  $pane->subtype = 'cod_sponsors-panel_pane_1';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'exposed' => array(
      'field_sponsor_sponsorship_level_tid' => array(
        51 => '51',
        66 => '66',
        41 => '41',
        31 => '31',
        61 => '61',
        56 => '56',
        36 => '36',
      ),
    ),
    'context' => array(
      0 => 'panelizer',
    ),
    'override_title' => 0,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => '',
    'css_class' => 'bevel',
  );
  $pane->extras = array();
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = '3603832e-68db-4872-8063-31e51eefba45';
  $display->content['new-3603832e-68db-4872-8063-31e51eefba45'] = $pane;
  $display->panels['footer'][1] = 'new-3603832e-68db-4872-8063-31e51eefba45';
  $pane = new stdClass();
  $pane->pid = 'new-4bc6da4d-dc2c-490f-bc69-4b740e4a4c98';
  $pane->panel = 'left_content';
  $pane->type = 'views_panes';
  $pane->subtype = 'cod_news-panel_pane_1';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'items_per_page' => '3',
    'arguments' => array(
      'gid' => '1',
    ),
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '4bc6da4d-dc2c-490f-bc69-4b740e4a4c98';
  $display->content['new-4bc6da4d-dc2c-490f-bc69-4b740e4a4c98'] = $pane;
  $display->panels['left_content'][0] = 'new-4bc6da4d-dc2c-490f-bc69-4b740e4a4c98';
  $pane = new stdClass();
  $pane->pid = 'new-92f522dc-f620-443a-8ac4-c8baa4640cb8';
  $pane->panel = 'preface';
  $pane->type = 'entity_field';
  $pane->subtype = 'node:body';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'label' => 'hidden',
    'formatter' => 'text_default',
    'delta_limit' => 0,
    'delta_offset' => '0',
    'delta_reversed' => FALSE,
    'formatter_settings' => array(),
    'context' => 'panelizer',
    'override_title' => 0,
    'override_title_text' => '',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '92f522dc-f620-443a-8ac4-c8baa4640cb8';
  $display->content['new-92f522dc-f620-443a-8ac4-c8baa4640cb8'] = $pane;
  $display->panels['preface'][0] = 'new-92f522dc-f620-443a-8ac4-c8baa4640cb8';
  $pane = new stdClass();
  $pane->pid = 'new-9e7be924-0930-4ef1-b0a8-4dc4da59caa4';
  $pane->panel = 'preface';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = FALSE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Ticket button',
    'title' => '',
    'body' => '<p><a href="/drupal-govcon-2015/registration" class="tickets" title="Waitlist">Waitlist</a></p>',
    'format' => 'full_html',
    'substitute' => 1,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => '',
    'css_class' => 'tickets',
  );
  $pane->extras = array();
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = '9e7be924-0930-4ef1-b0a8-4dc4da59caa4';
  $display->content['new-9e7be924-0930-4ef1-b0a8-4dc4da59caa4'] = $pane;
  $display->panels['preface'][1] = 'new-9e7be924-0930-4ef1-b0a8-4dc4da59caa4';
  $pane = new stdClass();
  $pane->pid = 'new-00e24811-7d48-46dd-95a6-b8aee80eb12d';
  $pane->panel = 'preface';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Big schedule star button',
    'title' => '',
    'body' => '<div class="schedule-star"><a href="/drupal-govcon-2015/schedule" title="See the schedule">Schedule</a></div>',
    'format' => 'full_html',
    'substitute' => 1,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => '',
    'css_class' => 'schedule-star-pane',
  );
  $pane->extras = array();
  $pane->position = 2;
  $pane->locks = array();
  $pane->uuid = '00e24811-7d48-46dd-95a6-b8aee80eb12d';
  $display->content['new-00e24811-7d48-46dd-95a6-b8aee80eb12d'] = $pane;
  $display->panels['preface'][2] = 'new-00e24811-7d48-46dd-95a6-b8aee80eb12d';
  $pane = new stdClass();
  $pane->pid = 'new-d815d2ff-886c-4b1f-8b13-7925adc949e0';
  $pane->panel = 'preface';
  $pane->type = 'views_panes';
  $pane->subtype = 'cod_sponsors-panel_pane_2';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'exposed' => array(
      'field_sponsor_sponsorship_level_tid' => array(
        46 => '46',
      ),
    ),
    'context' => array(
      0 => 'panelizer',
    ),
    'override_title' => 1,
    'override_title_text' => 'Diamond Sponsors',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => '',
    'css_class' => 'sponsors-featured bevel',
  );
  $pane->extras = array();
  $pane->position = 3;
  $pane->locks = array();
  $pane->uuid = 'd815d2ff-886c-4b1f-8b13-7925adc949e0';
  $display->content['new-d815d2ff-886c-4b1f-8b13-7925adc949e0'] = $pane;
  $display->panels['preface'][3] = 'new-d815d2ff-886c-4b1f-8b13-7925adc949e0';
  $pane = new stdClass();
  $pane->pid = 'new-3c1c06e3-2060-411a-b4eb-ce6f3218e20b';
  $pane->panel = 'preface';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Featured Keynote',
    'title' => 'Featured Speaker',
    'body' => '<h3>Angie Byron</h3>

<p><img alt="Angie Byron" src="/sites/all/themes/govcon/images/angie_dgc_web.jpg" /></p>
',
    'format' => 'full_html',
    'substitute' => 1,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => '',
    'css_class' => 'bevel featured-keynote',
  );
  $pane->extras = array();
  $pane->position = 4;
  $pane->locks = array();
  $pane->uuid = '3c1c06e3-2060-411a-b4eb-ce6f3218e20b';
  $display->content['new-3c1c06e3-2060-411a-b4eb-ce6f3218e20b'] = $pane;
  $display->panels['preface'][4] = 'new-3c1c06e3-2060-411a-b4eb-ce6f3218e20b';
  $pane = new stdClass();
  $pane->pid = 'new-c07e2a66-10f9-4539-a9c0-da58f8e72531';
  $pane->panel = 'preface';
  $pane->type = 'views';
  $pane->subtype = 'dgc_sessions';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '0',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'attachment_1',
    'context' => array(
      0 => 'panelizer.nid',
      1 => 'context_string_1.raw',
    ),
    'override_title' => 1,
    'override_title_text' => 'Session Tracks',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_id' => '',
    'css_class' => '',
  );
  $pane->extras = array();
  $pane->position = 5;
  $pane->locks = array();
  $pane->uuid = 'c07e2a66-10f9-4539-a9c0-da58f8e72531';
  $display->content['new-c07e2a66-10f9-4539-a9c0-da58f8e72531'] = $pane;
  $display->panels['preface'][5] = 'new-c07e2a66-10f9-4539-a9c0-da58f8e72531';
  $pane = new stdClass();
  $pane->pid = 'new-b7f97f39-e53f-4356-8dea-f36c0e63ad6b';
  $pane->panel = 'preface';
  $pane->type = 'views_panes';
  $pane->subtype = 'cod_session_tracks-panel_pane_2';
  $pane->shown = FALSE;
  $pane->access = array();
  $pane->configuration = array(
    'arguments' => array(
      'machine_name' => 'session_tracks_%node:nid',
    ),
    'override_title' => 0,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 6;
  $pane->locks = array();
  $pane->uuid = 'b7f97f39-e53f-4356-8dea-f36c0e63ad6b';
  $display->content['new-b7f97f39-e53f-4356-8dea-f36c0e63ad6b'] = $pane;
  $display->panels['preface'][6] = 'new-b7f97f39-e53f-4356-8dea-f36c0e63ad6b';
  $pane = new stdClass();
  $pane->pid = 'new-14b8468f-8685-4a64-9a72-df5156bdfec1';
  $pane->panel = 'top_right_content';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Drupal GovCon Twitter feed',
    'title' => '',
    'body' => '<div class="twitter-timeline__wrapper bevel bevel--white"><div class="twitter-timeline__header"><h2 class="pane-title">Tweets <a class="button btn-big" target="_blank" title="Follow drupalgovcon on Twitter" href="https://twitter.com/drupalgovcon">Follow</a></h2></div><a class="twitter-timeline" href="https://twitter.com/drupalgovcon" data-widget-id="598658356363075584" data-chrome="noheader nofooter noborders transparent">Tweets by @drupalgovcon</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>',
    'format' => 'full_html',
    'substitute' => 1,
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '14b8468f-8685-4a64-9a72-df5156bdfec1';
  $display->content['new-14b8468f-8685-4a64-9a72-df5156bdfec1'] = $pane;
  $display->panels['top_right_content'][0] = 'new-14b8468f-8685-4a64-9a72-df5156bdfec1';
  $display->hide_title = PANELS_TITLE_NONE;
  $display->title_pane = '0';
  $panelizer->display = $display;
  $export['node:event:dgc_2015'] = $panelizer;

  $panelizer = new stdClass();
  $panelizer->disabled = FALSE; /* Edit this to true to make a default panelizer disabled initially */
  $panelizer->api_version = 1;
  $panelizer->name = 'node:page:default:default';
  $panelizer->title = 'Default';
  $panelizer->panelizer_type = 'node';
  $panelizer->panelizer_key = 'page';
  $panelizer->no_blocks = FALSE;
  $panelizer->css_id = '';
  $panelizer->css = '';
  $panelizer->pipeline = 'ipe';
  $panelizer->contexts = array();
  $panelizer->relationships = array();
  $panelizer->access = array();
  $panelizer->view_mode = 'default';
  $panelizer->css_class = '';
  $panelizer->title_element = 'H2';
  $panelizer->link_to_entity = FALSE;
  $panelizer->extra = array();
  $display = new panels_display();
  $display->layout = 'flexible';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'center' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '%node:title';
  $display->uuid = 'b3b279f5-ed1d-4b50-bbf2-a861aa1c344e';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-e77d7150-2ab2-44e6-8cee-bf74af88c219';
  $pane->panel = 'center';
  $pane->type = 'entity_field';
  $pane->subtype = 'node:body';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'label' => 'hidden',
    'formatter' => 'text_default',
    'delta_limit' => 0,
    'delta_offset' => '0',
    'delta_reversed' => FALSE,
    'formatter_settings' => array(),
    'context' => 'panelizer',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = 'e77d7150-2ab2-44e6-8cee-bf74af88c219';
  $display->content['new-e77d7150-2ab2-44e6-8cee-bf74af88c219'] = $pane;
  $display->panels['center'][0] = 'new-e77d7150-2ab2-44e6-8cee-bf74af88c219';
  $pane = new stdClass();
  $pane->pid = 'new-db45a4fb-50a9-4d5e-86f3-0720955a58ac';
  $pane->panel = 'center';
  $pane->type = 'entity_field_extra';
  $pane->subtype = 'node:webform';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'view_mode' => 'full',
    'context' => 'panelizer',
    'override_title' => 0,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = 'db45a4fb-50a9-4d5e-86f3-0720955a58ac';
  $display->content['new-db45a4fb-50a9-4d5e-86f3-0720955a58ac'] = $pane;
  $display->panels['center'][1] = 'new-db45a4fb-50a9-4d5e-86f3-0720955a58ac';
  $pane = new stdClass();
  $pane->pid = 'new-71162711-2582-4848-a687-2060d29440b0';
  $pane->panel = 'center';
  $pane->type = 'entity_field';
  $pane->subtype = 'node:upload';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'label' => 'hidden',
    'formatter' => 'file_table',
    'delta_limit' => 0,
    'delta_offset' => '0',
    'delta_reversed' => FALSE,
    'formatter_settings' => array(),
    'context' => 'panelizer',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 2;
  $pane->locks = array();
  $pane->uuid = '71162711-2582-4848-a687-2060d29440b0';
  $display->content['new-71162711-2582-4848-a687-2060d29440b0'] = $pane;
  $display->panels['center'][2] = 'new-71162711-2582-4848-a687-2060d29440b0';
  $pane = new stdClass();
  $pane->pid = 'new-d9a1cec7-c62b-49f3-95f9-59eb0bcc9c3c';
  $pane->panel = 'center';
  $pane->type = 'entity_field';
  $pane->subtype = 'node:og_group_ref';
  $pane->shown = FALSE;
  $pane->access = array();
  $pane->configuration = array(
    'label' => 'above',
    'formatter' => 'entityreference_label',
    'delta_limit' => 0,
    'delta_offset' => '0',
    'delta_reversed' => FALSE,
    'formatter_settings' => array(
      'link' => FALSE,
    ),
    'context' => 'panelizer',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 3;
  $pane->locks = array();
  $pane->uuid = 'd9a1cec7-c62b-49f3-95f9-59eb0bcc9c3c';
  $display->content['new-d9a1cec7-c62b-49f3-95f9-59eb0bcc9c3c'] = $pane;
  $display->panels['center'][3] = 'new-d9a1cec7-c62b-49f3-95f9-59eb0bcc9c3c';
  $pane = new stdClass();
  $pane->pid = 'new-8a48e6b6-35f3-4bf3-a996-091be3ee9448';
  $pane->panel = 'center';
  $pane->type = 'node_links';
  $pane->subtype = 'node_links';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => FALSE,
    'override_title_text' => '',
    'build_mode' => 'default',
    'identifier' => '',
    'link' => TRUE,
    'context' => 'panelizer',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array(
    'css_class' => 'link-wrapper',
  );
  $pane->extras = array();
  $pane->position = 4;
  $pane->locks = array();
  $pane->uuid = '8a48e6b6-35f3-4bf3-a996-091be3ee9448';
  $display->content['new-8a48e6b6-35f3-4bf3-a996-091be3ee9448'] = $pane;
  $display->panels['center'][4] = 'new-8a48e6b6-35f3-4bf3-a996-091be3ee9448';
  $display->hide_title = PANELS_TITLE_NONE;
  $display->title_pane = '0';
  $panelizer->display = $display;
  $export['node:page:default:default'] = $panelizer;

  return $export;
}

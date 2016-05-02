<?php
/**
 * @file
 * cod_registration_pages.panelizer.inc
 */

/**
 * Implements hook_panelizer_defaults().
 */
function cod_registration_pages_panelizer_defaults() {
  $export = array();

  $panelizer = new stdClass();
  $panelizer->disabled = FALSE; /* Edit this to true to make a default panelizer disabled initially */
  $panelizer->api_version = 1;
  $panelizer->name = 'node:page:registration:default';
  $panelizer->title = 'Registration';
  $panelizer->panelizer_type = 'node';
  $panelizer->panelizer_key = 'page';
  $panelizer->no_blocks = FALSE;
  $panelizer->css_id = '';
  $panelizer->css = '';
  $panelizer->pipeline = 'ipe';
  $panelizer->contexts = array();
  $panelizer->relationships = array();
  $panelizer->access = array();
  $panelizer->relationships = array(
    0 => array(
      'identifier' => 'Conference',
      'keyword' => 'conference',
      'name' => 'entity_from_field:og_group_ref-node-node',
      'delta' => '0',
      'context' => 'panelizer',
      'id' => 1,
    ),
  );
  $panelizer->access = array(
    'logic' => 'and',
  );
  $panelizer->view_mode = 'default';
  $panelizer->css_class = 'page-node-registration';
  $panelizer->title_element = 'H2';
  $panelizer->link_to_entity = TRUE;
  $panelizer->extra = array();
  $display = new panels_display();
  $display->layout = 'cygnus';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'center' => NULL,
      'preface' => NULL,
      'content' => NULL,
      'footer' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = 'Registration';
  $display->uuid = '5a9baa0d-15d1-4b16-9840-6a983ea2183a';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-9126af12-4621-4820-bb37-6c53cb0e5303';
  $pane->panel = 'content';
  $pane->type = 'entity_field';
  $pane->subtype = 'node:field_event_tickets';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'label' => 'hidden',
    'formatter' => 'ticket_type',
    'delta_limit' => '0',
    'delta_offset' => '0',
    'delta_reversed' => 0,
    'formatter_settings' => array(
      'submit_text' => 'Continue to Registration',
      'show_unavailable' => 0,
    ),
    'context' => 'relationship_entity_from_field:og_group_ref-node-node_1',
    'override_title' => 1,
    'override_title_text' => 'Tickets',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '9126af12-4621-4820-bb37-6c53cb0e5303';
  $display->content['new-9126af12-4621-4820-bb37-6c53cb0e5303'] = $pane;
  $display->panels['content'][0] = 'new-9126af12-4621-4820-bb37-6c53cb0e5303';
  $pane = new stdClass();
  $pane->pid = 'new-87ae1465-faa2-450b-a0be-1a3623d3cbba';
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
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '87ae1465-faa2-450b-a0be-1a3623d3cbba';
  $display->content['new-87ae1465-faa2-450b-a0be-1a3623d3cbba'] = $pane;
  $display->panels['preface'][0] = 'new-87ae1465-faa2-450b-a0be-1a3623d3cbba';
  $display->hide_title = PANELS_TITLE_NONE;
  $display->title_pane = 'new-87ae1465-faa2-450b-a0be-1a3623d3cbba';
  $panelizer->display = $display;
  $export['node:page:registration:default'] = $panelizer;

  return $export;
}

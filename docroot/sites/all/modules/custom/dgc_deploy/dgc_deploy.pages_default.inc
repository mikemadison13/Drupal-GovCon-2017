<?php
/**
 * @file
 * dgc_deploy.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_pages().
 */
function dgc_deploy_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'dgc_my_schedule_page';
  $page->task = 'page';
  $page->admin_title = 'My Schedule page';
  $page->admin_description = '';
  $page->path = 'node/%node/schedule/mine';
  $page->access = array(
    'settings' => NULL,
    'type' => 'none',
  );
  $page->menu = array();
  $page->arguments = array(
    'node' => array(
      'id' => 1,
      'identifier' => 'Conference',
      'name' => 'entity_id:node',
      'settings' => array(),
      'keyword' => 'node',
    ),
  );
  $page->conf = array(
    'admin_paths' => FALSE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_dgc_my_schedule_page__panel_context_d9f635ee-f8b0-4f44-97d4-93c93157927c';
  $handler->task = 'page';
  $handler->subtask = 'dgc_my_schedule_page';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Schedule Page',
    'no_blocks' => 0,
    'pipeline' => 'ipe',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
  );
  $display = new panels_display();
  $display->layout = 'cygnus';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'preface' => NULL,
      'content' => NULL,
      'footer' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = 'My Schedule';
  $display->uuid = '77ac51b8-f86c-4684-8b15-b3f0ea5cdd0c';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-57a703d0-e549-4b24-8ca2-634eb677c6d7';
  $pane->panel = 'content';
  $pane->type = 'block';
  $pane->subtype = 'views-d0ac992818bd16258ffbea5a3c8fd25c';
  $pane->shown = FALSE;
  $pane->access = array();
  $pane->configuration = array(
    'inherit_path' => 1,
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
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '57a703d0-e549-4b24-8ca2-634eb677c6d7';
  $display->content['new-57a703d0-e549-4b24-8ca2-634eb677c6d7'] = $pane;
  $display->panels['content'][0] = 'new-57a703d0-e549-4b24-8ca2-634eb677c6d7';
  $pane = new stdClass();
  $pane->pid = 'new-da4f4f1a-2b55-4e8e-95ce-e40a92a0dbfb';
  $pane->panel = 'content';
  $pane->type = 'views_panes';
  $pane->subtype = 'cod_schedule-panel_pane_1';
  $pane->shown = FALSE;
  $pane->access = array();
  $pane->configuration = array(
    'arguments' => array(
      'gid' => '%node:nid',
    ),
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = 'da4f4f1a-2b55-4e8e-95ce-e40a92a0dbfb';
  $display->content['new-da4f4f1a-2b55-4e8e-95ce-e40a92a0dbfb'] = $pane;
  $display->panels['content'][1] = 'new-da4f4f1a-2b55-4e8e-95ce-e40a92a0dbfb';
  $pane = new stdClass();
  $pane->pid = 'new-9283f161-9f6d-42d5-860b-84d593d74b8f';
  $pane->panel = 'content';
  $pane->type = 'views_panes';
  $pane->subtype = 'cod_schedule-my_schedule_times';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'arguments' => array(
      'gid' => '%node:nid',
    ),
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 2;
  $pane->locks = array();
  $pane->uuid = '9283f161-9f6d-42d5-860b-84d593d74b8f';
  $display->content['new-9283f161-9f6d-42d5-860b-84d593d74b8f'] = $pane;
  $display->panels['content'][2] = 'new-9283f161-9f6d-42d5-860b-84d593d74b8f';
  $pane = new stdClass();
  $pane->pid = 'new-4ea0decf-bcab-4515-b8a3-5080cba88e26';
  $pane->panel = 'preface';
  $pane->type = 'custom';
  $pane->subtype = 'custom';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'admin_title' => 'Schedule links',
    'title' => '',
    'body' => '<p><a class="button btn-big" href="%node:url/schedule">Conference Schedule</a> <a class="button btn-big" href="">My Schedule</a> <a class="button btn-big" href="%node:url/bofs">BoFs</a> <a class="button btn-big" href="%node:url/floor-layouts">Floor Layouts</a></p>
',
    'format' => 'filtered_html',
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
  $pane->uuid = '4ea0decf-bcab-4515-b8a3-5080cba88e26';
  $display->content['new-4ea0decf-bcab-4515-b8a3-5080cba88e26'] = $pane;
  $display->panels['preface'][0] = 'new-4ea0decf-bcab-4515-b8a3-5080cba88e26';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-da4f4f1a-2b55-4e8e-95ce-e40a92a0dbfb';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['dgc_my_schedule_page'] = $page;

  return $pages;

}

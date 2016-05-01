<?php
/**
 * @file
 * cod_email.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_pages().
 */
function cod_email_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'cod_emails';
  $page->task = 'page';
  $page->admin_title = 'COD Emails';
  $page->admin_description = '';
  $page->path = 'admin/conference/%node/edit/email/!cod_email_bundle';
  $page->access = array(
    'plugins' => array(
      0 => array(
        'name' => 'perm',
        'settings' => array(
          'perm' => 'administer conferences',
        ),
        'context' => 'logged-in-user',
        'not' => FALSE,
      ),
    ),
    'logic' => 'and',
  );
  $page->menu = array(
    'type' => 'tab',
    'title' => 'Email Templates',
    'name' => 'navigation',
    'weight' => '0',
    'parent' => array(
      'type' => 'none',
      'title' => '',
      'name' => 'navigation',
      'weight' => '0',
    ),
  );
  $page->arguments = array(
    'node' => array(
      'id' => 1,
      'identifier' => 'Conference',
      'name' => 'entity_id:node',
      'settings' => array(),
    ),
    'cod_email_bundle' => array(
      'id' => 1,
      'identifier' => 'Bundle',
      'name' => 'string',
      'settings' => array(
        'use_tail' => 0,
      ),
    ),
  );
  $page->conf = array(
    'admin_paths' => FALSE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_cod_emails__panel';
  $handler->task = 'page';
  $handler->subtask = 'cod_emails';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Panel',
    'no_blocks' => 0,
    'pipeline' => 'standard',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
    'name' => 'panel',
  );
  $display = new panels_display();
  $display->layout = 'flexible';
  $display->layout_settings = array(
    'items' => array(
      'canvas' => array(
        'type' => 'row',
        'contains' => 'column',
        'children' => array(
          0 => 'main',
        ),
        'parent' => NULL,
      ),
      'main' => array(
        'type' => 'column',
        'width' => 100,
        'width_type' => '%',
        'children' => array(
          0 => 'main-row',
        ),
        'parent' => 'canvas',
      ),
      'main-row' => array(
        'type' => 'row',
        'contains' => 'region',
        'children' => array(
          0 => 'vertical_tabs',
          1 => 'center',
        ),
        'parent' => 'main',
      ),
      'center' => array(
        'type' => 'region',
        'title' => 'Center',
        'width' => '100',
        'width_type' => '%',
        'parent' => 'main-row',
      ),
      'vertical_tabs' => array(
        'type' => 'region',
        'title' => 'Vertical Tabs',
        'width' => '240',
        'width_type' => 'px',
        'parent' => 'main-row',
        'class' => '',
        'hide_empty' => 0,
      ),
    ),
  );
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'header' => NULL,
      'banner' => NULL,
      'top_stories' => NULL,
      'promo' => NULL,
      'left_rail' => NULL,
      'content_row_1' => NULL,
      'content_row_2' => NULL,
      'content_row_3' => NULL,
      'content_row_4' => NULL,
      'content_row_5' => NULL,
      'content_row_6' => NULL,
      'content_row_7' => NULL,
      'content_row_8' => NULL,
      'partners' => NULL,
      'footer' => NULL,
      'center' => NULL,
      'vertical_tabs' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '';
  $display->uuid = '48e53058-b9c1-43a9-9cdf-27ffa7880b03';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-1c09845e-1e7d-425d-af3b-cefbf783097f';
  $pane->panel = 'center';
  $pane->type = 'cod_email_entity_form_pane';
  $pane->subtype = 'cod_email_entity_form_pane';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array();
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '1c09845e-1e7d-425d-af3b-cefbf783097f';
  $display->content['new-1c09845e-1e7d-425d-af3b-cefbf783097f'] = $pane;
  $display->panels['center'][0] = 'new-1c09845e-1e7d-425d-af3b-cefbf783097f';
  $pane = new stdClass();
  $pane->pid = 'new-98df2cb2-e946-49df-b292-29cd559886d6';
  $pane->panel = 'vertical_tabs';
  $pane->type = 'cod_email_vertical_tabs_pane';
  $pane->subtype = 'cod_email_vertical_tabs_pane';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array();
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '98df2cb2-e946-49df-b292-29cd559886d6';
  $display->content['new-98df2cb2-e946-49df-b292-29cd559886d6'] = $pane;
  $display->panels['vertical_tabs'][0] = 'new-98df2cb2-e946-49df-b292-29cd559886d6';
  $display->hide_title = PANELS_TITLE_PANE;
  $display->title_pane = 'new-1c09845e-1e7d-425d-af3b-cefbf783097f';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['cod_emails'] = $page;

  return $pages;

}

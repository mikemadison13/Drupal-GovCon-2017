<?php

/**
 * @file
 * Plugin to provide a context from og_context().
 */

/**
 * Plugins are described by creating a $plugin array which will be used
 * by the system that includes this file.
 */
$plugin = array(
  'title' => t('Entity'),
  'description' => t('Get the current group context.'),
  'context' => 'og_context_og_context_context',
  'edit form' => 'og_context_og_context_edit_form',
  'get child' => 'og_context_og_context_get_child',
  'get children' => 'og_context_og_context_get_children',
);


/**
 * Returns a single relationship plugin.
 */
function og_context_og_context_get_child($plugin, $parent, $child) {
  $plugins = og_context_og_context_get_children($plugin, $parent);
  return $plugins[$parent . ':' . $child];
}

/**
 * Get all the relationship plugins created by this file.
 */
function og_context_og_context_get_children($parent_plugin, $parent) {
  $cid = $parent_plugin['name'] . ':' . $parent;
  $cache = &drupal_static(__FUNCTION__);
  if (!empty($cache[$cid])) {
    return $cache[$cid];
  }

  // Set variables.
  $entities = entity_get_info();
  $plugins = array();
  $group_entity_types = og_get_all_group_entity();

  // There may be more than one entity type that can serve as a group.
  foreach ($group_entity_types as $group_entity_type => $group_entity_type_label) {
    $name = $group_entity_type;
    $plugin_id = $parent . ':' . $name;

    $plugin = $parent_plugin;
    $replacements = array(
      '@to_entity' => $group_entity_type_label,
    );

    $plugin['title'] = t('Current Organic Group: @to_entity', $replacements);
    $plugin['keyword'] = $group_entity_type;
    $plugin['context name'] = $name;
    $plugin['name'] = $plugin_id;
    $plugin['description'] = t('Get the current OG @to_entity context', $replacements);
    $plugin['to entity'] = $entities[$group_entity_type];
    $plugin['parent'] = $parent;
    $plugin['required context'] = new ctools_context_required(t('Not Used'), 'string');

    $plugins[$plugin_id] = $plugin;
  }

  return $plugins;
}

/**
 * Return a new context based on an existing context.
 */
function og_context_og_context_context($context, $conf) {

  $plugin = $conf['name'];
  list($plugin, $to_entity) = explode(':', $plugin);

  // Get the current context.
  $current_context = og_context();
  if (!empty($current_context['group_type']) && $current_context['group_type'] === $to_entity) {
    if (!empty($current_context['gid']) && is_numeric($current_context['gid'])) {
      $gid = $current_context['gid'];
    }
  }

  // If a gid was found above, return a context.
  if (!empty($gid)) {
    return ctools_context_create('entity:' . $to_entity, $gid);
  }

  // Default to returning an empty context.
  return ctools_context_create_empty('entity:' . $to_entity, NULL);
}

/**
 * Configuration form.
 */
function og_context_og_context_edit_form($form, &$form_state) {

  // Hide the context select list because the context does not actually get used.
  if (!empty($form['context'])) {
    $form['context']['#description'] = t('This context is not actually used. Organic Groups will get the current group from the current page.');
  }

  return $form;
}

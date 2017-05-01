<?php

/**
 * @file
 * Post update functions for Page Manager.
 */

/**
 * @addtogroup updates-8.3.0
 * @{
 */

/**
 * Rename layout machine names in config entities to match layout discovery's default layouts.
 */
function page_manager_post_update_rename_layout_machine_names() {
  // Update the defaults per content type
  $entity_storage = \Drupal::service('entity_type.manager')->getStorage('page_variant');
  foreach($entity_storage->loadMultiple() as $page_variant) {
    $variant_plugin = $page_variant->getVariantPlugin();
    if ($variant_plugin->getPluginId() === 'panels_variant') {
      $layout_id = $variant_plugin->getConfiguration()['layout'];
      $layout_settings = $variant_plugin->getConfiguration()['layout_settings'];
      if ($new_layout_id = panels_convert_plugin_ids_to_layout_discovery($layout_id)) {
        $variant_plugin->setLayout($new_layout_id, $layout_settings);
        $page_variant->save();
      }
    }
  }
}
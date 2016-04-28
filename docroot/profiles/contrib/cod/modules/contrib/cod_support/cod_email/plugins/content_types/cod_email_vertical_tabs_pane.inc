<?php
/**
 * This plugin array is more or less self documenting
 */
$plugin = array(
  'title' => t('Vertical Tabs'),
  'single' => TRUE,
  'category' => array(t('Conference Organizing'), -9),
  'render callback' => 'cod_email_vertical_tabs_pane_render'
);

function cod_email_vertical_tabs_pane_render($subtype, $conf, $context = NULL) {
  $block = new stdClass();
  $block->title = '';

  $conference = array_shift($context);
  // Get the vertical tabs
  $entity_type = EntityType::loadByName('cod_email');

  $bundles = Bundle::loadByEntityType($entity_type);
  usort($bundles, 'eck_alphabetical_cmp');

  $output = '<ul class="vertical-tabs-list">';
  $first = TRUE;
  $last = FALSE;
  $count = 0;
  foreach ($bundles as $bundle) {
    $count++;
    if ($count == sizeof($bundles)) {
      $last = TRUE;
    }
    $classes = 'vertical-tab-button';
    $first ? $classes .= ' first ' : '';
    $last ? $classes .= ' last' : '';
    $url = l($bundle->label, 'admin/conference/'. $conference .'/edit/email/'. $bundle->name);
    $output .= '<li tabindex="-1" class="'.$classes.'">'.$url.'</li>';
    $first = FALSE;
  }
  $output .= '</ul>';

  $block->content = $output;
  return $block;
}

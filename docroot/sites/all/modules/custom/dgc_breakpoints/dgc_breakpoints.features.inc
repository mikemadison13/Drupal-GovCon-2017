<?php
/**
 * @file
 * dgc_breakpoints.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function dgc_breakpoints_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "breakpoints" && $api == "default_breakpoint_group") {
    return array("version" => "1");
  }
  if ($module == "breakpoints" && $api == "default_breakpoints") {
    return array("version" => "1");
  }
  if ($module == "picture" && $api == "default_picture_mapping") {
    return array("version" => "2");
  }
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_image_default_styles().
 */
function dgc_breakpoints_image_default_styles() {
  $styles = array();

  // Exported image style: banner_image_mobile_1x.
  $styles['banner_image_mobile_1x'] = array(
    'label' => 'Banner Image Mobile 1x',
    'effects' => array(
      4 => array(
        'name' => 'focal_point_scale_and_crop',
        'data' => array(
          'width' => 300,
          'height' => 300,
          'focal_point_advanced' => array(
            'shift_x' => '',
            'shift_y' => '',
          ),
        ),
        'weight' => 0,
      ),
    ),
  );

  // Exported image style: banner_image_narrow_1x.
  $styles['banner_image_narrow_1x'] = array(
    'label' => 'Banner Image Narrow 1x',
    'effects' => array(
      3 => array(
        'name' => 'focal_point_scale_and_crop',
        'data' => array(
          'width' => 740,
          'height' => 400,
          'focal_point_advanced' => array(
            'shift_x' => '',
            'shift_y' => '',
          ),
        ),
        'weight' => 0,
      ),
    ),
  );

  // Exported image style: banner_image_normal_1x.
  $styles['banner_image_normal_1x'] = array(
    'label' => 'Banner Image Normal 1x',
    'effects' => array(
      2 => array(
        'name' => 'focal_point_scale_and_crop',
        'data' => array(
          'width' => 980,
          'height' => 500,
          'focal_point_advanced' => array(
            'shift_x' => '',
            'shift_y' => '',
          ),
        ),
        'weight' => 0,
      ),
    ),
  );

  // Exported image style: banner_image_wide_1x.
  $styles['banner_image_wide_1x'] = array(
    'label' => 'Banner Image Wide 1x',
    'effects' => array(
      1 => array(
        'name' => 'focal_point_scale_and_crop',
        'data' => array(
          'width' => 2560,
          'height' => 720,
          'focal_point_advanced' => array(
            'shift_x' => '',
            'shift_y' => '',
          ),
        ),
        'weight' => 0,
      ),
    ),
  );

  return $styles;
}

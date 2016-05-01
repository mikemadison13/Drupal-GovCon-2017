<?php
/**
 * @file
 * dgc_breakpoints.default_picture_mapping.inc
 */

/**
 * Implements hook_default_picture_mapping().
 */
function dgc_breakpoints_default_picture_mapping() {
  $export = array();

  $picture_mapping = new PictureMapping();
  $picture_mapping->disabled = FALSE; /* Edit this to true to make a default picture_mapping disabled initially */
  $picture_mapping->api_version = 2;
  $picture_mapping->label = 'Banner Image Mapping';
  $picture_mapping->machine_name = 'banner_image_mapping';
  $picture_mapping->breakpoint_group = 'govcon_2016';
  $picture_mapping->mapping = array(
    'breakpoints.theme.govcon_2016.wide' => array(
      '1x' => array(
        'mapping_type' => 'image_style',
        'image_style' => 'banner_image_wide_1x',
      ),
      '1.5x' => array(
        'mapping_type' => '_none',
      ),
      '2x' => array(
        'mapping_type' => '_none',
      ),
    ),
    'breakpoints.theme.govcon_2016.normal' => array(
      '1x' => array(
        'mapping_type' => 'image_style',
        'image_style' => 'banner_image_normal_1x',
      ),
      '1.5x' => array(
        'mapping_type' => '_none',
      ),
      '2x' => array(
        'mapping_type' => '_none',
      ),
    ),
    'breakpoints.theme.govcon_2016.narrow' => array(
      '1x' => array(
        'mapping_type' => 'image_style',
        'image_style' => 'banner_image_narrow_1x',
      ),
      '1.5x' => array(
        'mapping_type' => '_none',
      ),
      '2x' => array(
        'mapping_type' => '_none',
      ),
    ),
    'breakpoints.theme.govcon_2016.mobile' => array(
      '1x' => array(
        'mapping_type' => 'image_style',
        'image_style' => 'banner_image_mobile_1x',
      ),
      '1.5x' => array(
        'mapping_type' => '_none',
      ),
      '2x' => array(
        'mapping_type' => '_none',
      ),
    ),
  );
  $export['banner_image_mapping'] = $picture_mapping;

  return $export;
}

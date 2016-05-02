<?php
/**
 * @file
 * dgc_breakpoints.default_breakpoint_group.inc
 */

/**
 * Implements hook_default_breakpoint_group().
 */
function dgc_breakpoints_default_breakpoint_group() {
  $export = array();

  $breakpoint_group = new stdClass();
  $breakpoint_group->disabled = FALSE; /* Edit this to true to make a default breakpoint_group disabled initially */
  $breakpoint_group->api_version = 1;
  $breakpoint_group->machine_name = 'govcon_2016';
  $breakpoint_group->name = 'GovCon 2016';
  $breakpoint_group->breakpoints = array(
    0 => 'breakpoints.theme.govcon_2016.wide',
    1 => 'breakpoints.theme.govcon_2016.normal',
    2 => 'breakpoints.theme.govcon_2016.narrow',
    3 => 'breakpoints.theme.govcon_2016.mobile',
  );
  $breakpoint_group->type = 'theme';
  $breakpoint_group->overridden = 0;
  $export['govcon_2016'] = $breakpoint_group;

  return $export;
}

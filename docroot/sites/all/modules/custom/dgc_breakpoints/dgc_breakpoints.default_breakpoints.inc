<?php
/**
 * @file
 * dgc_breakpoints.default_breakpoints.inc
 */

/**
 * Implements hook_default_breakpoints().
 */
function dgc_breakpoints_default_breakpoints() {
  $export = array();

  $breakpoint = new stdClass();
  $breakpoint->disabled = FALSE; /* Edit this to true to make a default breakpoint disabled initially */
  $breakpoint->api_version = 1;
  $breakpoint->machine_name = 'breakpoints.theme.govcon_2016.mobile';
  $breakpoint->name = 'mobile';
  $breakpoint->breakpoint = '(min-width: 0px)';
  $breakpoint->source = 'govcon_2016';
  $breakpoint->source_type = 'theme';
  $breakpoint->status = 1;
  $breakpoint->weight = 3;
  $breakpoint->multipliers = array(
    '1.5x' => '1.5x',
    '2x' => '2x',
    '1x' => '1x',
  );
  $export['breakpoints.theme.govcon_2016.mobile'] = $breakpoint;

  $breakpoint = new stdClass();
  $breakpoint->disabled = FALSE; /* Edit this to true to make a default breakpoint disabled initially */
  $breakpoint->api_version = 1;
  $breakpoint->machine_name = 'breakpoints.theme.govcon_2016.narrow';
  $breakpoint->name = 'narrow';
  $breakpoint->breakpoint = '(min-width: 740px)';
  $breakpoint->source = 'govcon_2016';
  $breakpoint->source_type = 'theme';
  $breakpoint->status = 1;
  $breakpoint->weight = 2;
  $breakpoint->multipliers = array(
    '1.5x' => '1.5x',
    '2x' => '2x',
    '1x' => '1x',
  );
  $export['breakpoints.theme.govcon_2016.narrow'] = $breakpoint;

  $breakpoint = new stdClass();
  $breakpoint->disabled = FALSE; /* Edit this to true to make a default breakpoint disabled initially */
  $breakpoint->api_version = 1;
  $breakpoint->machine_name = 'breakpoints.theme.govcon_2016.normal';
  $breakpoint->name = 'normal';
  $breakpoint->breakpoint = '(min-width: 980px)';
  $breakpoint->source = 'govcon_2016';
  $breakpoint->source_type = 'theme';
  $breakpoint->status = 1;
  $breakpoint->weight = 1;
  $breakpoint->multipliers = array(
    '1.5x' => '1.5x',
    '2x' => '2x',
    '1x' => '1x',
  );
  $export['breakpoints.theme.govcon_2016.normal'] = $breakpoint;

  $breakpoint = new stdClass();
  $breakpoint->disabled = FALSE; /* Edit this to true to make a default breakpoint disabled initially */
  $breakpoint->api_version = 1;
  $breakpoint->machine_name = 'breakpoints.theme.govcon_2016.wide';
  $breakpoint->name = 'wide';
  $breakpoint->breakpoint = '(min-width: 1220px)';
  $breakpoint->source = 'govcon_2016';
  $breakpoint->source_type = 'theme';
  $breakpoint->status = 1;
  $breakpoint->weight = 0;
  $breakpoint->multipliers = array(
    '1.5x' => '1.5x',
    '2x' => '2x',
    '1x' => '1x',
  );
  $export['breakpoints.theme.govcon_2016.wide'] = $breakpoint;

  return $export;
}

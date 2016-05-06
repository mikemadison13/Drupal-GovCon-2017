<?php
/**
 * @file
 * dgc_extras.strongarm.inc
 */

/**
 * Implements hook_strongarm().
 */
function dgc_extras_strongarm() {
  $export = array();

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'date_format_day_of_the_week';
  $strongarm->value = 'l';
  $export['date_format_day_of_the_week'] = $strongarm;

  return $export;
}

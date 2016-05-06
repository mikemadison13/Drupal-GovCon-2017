<?php
/**
 * @file
 * dgc_extras.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function dgc_extras_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'flag session_schedule'.
  $permissions['flag session_schedule'] = array(
    'name' => 'flag session_schedule',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'flag',
  );

  // Exported permission: 'unflag session_schedule'.
  $permissions['unflag session_schedule'] = array(
    'name' => 'unflag session_schedule',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'flag',
  );

  return $permissions;
}

<?php

namespace Drupal\acsf_sj\Api;

/**
 * An interface to represent the Sj client API.
 */
interface SjClientInterface {

  /**
   * Adds a scheduled job.
   *
   * @param string $drush_command
   *   A drush command to run.
   * @param string $reason
   *   The purpose of this job.
   * @param int $timestamp
   *   Unix timestamp when the command should be run or NULL to run ASAP.
   * @param string $domain
   *   The domain to use when calling the drush command or NULL for the class
   *   to determine.
   * @param int $timeout
   *   How long in seconds the process should be allowed to run or NULL for
   *   system default.
   * @param string $drush_executable
   *   The drush binary to use, 'drush' by default. i.e. drush9.
   * @param string $drush_options
   *   A list of drush options that will be applied to the drush command. If
   *   none are provided, "-y" will be used.
   *
   * @return bool
   *   Returns TRUE on a non-zero exit code signaling that the sjadd command
   *   succeeded.
   */
  public function addJob($drush_command, $reason = NULL, $timestamp = NULL, $domain = NULL, $timeout = NULL, $drush_executable = NULL, $drush_options = NULL);

}

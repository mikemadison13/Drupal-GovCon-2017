<?php

namespace Drupal\acsf_sj\Api;

use Psr\Log\LogLevel;

/**
 * Provides a Scheduled Jobs API local development client.
 */
class SjLocalDevClient extends SjApiClient implements SjClientInterface {

  /**
   * {@inheritdoc}
   */
  public function addJob($drush_command, $reason = NULL, $timestamp = NULL, $domain = NULL, $timeout = NULL, $drush_executable = NULL, $drush_options = NULL) {
    try {
      $this->inputValidation($drush_command, $timestamp, $domain, $timeout, $drush_executable, $drush_options);
    }
    catch (\Exception $e) {
      $this->logger->log(LogLevel::ERROR, 'Local dev: unable to add the scheduled job: @message', ['@message' => $e->getMessage()]);
      return FALSE;
    }
    $sjadd_arguments = $this->prepareCommandArguments($drush_command, $reason, $timestamp, $domain, $timeout, $drush_executable, $drush_options);

    $this->logger->log(LogLevel::NOTICE, 'Local dev: sjadd @arguments', ['@arguments' => $sjadd_arguments]);
    return TRUE;
  }

}

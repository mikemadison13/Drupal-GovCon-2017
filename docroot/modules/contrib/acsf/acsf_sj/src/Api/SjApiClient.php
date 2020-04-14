<?php

namespace Drupal\acsf_sj\Api;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Process\Process;

/**
 * Provides a Scheduled Jobs API client.
 */
class SjApiClient implements SjClientInterface {

  /**
   * Current domain of this site.
   *
   * @var string
   */
  protected $domain;

  /**
   * A logger instance for acsf_sj.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * Scheduled Job's binaries path.
   *
   * @var string
   */
  private $binary;

  /**
   * Constructs the ACSF SJ Client.
   *
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   */
  public function __construct(RequestStack $request_stack, LoggerInterface $logger) {
    $this->domain = $request_stack->getCurrentRequest()->getHost();
    $this->logger = $logger;
    $this->binary = acsf_sj_get_sjadd_path();
  }

  /**
   * {@inheritdoc}
   */
  public function addJob($drush_command, $reason = NULL, $timestamp = NULL, $domain = NULL, $timeout = NULL, $drush_executable = NULL, $drush_options = NULL) {
    try {
      $this->inputValidation($drush_command, $timestamp, $domain, $timeout, $drush_executable, $drush_options);
    }
    catch (\Exception $e) {
      $this->logger->log(LogLevel::ERROR, 'Unable to add the scheduled job: @message', ['@message' => $e->getMessage()]);
      return FALSE;
    }
    $sjadd_arguments = $this->prepareCommandArguments($drush_command, $reason, $timestamp, $domain, $timeout, $drush_executable, $drush_options);

    return $this->executeSjAdd($sjadd_arguments);
  }

  /**
   * Validates/completes the sjadd input.
   *
   * @param string $drush_command
   *   A drush command to run.
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
   * @throws \InvalidArgumentException
   *   If the input arguments are not all valid.
   */
  protected function inputValidation($drush_command, &$timestamp, &$domain, $timeout = NULL, &$drush_executable = NULL, &$drush_options = NULL) {
    if (is_null($timestamp)) {
      $timestamp = time();
    }
    $domain = !empty($domain) ? $domain : $this->domain;
    $drush_executable = (!empty($drush_executable)) ? $drush_executable : 'drush';
    if (is_null($drush_options)) {
      $drush_options = '-y';
    }

    if (empty($drush_command) || !is_string($drush_command)) {
      throw new \InvalidArgumentException('The command argument must be a non-empty string.');
    }

    if (!is_numeric($timestamp) || intval($timestamp) < 0) {
      throw new \InvalidArgumentException('The timestamp argument must be a positive integer.');
    }

    if (!is_null($domain) && (empty($domain) || !is_string($domain))) {
      throw new \InvalidArgumentException('The domain argument must be a non-empty string.');
    }

    if (!is_null($timeout) && (!is_numeric($timeout) || intval($timeout) < 0)) {
      throw new \InvalidArgumentException('The timeout argument must be a positive integer.');
    }

    if (!is_null($drush_executable) && (empty($drush_executable) || !is_string($drush_executable))) {
      throw new \InvalidArgumentException('The drush_executable argument must be a non-empty string.');
    }
    if (empty($drush_options) || !is_string($drush_options)) {
      throw new \InvalidArgumentException('The drush_options argument must be a non-empty string.');
    }
  }

  /**
   * Compiles the argument to the sjadd command.
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
   * @return string
   *   The sjadd command.
   */
  protected function prepareCommandArguments($drush_command, $reason, $timestamp, $domain, $timeout, $drush_executable, $drush_options) {
    /*
     * Options for sjadd should be placed before its arguments so as to not be
     * mistaken for drush options.
     *
     * Argument order:
     * TIMESTAMP DOMAIN [DRUSH_COMMAND] [DRUSH_EXECUTABLE] [DRUSH_OPTIONS...]
     */
    $arguments = '';
    if (!empty($reason)) {
      $arguments .= sprintf('--reason=%s ', escapeshellarg($reason));
    }
    if (!empty($timeout) && is_numeric($timeout)) {
      $arguments .= sprintf('--max-exec-time=%ds ', $timeout);
    }
    $arguments .= sprintf(
      '%d %s %s %s %s',
      intval($timestamp),
      escapeshellarg($domain),
      escapeshellarg($drush_command),
      escapeshellarg($drush_executable),
      escapeshellarg($drush_options)
    );
    return $arguments;
  }

  /**
   * Executes the sjadd command.
   *
   * @param string $command_arguments
   *   The arguments to the sjadd command, already escaped for shell execution.
   *
   * @return bool
   *   Whether the command was executed successfully.
   */
  private function executeSjAdd($command_arguments) {
    $error = '';
    if (!$this->binary) {
      $error = "The installation path for the ACSF 'sjadd' binary cannot be determined.";
    }
    elseif (!is_executable($this->binary)) {
      $error = "The ACSF 'sjadd' binary is missing or not executable, preventing adding a scheduled job.";
    }

    $exit_code = -1;
    if (!$error) {
      $command = sprintf('%s %s', $this->binary, $command_arguments);
      // Possibly one retry.
      for ($retry = 0; $retry < 2 && $exit_code !== 0; $retry++) {
        if ($retry) {
          $this->logger->log(LogLevel::WARNING, "Command '@command' will be re-run; it exited with code @code:\n@error", [
            '@command' => $command,
            '@code' => $exit_code,
            '@error' => $error,
          ]);
          // Retry after half of a second.
          usleep(500000);
        }

        try {
          $process = new Process($command);
          // We're hardcoding a timeout of 10 seconds for just scheduling the
          // job (rather than for executing the scheduled job).
          $process->setTimeout(10);
          $process->run();
          $exit_code = $process->getExitCode();
          if ($exit_code !== 0) {
            $error = $process->getErrorOutput();
          }
        }
        catch (\Exception $e) {
          $error = $e->getMessage();
        }
      }
    }

    if ($exit_code !== 0) {
      // This message is not completely accurate for code -1, but that's OK.
      // @error can be any single or multi-line output, so place on a new line.
      $this->logger->log(LogLevel::ERROR, "Command '@command' exited with code @code:\n@error", [
        '@command' => $command ?? '-',
        '@code' => $exit_code,
        '@error' => $error,
      ]);
    }
    return $exit_code === 0;
  }

}

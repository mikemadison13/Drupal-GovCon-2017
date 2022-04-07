<?php

namespace Acquia\DrupalCheck\Blt\Plugin\Commands;

use Acquia\Blt\Robo\BltTasks;
use Acquia\Blt\Robo\Exceptions\BltException;

/**
 * Defines commands in the "validate" namespace.
 */
class DrupalCheckTestCommand extends BltTasks {

  /**
   * Executes Drupal Check on Custom code.
   *
   * @command validate:deprecated
   */
  public function drupalCheck() {
    $this->drupalCheckModules();
    $this->drupalCheckThemes();
    $this->drupalCheckProfiles();
  }

  /**
   * Executes Drupal Check on Custom Modules.
   *
   * @command deprecated:modules
   */
  public function drupalCheckModules() {
    $this->runDrupalCheck('modules');
  }

  /**
   * Executes Drupal Check on Custom Themes.
   *
   * @command deprecated:themes
   */
  public function drupalCheckThemes() {
    $this->runDrupalCheck('themes');
  }

  /**
   * Executes Drupal Check on Custom Profiles.
   *
   * @command deprecated:profiles
   */
  public function drupalCheckProfiles() {
    $this->runDrupalCheck('profiles');
  }

  /**
   * Run Drupal checks.
   *
   * @param string $type
   *   Type of check (modules, profiles or themes).
   *
   * @throws \Acquia\Blt\Robo\Exceptions\BltException
   * @throws \Robo\Exception\TaskException
   */
  public function runDrupalCheck($type) {
    $this->say("Checking for Deprecated Code in docroot/$type/custom");
    $bin = $this->getConfigValue('composer.bin');
    $docroot = $this->getConfigValue('docroot');
    $result = $this->taskExecStack()
      ->dir($this->getConfigValue('repo.root'))
      ->exec("$bin/drupal-check -d $docroot/$type/custom")
      ->run();
    $exit_code = $result->getExitCode();
    if ($exit_code) {
      $this->logger->notice('Review Deprecation warnings and re-run.');
      throw new BltException("Drupal Check in docroot/$type/custom failed.");
    }
  }
}

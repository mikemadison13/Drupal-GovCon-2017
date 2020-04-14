<?php

use Drupal\acsf\AcsfConfig;

/**
 * AcsfConfigUnitTestMissingUsername.
 */
class AcsfConfigUnitTestMissingUsername extends AcsfConfig {

  /**
   * Implements AcsfConfig::loadConfig().
   */
  protected function loadConfig() {
    $this->url = 'http://gardener.unit.test';
    $this->password = 'Un1tT35t';
  }

}

<?php

use Drupal\Acsf\AcsfConfig;

/**
 * AcsfConfigUnitTestMissingPassword.
 */
class AcsfConfigUnitTestMissingPassword extends AcsfConfig {

  /**
   * Implements AcsfConfig::loadConfig().
   */
  protected function loadConfig() {
    $this->url = 'http://gardener.unit.test';
    $this->username = 'gardener_unit_test';
  }

}

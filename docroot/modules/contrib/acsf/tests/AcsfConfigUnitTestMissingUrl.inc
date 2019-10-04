<?php

use Drupal\Acsf\AcsfConfig;

/**
 * AcsfConfigUnitTestMissingUrl.
 */
class AcsfConfigUnitTestMissingUrl extends AcsfConfig {

  /**
   * Implements AcsfConfig::loadConfig().
   */
  protected function loadConfig() {
    $this->username = 'gardener_unit_test';
    $this->password = 'Un1tT35t';
  }

}

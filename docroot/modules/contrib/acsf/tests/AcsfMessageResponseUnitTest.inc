<?php

use Drupal\acsf\AcsfMessageResponse;

/**
 * This simple interface defines the way that responses are constructed.
 */
class AcsfMessageResponseUnitTest extends AcsfMessageResponse {

  /**
   * Determines whether the test failed.
   *
   * @return bool
   *   Whether the test failed.
   */
  public function failed() {
    if ($this->code) {
      return TRUE;
    }
    return FALSE;
  }

}

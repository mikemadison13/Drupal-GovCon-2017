<?php

require_once __DIR__ . '/../vendor/autoload.php';

class AcsfMessageResponseUnitTest extends \Drupal\acsf\AcsfMessageResponse {

  public function failed() {
    if ($this->code) {
      return TRUE;
    }
    return FALSE;
  }

}


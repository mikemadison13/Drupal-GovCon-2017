<?php

use Drupal\acsf\AcsfMessage;
use Drupal\acsf\AcsfMessageFailureException;

/**
 * AcsfMessageUnitTestFailureException.
 */
class AcsfMessageUnitTestFailureException extends AcsfMessage {

  /**
   * Implements AcsfMessage::sendMessage().
   */
  protected function sendMessage($url, $method, $endpoint, array $parameters, $username, $password) {
    throw new AcsfMessageFailureException('error message');
  }

}

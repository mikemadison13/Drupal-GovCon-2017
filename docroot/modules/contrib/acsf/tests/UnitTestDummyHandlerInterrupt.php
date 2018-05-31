<?php

require_once __DIR__ . '/../vendor/autoload.php';

class UnitTestDummyHandlerInterrupt extends \Drupal\acsf\Event\AcsfEventHandler {
  public function handle() {
    $this->event->dispatcher->interrupt();
  }
}


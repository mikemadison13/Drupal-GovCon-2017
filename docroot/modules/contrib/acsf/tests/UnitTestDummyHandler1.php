<?php

require_once __DIR__ . '/../vendor/autoload.php';

class UnitTestDummyHandler1 extends \Drupal\acsf\Event\AcsfEventHandler {
  public function handle() {}
}


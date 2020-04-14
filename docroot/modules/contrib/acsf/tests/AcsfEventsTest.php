<?php

/**
 * @file
 * Provides PHPUnit tests for the Acsf Events system.
 */

use Drupal\acsf\AcsfLog;
use Drupal\acsf\Event\AcsfEvent;
use Drupal\acsf\Event\AcsfEventDispatcher;
use Drupal\acsf\Event\AcsfEventHandlerIncompatibleException;
use PHPUnit\Framework\TestCase;

/**
 * Defines the Drupal root directory as the acsf directory.
 *
 * This is needed for AcsfEvent::loadHandlers().
 */
if (!defined('DRUPAL_ROOT')) {
  define('DRUPAL_ROOT', __DIR__ . '/..');
}

/**
 * UnitTest.
 */
// Class name doesn't match filename.
// phpcs:disable
class UnitTest extends TestCase {
// phpcs:enable

  /**
   * Setup.
   */
  public function setUp() {
    // The files in this directory can't be autoloaded as long as they don't
    // match their classes' namespaces.
    $files = [
      __DIR__ . '/UnitTestDummyHandler1.php',
      __DIR__ . '/UnitTestDummyHandler2.php',
      __DIR__ . '/UnitTestDummyHandler3.php',
      __DIR__ . '/UnitTestDummyHandlerInterrupt.php',
      __DIR__ . '/UnitTestDummyHandlerIncompatible.php',
    ];
    foreach ($files as $file) {
      // Acquia rules disallow 'include/require' with dynamic arguments.
      // phpcs:disable
      require_once $file;
      // phpcs:enable
    }
  }

  /**
   * Tests that the handlers are initially empty.
   */
  public function testAcsfEventHandlersEmpty() {
    $event = new AcsfEvent(new AcsfEventDispatcher(), new AcsfLog(), 'unit_test', [], []);
    $this->assertEmpty($event->debug());
  }

  /**
   * Tests that the push and pop methods work as expected.
   */
  public function testAcsfEventPushPop() {
    $classes = [
      'UnitTestDummyHandler1',
      'UnitTestDummyHandler2',
      'UnitTestDummyHandler3',
    ];
    $event = new AcsfEvent(new AcsfEventDispatcher(), new AcsfLog(), 'unit_test', [], []);
    foreach ($classes as $class) {
      $event->pushHandler(new $class($event));
    }
    $debug = $event->debug();
    $this->assertCount(3, $debug['handlers']['incomplete']);
    $handlers = [];
    while ($handler = $event->popHandler()) {
      $handlers[] = $handler;
    }
    $this->assertCount(3, $handlers);
    $this->assertEmpty($event->debug());
  }

  /**
   * Tests that events get run as expected.
   */
  public function testAcsfEventExecute() {
    $registry = acsf_get_registry();
    $event = new AcsfEvent(new AcsfEventDispatcher(), new AcsfLog(), 'unit_test', $registry, []);
    $event->run();
    $debug = $event->debug();
    $this->assertCount(3, $debug['handlers']['complete']);
  }

  /**
   * Tests that the events system handles interrupts correctly.
   */
  public function testAcsfEventInterrupt() {
    $registry = acsf_get_registry(TRUE);
    $event = new AcsfEvent(new AcsfEventDispatcher(), new AcsfLog(), 'unit_test', $registry, []);
    $event->run();
    $debug = $event->debug();
    $this->assertCount(1, $debug['handlers']['incomplete']);
    $this->assertCount(3, $debug['handlers']['complete']);
  }

  /**
   * Tests the create method.
   */
  public function testAcsfEventCreate() {
    $event = AcsfEvent::create('unit_test', []);
    $event->run();
    $debug = $event->debug();
    $this->assertCount(3, $debug['handlers']['complete']);
  }

  /**
   * Tests that incompatible handler types may not be used.
   */
  public function testAcsfEventHandlerIncompatibleType() {
    $registry = acsf_get_registry(FALSE, 'UnitTestDummyHandler1');
    $event = new AcsfEvent(new AcsfEventDispatcher(), new AcsfLog(), 'unit_test', $registry, []);
    // Pass in a bogus handler type to trigger an exception.
    $this->expectException(AcsfEventHandlerIncompatibleException::class);
    $event->popHandler('bogus_type');
  }

}

/**
 * Mocks acsf_get_registry for testing.
 *
 * The real function returns an array of event handlers, much the same as what
 * this version of the function returns, except that this function returns dummy
 * data.
 *
 * @param bool $include_interrupt
 *   Whether or not to include the interrupt class, which will interrupt the
 *   event processing so that feature may be tested.
 * @param string $handler
 *   A specific handler to return.
 *
 * @return array
 *   An array of dummy event handlers.
 */
function acsf_get_registry($include_interrupt = FALSE, $handler = NULL) {
  $classes = [
    'UnitTestDummyHandler1',
    'UnitTestDummyHandler2',
    'UnitTestDummyHandlerInterrupt',
    'UnitTestDummyHandler3',
  ];
  if (!$include_interrupt) {
    $classes = array_diff($classes, ['UnitTestDummyHandlerInterrupt']);
  }
  if ($handler) {
    $classes = array_intersect($classes, [$handler]);
  }
  $handlers = [];
  foreach ($classes as $class) {
    $handlers[] = [
      'type' => 'unit_test',
      'class' => $class,
      'path' => 'tests',
    ];
  }
  return ['events' => $handlers];
}

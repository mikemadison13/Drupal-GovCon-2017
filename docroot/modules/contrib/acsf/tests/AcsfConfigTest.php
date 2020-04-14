<?php

/**
 * @file
 * Provides PHPUnit tests for AcsfConfig.
 */

use Drupal\acsf\AcsfConfigIncompleteException;
use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\TestCase;

/**
 * Provides PHPUnit tests for AcsfConfig.
 */
class AcsfConfigTest extends TestCase {

  /**
   * Setup.
   */
  public function setUp() {
    // The files in this directory can't be autoloaded as long as they don't
    // match their classes' namespaces.
    $files = [
      __DIR__ . '/AcsfConfigUnitTest.inc',
      __DIR__ . '/AcsfConfigUnitTestMissingPassword.inc',
      __DIR__ . '/AcsfConfigUnitTestMissingUrl.inc',
      __DIR__ . '/AcsfConfigUnitTestMissingUsername.inc',
      __DIR__ . '/AcsfConfigUnitTestIncompatible.inc',
      __DIR__ . '/AcsfMessageUnitTestSuccess.inc',
      __DIR__ . '/AcsfMessageUnitTestFailure.inc',
      __DIR__ . '/AcsfMessageUnitTestFailureException.inc',
      __DIR__ . '/AcsfMessageUnitTestMissingEndpoint.inc',
      __DIR__ . '/AcsfMessageUnitTestMissingResponse.inc',
      __DIR__ . '/AcsfMessageResponseUnitTest.inc',
    ];
    foreach ($files as $file) {
      // Acquia rules disallow 'include/require' with dynamic arguments.
      // phpcs:disable
      require_once $file;
      // phpcs:enable
    }
  }

  /**
   * Tests that a PHP error is thrown when no constructor params are provided.
   */
  public function testAcsfConfigMissingParameters() {
    // Intentionally avoid providing the required constructor parameters to
    // check that the environment variables are used.
    $this->expectException(Notice::class);
    $this->expectExceptionMessage('AH_SITE_GROUP');
    new AcsfConfigUnitTest();
  }

  /**
   * Tests that a PHP error is thrown when not enough params are provided.
   */
  public function testAcsfConfigMissingEnvironment() {
    $this->expectException(Notice::class);
    $this->expectExceptionMessage('AH_SITE_ENVIRONMENT');
    new AcsfConfigUnitTest('ah_site_group');
  }

  /**
   * Tests that a PHP error is thrown when not enough params are provided.
   */
  public function testAcsfConfigMissingSiteGroup() {
    $this->expectException(Notice::class);
    $this->expectExceptionMessage('AH_SITE_GROUP');
    new AcsfConfigUnitTest(NULL, 'ah_site_environment');
  }

  /**
   * Tests no PHP error is thrown when the necessary parameters are provided.
   */
  public function testAcsfConfigNoMissing() {
    try {
      $no_error = TRUE;
      // Provide bot the $ah_site and $ah_env parameters to ensure no errors are
      // triggered for missing environment variables.
      $config = new AcsfConfigUnitTest('ah_site_group', 'ah_site_environment');
    }
    catch (Notice $e) {
      $no_error = FALSE;
    }
    $this->assertTrue($no_error);
  }

  /**
   * Tests that a missing password triggers an exception.
   */
  public function testAcsfConfigMissingPassword() {
    $this->expectException(AcsfConfigIncompleteException::class);
    new AcsfConfigUnitTestMissingPassword('unit_test_site', 'unit_test_env');
  }

  /**
   * Tests that a missing username triggers an exception.
   */
  public function testAcsfConfigMissingUsername() {
    $this->expectException(AcsfConfigIncompleteException::class);
    new AcsfConfigUnitTestMissingUsername('unit_test_site', 'unit_test_env');
  }

  /**
   * Tests that a missing URL triggers an exception.
   */
  public function testAcsfConfigMissingUrl() {
    $this->expectException(AcsfConfigIncompleteException::class);
    new AcsfConfigUnitTestMissingUrl('unit_test_site', 'unit_test_env');
  }

  /**
   * Tests getPassword() works as expected.
   */
  public function testAcsfConfigGetPassword() {
    $config = new AcsfConfigUnitTest('unit_test_site', 'unit_test_env');
    $this->assertSame($config->getPassword(), 'Un1tT35t');
  }

  /**
   * Tests getUrl() works as expected.
   */
  public function testAcsfConfigGetUrl() {
    $config = new AcsfConfigUnitTest('unit_test_site', 'unit_test_env');
    $this->assertSame($config->getUrl(), 'http://gardener.unit.test');
  }

  /**
   * Tests getUsername() works as expected.
   */
  public function testAcsfConfigGetUsername() {
    $config = new AcsfConfigUnitTest('unit_test_site', 'unit_test_env');
    $this->assertSame($config->getUsername(), 'gardener_unit_test');
  }

}

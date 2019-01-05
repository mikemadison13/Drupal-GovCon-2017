<?php

namespace Drupal\Tests\lightning_core\ExistingSite;

use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning_roles
 * @group lightning_core
 * @group lightning
 * @group orca_public
 */
class ContentRoleFormTest extends ExistingSiteBase {

  /**
   * {@inheritdoc}
   */
  protected function prepareRequest() {
    // The base implementation of this method will set a special cookie
    // identifying the Mink session as a test user agent. For this kind of test,
    // though, we don't need that.
  }

  public function test() {
    $account = $this->createUser([], NULL, TRUE);
    $this->drupalLogin($account);

    $this->drupalGet("/admin/config/system/lightning/roles");
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->fieldExists('content_roles[reviewer]')->check();
    $this->assertSession()->buttonExists('Save configuration')->press();
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->fieldExists('content_roles[reviewer]')->uncheck();
    $this->assertSession()->buttonExists('Save configuration')->press();
    $this->assertSession()->statusCodeEquals(200);
  }

}

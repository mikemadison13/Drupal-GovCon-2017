<?php

namespace Drupal\Tests\lightning_core\ExistingSite;

use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning_roles
 * @group lightning_core
 * @group lightning
 */
class ContentRoleFormTest extends ExistingSiteBase {

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

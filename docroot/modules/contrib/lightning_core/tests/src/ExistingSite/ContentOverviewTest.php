<?php

namespace Drupal\Tests\lightning_core\ExistingSite;

use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning_core
 * @group lightning
 */
class ContentOverviewTest extends ExistingSiteBase {

  public function test() {
    $account = $this->createUser();
    $account->addRole('page_reviewer');
    $account->save();

    $this->drupalLogin($account);
    $this->drupalGet('/admin/content');
    $this->assertSession()->statusCodeEquals(200);
  }

}

<?php

namespace Drupal\Tests\lightning_core\ExistingSite;

use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning_core
 * @group lightning
 * @group orca_public
 */
class ContentOverviewTest extends ExistingSiteBase {

  /**
   * {@inheritdoc}
   */
  protected function prepareRequest() {
    // The base implementation of this method will set a special cookie
    // identifying the Mink session as a test user agent. For this kind of test,
    // though, we don't need that.
  }

  public function test() {
    $account = $this->createUser();
    $account->addRole('page_reviewer');
    $account->save();

    $this->drupalLogin($account);
    $this->drupalGet('/admin/content');
    $this->assertSession()->statusCodeEquals(200);
  }

}

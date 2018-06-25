<?php

namespace Acquia\LightningExtension\Context;

use Drupal\DrupalExtension\Context\DrupalSubContextBase;

/**
 * Contains step definitions for working with views.
 *
 * @internal
 * This class is part of Lightning's internal testing code. It is not an API and
 * should not be extended. This class will be marked final, and all protected
 * members will be made private, in Lightning Core 3.x.
 */
class ViewsContext extends DrupalSubContextBase {

  use AwaitTrait;

  /**
   * Submits exposed Views filters.
   *
   * @When I apply the exposed filters
   */
  public function applyExposedFilters() {
    $this->assertSession()
      ->elementExists('css', '.views-exposed-form .form-actions input[type = "submit"]')
      ->press();

    $this->awaitAjax();
  }

}

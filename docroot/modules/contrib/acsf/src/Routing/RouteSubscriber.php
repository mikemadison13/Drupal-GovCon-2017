<?php

/**
 * @file
 * Contains \Drupal\acsf\Routing\RouteSubscriber.
 */

namespace Drupal\acsf\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    acsf_build_registry();
  }

  // The default parent:getSubscribedEvents should return the correct event and
  // weight for this implementation, so no need to override.

}

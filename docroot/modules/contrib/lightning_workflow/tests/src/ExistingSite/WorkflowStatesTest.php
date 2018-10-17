<?php

namespace Drupal\Tests\lightning_workflow\ExistingSite;

use Drupal\workflows\WorkflowInterface;
use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning
 * @group lightning_workflow
 */
class WorkflowStatesTest extends ExistingSiteBase {

  /**
   * Tests that workflow states look the way we expect them to.
   */
  public function test() {
    /** @var \Drupal\workflows\WorkflowInterface $workflow */
    $workflow = entity_load('workflow', 'editorial');
    $this->assertInstanceOf(WorkflowInterface::class, $workflow);

    $plugin = $workflow->getTypePlugin();

    $this->assertSame('Send to review', $plugin->getTransition('review')->label());
    $this->assertSame('Restore from archive', $plugin->getTransition('archived_published')->label());

    $this->assertFalse($plugin->hasTransition('archived_draft'));
    $this->assertArrayHasKey('archived', $plugin->getTransition('create_new_draft')->from());
    $this->assertSame('create_new_draft', $plugin->getTransitionFromStateToState('archived', 'draft')->id());
  }

}

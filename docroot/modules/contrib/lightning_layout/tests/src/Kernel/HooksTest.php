<?php

namespace Drupal\Tests\lightning_layout\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Tests Lightning Layout's hook implementations.
 *
 * @group lightning_layout
 */
class HooksTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'lightning_layout',
  ];

  /**
   * Tests lightning_layout_block_alter().
   */
  public function testBlockAlter() {
    $this->expectNotToPerformAssertions();

    $blocks = [
      'entity_block:node:uid' => [],
    ];
    lightning_layout_block_alter($blocks);
  }

}

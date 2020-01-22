<?php

namespace Drupal\Tests\lightning_layout\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\lightning_core\ConfigHelper as Config;
use Drupal\node\Entity\NodeType;
use Drupal\user\Entity\Role;

/**
 * Tests content type-related permission handling in Lightning Layout.
 *
 * @group lightning_layout
 */
class ContentTypePermissionsTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'lightning_layout',
    'node',
    'system',
    'user',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->installEntitySchema('user');

    /** @var \Drupal\user\RoleInterface $role */
    $role = Config::forModule('lightning_layout')
      ->optional()
      ->getEntity('user_role', 'layout_manager');

    $role->unsetThirdPartySetting('lightning', 'bundled')->save();
  }

  /**
   * Tests that the layout_manager role gets content type-based permissions.
   */
  public function test() {
    $node_type = NodeType::create([
      'type' => $this->randomMachineName(),
    ]);
    $node_type->save();

    $role_id = 'layout_manager';
    $permission = 'administer panelizer node ' . $node_type->id() . ' defaults';

    $this->assertContains($permission, Role::load($role_id)->getPermissions());

    $node_type->delete();
    $this->assertNotContains($permission, Role::load($role_id)->getPermissions());
  }

}

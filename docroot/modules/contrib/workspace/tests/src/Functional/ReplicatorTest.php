<?php

namespace Drupal\Tests\workspace\Functional;

use Drupal\simpletest\BlockCreationTrait;
use Drupal\simpletest\BrowserTestBase;
use Drupal\taxonomy\Entity\Vocabulary;
use Drupal\workspace\ReplicatorManager;

/**
 * Test the workspace entity.
 *
 * @group workspace
 */
class ReplicatorTest extends BrowserTestBase {

  use WorkspaceTestUtilities;

  use BlockCreationTrait {
    placeBlock as drupalPlaceBlock;
  }

  /**
   * {@inheritdoc}
   */
  public static $modules = ['system', 'node', 'user', 'block', 'workspace', 'multiversion', 'taxonomy', 'entity_reference', 'field', 'field_ui', 'menu_link_content', 'menu_ui'];

  /**
   * Verifies that a user can edit anything in a workspace with a specific perm.
   */
  public function testReplication() {
    $permissions = [
      'create_workspace',
      'edit_own_workspace',
      'view_own_workspace',
      'create test content',
      'access administration pages',
      'administer taxonomy',
      'administer menu',
      'access content overview',
      'administer content types',
      'administer node display',
      'administer node fields',
      'administer node form display',
    ];

    $live = $this->getOneEntityByLabel('workspace', 'Live');
    $this->createNodeType('Test', 'test');
    $vocabulary = Vocabulary::create(['name' => 'Tags', 'vid' => 'tags', 'hierarchy' => 0]);
    $vocabulary->save();

    $this->setupWorkspaceSwitcherBlock();

    $test_user = $this->drupalCreateUser($permissions);
    $this->drupalLogin($test_user);

    $this->drupalGet('/admin/structure/types/manage/test');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->fillField('edit-menu-options-main', 'main');
    $page->fillField('Default parent item', 'main:');
    $page->findButton(t('Save content type'))->click();

    $this->drupalGet('/admin/structure/types/manage/test/fields/add-field');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->fillField('Add a new field', 'field_ui:entity_reference:taxonomy_term');
    $page->fillField('Label', 'Tags');
    $page->fillField('edit-field-name', 'tags');
    $page->findButton(t('Save and continue'))->click();
    $page = $session->getPage();
    $page->fillField('edit-cardinality', -1);
    $page->findButton(t('Save field settings'))->click();
    $page = $session->getPage();
    $page->fillField('Tags', 'tags');
    $page->fillField('edit-settings-handler-settings-auto-create', 1);
    $page->findButton(t('Save settings'))->click();

    $this->drupalGet('/admin/structure/types/manage/test/fields');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->hasContent('Tags');

    $this->drupalGet('/admin/structure/types/manage/test/form-display');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->fillField('fields[field_tags][weight]', 1);
    $page->fillField('fields[field_tags][parent]', 'content');
    $page->fillField('fields[field_tags][type]', 'entity_reference_autocomplete_tags');
    $page->findButton(t('Save'))->click();

    $this->drupalGet('/node/add/test');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->fillField('Title', 'Test node');
    $page->fillField('Provide a menu link', 1);
    $page->fillField('Menu link title', 'Test node link');
    $page->fillField('Tags', 'tag1, tag2, tag3');
    $page->findButton(t('Save'))->click();
    $page = $session->getPage();
    $page->hasContent("Test node has been created");

    $test_node_live = $this->getOneEntityByLabel('node', 'Test node');
    $this->assertEquals($live->id(), $test_node_live->get('workspace')->entity->id());
    $this->assertEquals(3, count($test_node_live->get('field_tags')));
    foreach ($test_node_live->get('field_tags') as $item) {
      $this->assertTrue(in_array($item->target_id, [1, 2, 3]));
    }
    $this->drupalGet('/admin/content');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->hasContent($test_node_live->label());

    $menu_link_live = $this->getOneEntityByLabel('menu_link_content', 'Test node link');
    $this->assertEquals($live->id(), $menu_link_live->get('workspace')->entity->id());
    $this->drupalGet('/admin/structure/menu/manage/main');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->hasContent('Test node link');

    $tag1_live = $this->getOneEntityByLabel('taxonomy_term', 'tag1');
    $tag2_live = $this->getOneEntityByLabel('taxonomy_term', 'tag2');
    $tag3_live = $this->getOneEntityByLabel('taxonomy_term', 'tag3');
    $this->assertEquals($live->id(), $tag1_live->get('workspace')->entity->id());
    $this->assertEquals($live->id(), $tag2_live->get('workspace')->entity->id());
    $this->assertEquals($live->id(), $tag3_live->get('workspace')->entity->id());

    $this->drupalGet('/admin/structure/taxonomy/manage/tags/overview');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->hasContent('tag1');
    $page->hasContent('tag2');
    $page->hasContent('tag3');

    $target = $this->createWorkspaceThroughUI('Target', 'target');
    /** @var ReplicatorManager $rm */
    $rm = \Drupal::service('workspace.replicator_manager');
    $rm->replicate($this->getPointerToWorkspace($live), $this->getPointerToWorkspace($target));

    $this->switchToWorkspace($target);

    $test_node_target = $this->getOneEntityByLabel('node', 'Test node');
    $this->assertEquals($target->id(), $test_node_target->get('workspace')->entity->id());
    $this->assertEquals(3, count($test_node_target->get('field_tags')));
    foreach ($test_node_target->get('field_tags') as $item) {
      $this->assertTrue(in_array($item->target_id, [4, 5, 6]));
    }
    $this->drupalGet('/admin/content');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->hasContent($test_node_target->label());

    $menu_link_target = $this->getOneEntityByLabel('menu_link_content', 'Test node link');
    $this->assertEquals($target->id(), $menu_link_target->get('workspace')->entity->id());
    $this->drupalGet('/admin/structure/menu/manage/main');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->hasContent('Test node link');

    $tag1_target = $this->getOneEntityByLabel('taxonomy_term', 'tag1');
    $tag2_target = $this->getOneEntityByLabel('taxonomy_term', 'tag2');
    $tag3_target = $this->getOneEntityByLabel('taxonomy_term', 'tag3');
    $this->assertEquals($target->id(), $tag1_target->get('workspace')->entity->id());
    $this->assertEquals($target->id(), $tag2_target->get('workspace')->entity->id());
    $this->assertEquals($target->id(), $tag3_target->get('workspace')->entity->id());
    $this->drupalGet('/admin/structure/taxonomy/manage/tags/overview');
    $session = $this->getSession();
    $this->assertEquals(200, $session->getStatusCode());
    $page = $session->getPage();
    $page->hasContent('tag1');
    $page->hasContent('tag2');
    $page->hasContent('tag3');
  }
}

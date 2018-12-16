<?php

namespace Drupal\Tests\lightning_workflow\Functional;

use Drupal\Core\Entity\Entity\EntityViewDisplay;
use Drupal\Tests\BrowserTestBase;

/**
 * @group lightning
 * @group lightning_workflow
 */
class ModerationControlTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'lightning_workflow',
    'lightning_page',
    'lightning_roles',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $user = $this->createUser();
    $user->addRole('page_creator');
    $user->save();
    $this->drupalLogin($user);
  }

  /**
   * Tests that moderation control is hidden if Moderation Sidebar is enabled.
   */
  public function testHidden() {
    $this->container
      ->get('module_installer')
      ->install(['moderation_sidebar']);

    // Field is hidden in config.
    $display = EntityViewDisplay::load('node.page.default');
    $hidden = $display->get('hidden');
    $this->assertTrue($hidden['content_moderation_control']);

    // Form is not rendered.
    $this->drupalGet('node/add/page');
    $this->submitForm([
      'title[0][value]' => 'Foobar',
      'moderation_state[0][state]' => 'draft',
    ], 'Save');
    $this->assertSession()->elementNotExists('css', '#content-moderation-entity-moderation-form');
  }

  /**
   * Tests that moderation control is visible if Moderation Sidebar is disabled.
   */
  public function testVisible() {
    // Field is visible in config.
    $display = EntityViewDisplay::load('node.page.default');
    $components = $display->getComponents();
    $this->assertArrayHasKey('content_moderation_control', $components);

    // Form is rendered.
    $this->drupalGet('node/add/page');
    $this->submitForm([
      'title[0][value]' => 'Foobar',
      'moderation_state[0][state]' => 'draft',
    ], 'Save');
    $this->assertSession()->elementExists('css', '#content-moderation-entity-moderation-form');
  }

}

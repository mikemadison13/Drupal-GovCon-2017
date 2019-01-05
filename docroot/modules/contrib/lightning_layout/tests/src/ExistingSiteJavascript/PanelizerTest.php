<?php

namespace Drupal\Tests\lightning_layout\ExistingSiteJavascript;

use Drupal\Tests\lightning_layout\Traits\PanelsIPETrait;
use weitzman\DrupalTestTraits\ExistingSiteSelenium2DriverTestBase;

/**
 * @group lightning
 * @group lightning_layout
 */
class PanelizerTest extends ExistingSiteSelenium2DriverTestBase {

  use PanelsIPETrait;

  /**
   * Indicates if Views was installed during the test.
   *
   * @var bool
   */
  private $viewsInstalled;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    if (! $this->container->get('module_handler')->moduleExists('views')) {
      $this->viewsInstalled = $this->container->get('module_installer')
        ->install(['views']);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function tearDown() {
    if ($this->viewsInstalled) {
      $this->container->get('module_installer')->uninstall(['views']);
    }
    parent::tearDown();
  }

  /**
   * Tests that layouts can be edited in isolation.
   */
  public function testEditIsolation() {
    $account = $this->createUser([], NULL, TRUE);
    $this->drupalLogin($account);

    $alpha = $this->createNode(['type' => 'landing_page']);
    $beta = $this->createNode(['type' => 'landing_page']);

    $block_selector = '[data-block-plugin-id="views_block:who_s_online-who_s_online_block"]';

    $this->drupalGet($alpha->toUrl());
    $this->getBlockForm('views_block:who_s_online-who_s_online_block', 'Lists (Views)')
      ->pressButton('Add');
    $this->assertSession()->waitForElement('css', $block_selector);

    // Changes to Alpha's layout should not affect Beta.
    $this->drupalGet($beta->toUrl());
    $this->assertSession()->elementNotExists('css', $block_selector);
  }

  public function testResave() {
    $account = $this->createUser([
      'create landing_page content',
      'edit own landing_page content',
      'access panels in-place editing',
      'administer panelizer node landing_page content',
      // This permission is needed to access the whos_online view.
      'access user profiles',
    ]);
    $this->drupalLogin($account);

    $block_selector = '[data-block-plugin-id="views_block:who_s_online-who_s_online_block"]';

    $node = $this->createNode([
      'type' => 'landing_page',
      'uid' => $account->id(),
    ]);
    $this->drupalGet($node->toUrl());
    // Panels IPE is enabled...
    $this->assertSession()->elementExists('css', '#panels-ipe-content');
    // ...and standard fields are not present on the default layout.
    $this->assertSession()->elementNotExists('css', '.field--name-uid');
    $this->assertSession()->elementNotExists('css', '.field--name-created');

    // Place the "Who's online" block into the layout and save it as a custom
    // override.
    $this->getBlockForm('views_block:who_s_online-who_s_online_block', 'Lists (Views)')
      ->pressButton('Add');
    $this->assertNotEmpty($this->assertSession()->waitForElement('css', $block_selector));
    $this->getTray()->clickLink('Save');
    $this->assertSession()->assertWaitOnAjaxRequest();

    // Edit the node, verify that the layout is a custom override, and re-save.
    $this->drupalGet($node->toUrl('edit-form'));
    $this->assertTrue($this->assertSession()->selectExists('Full content')->hasAttribute('disabled'));
    $this->assertSession()->buttonExists('Save')->press();

    // The "Who's online" block should still be there.
    $this->assertSession()->elementExists('css', $block_selector);
  }

}

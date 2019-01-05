<?php

namespace Drupal\Tests\lightning_layout\ExistingSiteJavascript;

use Drupal\Tests\lightning_layout\Traits\PanelsIPETrait;
use weitzman\DrupalTestTraits\ExistingSiteSelenium2DriverTestBase;

/**
 * @group lightning
 * @group lightning_layout
 */
class QuickEditTest extends ExistingSiteSelenium2DriverTestBase {

  use PanelsIPETrait;

  /**
   * The block content type created during the test.
   *
   * @var \Drupal\block_content\BlockContentTypeInterface
   */
  protected $blockType;

  /**
   * The custom block created during the test.
   *
   * @var \Drupal\block_content\BlockContentInterface
   */
  protected $block;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    $account = $this->createUser([], NULL, TRUE);
    $this->drupalLogin($account);

    $this->blockType = entity_create('block_content_type', [
      'id' => $this->randomMachineName(),
      'label' => $this->randomString(),
    ]);
    $this->assertSame(SAVED_NEW, $this->blockType->save());
    $this->markEntityForCleanup($this->blockType);

    entity_create('field_config', [
      'field_name' => 'body',
      'entity_type' => 'block_content',
      'bundle' => $this->blockType->id(),
      'label' => 'Body',
    ])->save();

    entity_get_display('block_content', $this->blockType->id(), 'default')
      ->setComponent('body', [
        'type' => 'text_default',
      ])
      ->save();

    entity_get_form_display('block_content', $this->blockType->id(), 'default')
      ->setComponent('body', [
        'type' => 'text_textarea_with_summary',
      ])
      ->save();

    $this->block = entity_create('block_content', [
      'type' => $this->blockType->id(),
      'info' => $this->randomString(),
      'body' => $this->getRandomGenerator()->sentences(8),
    ]);
    $this->assertSame(SAVED_NEW, $this->block->save());
    $this->assertTrue($this->block->hasField('body'));
    $this->assertFalse($this->block->get('body')->isEmpty());
    $this->markEntityForCleanup($this->block);
  }

  /**
   * Tests that Quick Edit works with custom blocks created with Panels IPE.
   */
  public function test() {
    $assert = $this->assertSession();
    $session = $this->getSession();

    $page = $this->createNode([
      'type' => 'landing_page',
    ]);
    $this->visit($page->toUrl()->toString());

    $plugin_id = 'block_content:' . $this->block->uuid();
    $selector = '[data-block-plugin-id="' . $plugin_id . '"]';

    $this->getBlockForm($plugin_id, 'Custom')->pressButton('Add');
    $assert->assertWaitOnAjaxRequest();
    $this->getTray()->clickLink('Save');
    $assert->assertWaitOnAjaxRequest();

    // Assert that the block is targeted by Quick Edit.
    $assert->elementAttributeContains('css', $selector, 'data-quickedit-entity-id', 'block_content/' . $this->block->id());

    // Assert that the title and body are displayed, and that Quick Edit is
    // aware of at least one of the fields.
    $block = $assert->elementExists('css', $selector);
    $assert->elementTextContains('css', $selector, $this->block->label());
    $assert->elementTextContains('css', $selector, $this->block->body->value);
    $assert->elementExists('css', '[data-quickedit-field-id]', $block);

    $this->assertTrue(
      $session->wait(10000, 'Drupal.quickedit.collections.fields.length > 0')
    );
    $contextual_links = $assert->elementExists('css', 'ul.contextual-links', $block);
    $assert->elementExists('named', ['link', 'Quick edit'], $contextual_links);
  }

}

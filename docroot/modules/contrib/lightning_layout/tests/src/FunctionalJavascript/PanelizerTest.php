<?php

namespace Drupal\Tests\lightning_layout\FunctionalJavascript;

use Drupal\block_content\Entity\BlockContent;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\Tests\lightning_layout\Traits\PanelsIPETrait;

/**
 * @group lightning
 * @group lightning_layout
 */
class PanelizerTest extends WebDriverTestBase {

  use PanelsIPETrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'block_content_test',
    'lightning_landing_page',
    'lightning_roles',
  ];

  public function testPlaceBlockInNonDefaultDisplay() {
    $account = $this->drupalCreateUser();
    $account->addRole('landing_page_creator');
    $account->save();
    $this->drupalLogin($account);

    $page = $this->drupalCreateNode(['type' => 'landing_page']);

    $block = BlockContent::create([
      'type' => 'basic',
      'info' => $this->randomString(),
      'body' => $this->getRandomGenerator()->paragraphs(),
    ]);
    $this->assertSame(SAVED_NEW, $block->save());

    $this->drupalGet($page->toUrl('edit-form'));
    $this->assertSession()->selectExists('Full content')->selectOption('two_column');
    $this->assertSession()->buttonExists('Save')->press();

    $plugin_id = 'block_content:' . $block->uuid();

    $this->getBlockForm($plugin_id, 'Custom')->pressButton('Add');
    $this->assertSession()->assertWaitOnAjaxRequest();

    $this->assertSession()
      ->elementExists('named', ['link', 'Save'], $this->getTray())
      ->click();
    $this->assertSession()->assertWaitOnAjaxRequest();

    $this->drupalGet($page->toUrl('edit-form'));
    $this->assertSession()->buttonExists('Save')->press();
    $this->assertSession()->elementExists('css', "[data-block-plugin-id='$plugin_id']");
  }

}

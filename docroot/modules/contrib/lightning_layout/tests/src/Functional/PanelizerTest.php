<?php

namespace Drupal\Tests\lightning_layout\Functional;

use Behat\Mink\Element\NodeElement;
use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests basic integration with Panelizer.
 *
 * @group lightning_layout
 */
class PanelizerTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['lightning_landing_page'];

  /**
   * Tests that default layouts have expected blocks available.
   */
  public function testAvailableBlocks() {
    $assert_session = $this->assertSession();

    $account = $this->createUser(['administer panelizer']);
    $this->drupalLogin($account);

    $machine_name = 'node__landing_page__full__default';

    // Initialize the tempstore.
    $url = Url::fromRoute('panelizer.wizard.edit', [
      'machine_name' => $machine_name,
    ]);
    $this->drupalGet($url);
    $assert_session->statusCodeEquals(200);

    // View the list of available blocks.
    $url = Url::fromRoute('panels.select_block', [
      'tempstore_id' => 'panelizer.wizard',
      'machine_name' => $machine_name,
    ]);
    $this->drupalGet($url);
    $assert_session->statusCodeEquals(200);
    $assert_session->linkExists('Authored by');
  }

  /**
   * Tests creating a Panelizer layout in the wizard.
   */
  public function testCreateLayout() {
    $assert_session = $this->assertSession();
    $page = $this->getSession()->getPage();

    $account = $this->drupalCreateUser([
      'administer panelizer',
      'administer panelizer node landing_page defaults',
      'administer node display',
    ]);
    $this->drupalLogin($account);

    $this->drupalGet("/admin/structure/panelizer/add/node/landing_page/full");
    $page->pressButton('Next');
    $page->fillField('Wizard name', 'Foo');
    $page->fillField('Machine-readable name', 'foo');
    $page->pressButton('Next');
    $page->pressButton('Next');
    $page->pressButton('Next');

    // If the layout has a configuration form, skip that.
    $form_id = $assert_session->hiddenFieldExists('form_id')->getValue();
    if ($form_id === 'panels_layout_settings_form') {
      $page->pressButton('Next');
    }

    $page->fillField('Page title', '[node:title]');

    $page->clickLink('Add new block');
    $page->clickLink('Authored by');
    $page->selectFieldOption('region', 'content');
    $page->pressButton('Add block');
    $block = $this->getBlockRow('Authored by', 'content');
    $this->assertNotEmpty($block);
    $page->pressButton('Finish');
    $page->pressButton('Cancel');

    $assert_session->addressEquals("/admin/structure/types/manage/landing_page/display/full");
    $assert_session->pageTextContains('Foo');
  }

  /**
   * Returns the table row for a specific block in a specific region.
   *
   * @param string $block_label
   *   The label of the block to locate.
   * @param string $region
   *   The machine name of the region in which the block is expected to be.
   *
   * @return \Behat\Mink\Element\NodeElement|null
   *   The row element, or null if one was not found.
   */
  private function getBlockRow($block_label, $region) {
    $page = $this->getSession()->getPage();

    // array_map() callback. Traverses from a region select list to the table
    // row that contains it.
    $row_map = function (NodeElement $select) {
      // $select->containing DIV->table cell->table row.
      return $select->getParent()->getParent()->getParent();
    };

    $elements = array_filter(
      $page->findAll('css', 'table#blocks tr > td > div > select.block-region-select'),
      function (NodeElement $element) use ($region) {
        return $element->getValue() == $region;
      }
    );

    /** @var \Behat\Mink\Element\NodeElement $row */
    foreach (array_map($row_map, $elements) as $row) {
      // The first cell is the one with the label; find() will return the first
      // matched element, which should be the first cell.
      $row_label = $row->find('css', 'td')->getText();
      if (trim($row_label) == $block_label) {
        return $row;
      }
    }
  }

}

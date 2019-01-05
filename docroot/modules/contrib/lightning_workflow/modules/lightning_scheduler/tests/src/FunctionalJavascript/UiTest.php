<?php

namespace Drupal\Tests\lightning_scheduler\FunctionalJavascript;

use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

/**
 * @group lightning
 * @group lightning_workflow
 * @group lightning_scheduler
 */
class UiTest extends WebDriverTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'block',
    'lightning_page',
    'lightning_scheduler',
    'lightning_workflow',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->drupalPlaceBlock('local_tasks_block');

    // Functional tests normally run in the Sydney, Australia time zone in order
    // to catch time zone-related edge cases and bugs. However, the scheduler UI
    // is very sensitive to time zones, so it's best to set it, for the purposes
    // of this test, to the time zone configured in php.ini.
    $this->config('system.date')
      ->set('timezone.default', ini_get('date.timezone'))
      ->save();
  }

  public function testUiNotPresentWithoutModeration() {
    $account = $this->drupalCreateUser([], NULL, TRUE);
    $this->drupalLogin($account);

    $node_type = $this->createContentType()->id();
    $this->drupalGet('/node/add/' . $node_type);
    $this->assertSession()->fieldNotExists('moderation_state[0][state]');
    $this->assertSession()->linkNotExists('Schedule a status change');
  }

  public function testUi() {
    $account = $this->createUser([
      'create page content',
      'view own unpublished content',
      'edit own page content',
      'use editorial transition create_new_draft',
      'schedule editorial transition publish',
      'schedule editorial transition archive',
    ]);
    $this->drupalLogin($account);

    $this->drupalGet('/node/add/page');
    $this->assertSession()->fieldExists('Title')->setValue($this->randomString());

    $this->assertSession()->elementExists('named', ['link', 'Schedule a status change'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Published');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue('5-4-2038');
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue('6:00:00PM');
    $this->assertSession()->buttonExists('Save transition')->press();
    $this->assertSession()->pageTextContains("Change to Published on May 4, 2038 at 6:00 PM");

    $this->assertSession()->elementExists('named', ['link', 'add another'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Archived');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue('9-19-2038');
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue('8:57:00AM');
    $this->assertSession()->buttonExists('Save transition')->press();
    $this->assertSession()->pageTextContains("Change to Archived on September 19, 2038 at 8:57 AM");

    $this->assertSession()->buttonExists('Save')->press();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    $this->assertSession()->pageTextContains("Change to Published on May 4, 2038 at 6:00 PM");
    $this->assertSession()->pageTextContains("Change to Archived on September 19, 2038 at 8:57 AM");

    $this->assertSession()->elementExists('named', ['link', 'Remove transition to Archived on September 19, 2038 at 8:57 AM'])->click();
    $this->assertSession()->pageTextContains("Change to Published on May 4, 2038 at 6:00 PM");
    $this->assertSession()->pageTextNotContains("Change to Archived on September 19, 2038 at 8:57 AM");
    $this->assertSession()->linkExists('add another');
    $this->assertSession()->buttonExists('Save')->press();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    $this->assertSession()->pageTextContains("Change to Published on May 4, 2038 at 6:00 PM");
    $this->assertSession()->pageTextNotContains("Change to Archived on September 19, 2038 at 8:57 AM");

    $this->assertSession()->elementExists('named', ['link', 'add another'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Archived');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue('9-19-2038');
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue('8:57:00AM');
    $this->assertSession()->elementExists('named', ['link', 'Cancel transition']);
    $this->assertSession()->pageTextContains("Change to Published on May 4, 2038 at 6:00 PM");
    $this->assertSession()->pageTextNotContains("Change to Archived on September 19, 2038 at 8:57 AM");
    $this->assertSession()->buttonExists('Save')->press();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    $this->assertSession()->pageTextContains("Change to Published on May 4, 2038 at 6:00 PM");
    $this->assertSession()->pageTextNotContains("Change to Archived on September 19, 2038 at 8:57 AM");
    $this->assertSession()->elementExists('named', ['link', 'Remove transition to Published on May 4, 2038 at 6:00 PM'])->click();
    $this->assertSession()->pageTextNotContains("Change to Published on May 4, 2038 at 6:00 PM");
    $this->assertSession()->linkExists('Schedule a status change');
  }

}

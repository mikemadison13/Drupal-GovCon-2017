<?php

namespace Drupal\Tests\lightning_scheduler\FunctionalJavascript;

use Drupal\FunctionalJavascriptTests\WebDriverTestBase;
use Drupal\Tests\Traits\Core\CronRunTrait;

/**
 * @group lightning
 * @group lightning_workflow
 * @group lightning_scheduler
 */
class TransitionTest extends WebDriverTestBase {

  use CronRunTrait;

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
   * Today's date, to be entered into scheduled transition date fields.
   *
   * @var string
   */
  private $today;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->drupalPlaceBlock('local_tasks_block');

    $account = $this->createUser([
      'create page content',
      'view own unpublished content',
      'edit own page content',
      'use editorial transition create_new_draft',
      'use editorial transition review',
      'use editorial transition publish',
      'use editorial transition archive',
      'schedule editorial transition publish',
      'schedule editorial transition archive',
      'view latest version',
      'administer nodes',
    ]);
    $this->drupalLogin($account);

    // Functional tests normally run in the Sydney, Australia time zone in order
    // to catch time zone-related edge cases and bugs. However, the scheduler UI
    // is very sensitive to time zones, so it's best to set it, for the purposes
    // of this test, to the time zone configured in php.ini.
    $this->config('system.date')
      ->set('timezone.default', ini_get('date.timezone'))
      ->save();

    $this->today = date('mdY');
  }

  public function testPublishInPast() {
    $this->drupalGet('/node/add/page');
    $this->assertSession()->fieldExists('Title')->setValue($this->randomString());
    $this->assertSession()->elementExists('named', ['link', 'Schedule a status change'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Published');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue($this->today);
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue(date('H:i:s', time() - 10));
    $this->assertSession()->buttonExists('Save transition')->press();
    $this->assertSession()->buttonExists('Save')->press();
    $this->cronRun();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    $this->assertSession()->pageTextContains('Current state Published');
    $this->assertSession()->elementNotExists('css', '.scheduled-transition');
  }

  /**
   * @depends testPublishInPast
   */
  public function testSkipInvalidTransition() {
    $this->drupalGet('/node/add/page');
    $this->assertSession()->fieldExists('Title')->setValue($this->randomString());
    $this->assertSession()->elementExists('named', ['link', 'Schedule a status change'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Published');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue($this->today);
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue(date('H:i:s', time() - 20));
    $this->assertSession()->buttonExists('Save transition')->press();

    $this->assertSession()->elementExists('named', ['link', 'add another'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Archived');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue($this->today);
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue(date('H:i:s', time() - 10));
    $this->assertSession()->buttonExists('Save transition')->press();

    $this->assertSession()->buttonExists('Save')->press();
    $this->cronRun();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    // It will still be in the draft state because the transition should resolve
    // to Draft -> Archived, which doesn't exist.
    $this->assertSession()->pageTextContains('Current state Draft');
    $this->assertSession()->elementNotExists('css', '.scheduled-transition');
  }

  public function testClearCompletedTransitions() {
    $this->drupalGet('/node/add/page');
    $this->assertSession()->fieldExists('Title')->setValue($this->randomString());
    $this->assertSession()->selectExists('moderation_state[0][state]')->selectOption('In review');
    $this->assertSession()->buttonExists('Save')->press();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();

    $this->assertSession()->elementExists('named', ['link', 'Schedule a status change'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Published');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue($this->today);
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue(date('H:i:s', time() + 8));
    $this->assertSession()->buttonExists('Save transition')->press();
    $this->assertSession()->buttonExists('Save')->press();
    sleep(10);
    $this->cronRun();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    $this->assertSession()->selectExists('moderation_state[0][state]')->selectOption('Archived');
    $this->assertSession()->buttonExists('Save')->press();
    $this->cronRun();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    $this->assertSession()->pageTextContains('Current state Archived');
  }

  public function testPublishPendingRevision() {
    $this->container->get('module_installer')->install(['views']);

    $this->drupalGet('/node/add/page');
    $this->assertSession()->fieldExists('Title')->setValue($this->randomString());
    $this->assertSession()->selectExists('moderation_state[0][state]')->selectOption('Published');
    $this->assertSession()->elementExists('named', ['link', 'Promotion options'])->click();
    $this->assertSession()->fieldExists('Promoted to front page')->check();
    $this->assertSession()->buttonExists('Save')->press();
    $this->assertSession()->elementExists('css', 'a[rel="edit-form"]')->click();
    $this->assertSession()->fieldExists('Title')->setValue('MC Hammer');
    $this->assertSession()->selectExists('moderation_state[0][state]')->selectOption('Draft');
    $this->assertSession()->elementExists('named', ['link', 'Schedule a status change'])->click();
    $this->assertSession()->fieldExists('Scheduled moderation state')->selectOption('Published');
    $this->assertSession()->fieldExists('Scheduled transition date')->setValue($this->today);
    $this->assertSession()->fieldExists('Scheduled transition time')->setValue(date('H:i:s', time() + 8));
    $this->assertSession()->buttonExists('Save transition')->press();
    $this->assertSession()->buttonExists('Save')->press();
    sleep(10);
    $this->cronRun();
    $this->drupalGet('/node');
    $this->assertSession()->linkExists('MC Hammer');
  }

}

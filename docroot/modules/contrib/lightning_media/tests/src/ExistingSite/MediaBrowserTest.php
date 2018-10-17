<?php

namespace Drupal\Tests\lightning_media\ExistingSite;

use Drupal\Core\Session\AccountInterface;
use Drupal\Tests\WebAssert;
use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning
 * @group lightning_media
 */
class MediaBrowserTest extends ExistingSiteBase {

  /**
   * The session assertion helper.
   *
   * @var WebAssert
   */
  private $assert;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    $this->assert = new WebAssert($this->getSession());
  }

  /**
   * Logs in a user.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The account to log in.
   */
  private function logIn(AccountInterface $account) {
    $this->assertNotEmpty($account->passRaw);
    $this->visit('/user/login');

    $this->assert->fieldExists('name')->setValue($account->getAccountName());
    $this->assert->fieldExists('pass')->setValue($account->passRaw);
    $this->assert->buttonExists('Log in')->press();
  }

  /**
   * Tests validation in the upload widget of the media browser.
   */
  public function testUploadValidation() {
    $account = $this->createUser();
    $account->addRole('media_creator');
    $account->save();
    $this->logIn($account);

    $this->visit('/entity-browser/iframe/media_browser');
    $this->assert->statusCodeEquals(200);

    // The widget should require a file.
    $this->assert->buttonExists('Upload')->press();
    $this->assert->buttonExists('Place')->press();
    $this->assert->pageTextContains('You must upload a file.');

    // The widget should reject files with unsupported extensions.
    $this->assert->fieldExists('File')->attachFile(__DIR__ . '/../../files/test.php');
    $wrapper = $this->assert->elementExists('css', '.js-form-managed-file');
    $this->assert->elementExists('named', ['button', 'Upload'], $wrapper)->press();
    $this->assert->pageTextContains('Only files with the following extensions are allowed:');
  }

  /**
   * Tests validation in the embed code widget of the media browser.
   */
  public function testEmbedCodeValidation() {
    $account = $this->createUser(['access media_browser entity browser pages']);
    $this->logIn($account);

    $this->visit('/entity-browser/iframe/media_browser');
    $this->assert->statusCodeEquals(200);
    $this->assert->buttonExists('Create embed')->press();

    // The widget should require an embed code.
    $this->assert->buttonExists('Place')->press();
    $this->assert->pageTextContains('You must enter a URL or embed code.');

    // The widget should also raise an error if the input cannot match any media
    // type.
    $this->assert->fieldExists('input')->setValue('The quick brown fox gets eaten by hungry lions.');
    $this->assert->buttonExists('Update')->press();
    $this->assert->buttonExists('Place')->press();
    $this->assert->pageTextContains('Could not match any bundles to input:');

    // The widget should not react if the input is valid, but the user does not
    // have permission to create media of the matched type.
    $this->assert->fieldExists('input')->setValue('https://twitter.com/webchick/status/824051274353999872');
    $this->assert->buttonExists('Update')->press();
    $entity = trim($this->assert->elementExists('css', '#entity')->getText());
    $this->assertEmpty($entity);
  }

}

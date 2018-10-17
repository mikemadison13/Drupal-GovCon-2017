<?php

namespace Drupal\Tests\lightning_workflow\ExistingSite;

use Drupal\Tests\node\Traits\ContentTypeCreationTrait;
use Drupal\Tests\WebAssert;
use weitzman\DrupalTestTraits\ExistingSiteBase;

/**
 * @group lightning
 * @group lightning_workflow
 */
class ContentTypeModerationTest extends ExistingSiteBase {

  use ContentTypeCreationTrait;

  /**
   * The content type created during the test.
   *
   * @var \Drupal\node\NodeTypeInterface
   */
  private $nodeType;

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
    $this->nodeType = $this->createContentType();
  }

  /**
   * {@inheritdoc}
   */
  public function tearDown() {
    parent::tearDown();
    $this->nodeType->delete();
  }

  public function testEnableModerationForContentType() {
    $user = $this->createUser([
      'administer nodes',
      'create ' . $this->nodeType->id() . ' content',
    ]);
    $this->assertNotEmpty($user->passRaw);

    $assert = new WebAssert($this->getSession());

    $this->visit('/user/login');
    $assert->statusCodeEquals(200);
    $assert->fieldExists('Name')->setValue($user->getAccountName());
    $assert->fieldExists('Password')->setValue($user->passRaw);
    $assert->buttonExists('Log in')->press();

    $this->visit('/node/add/' . $this->nodeType->id());
    $assert->buttonExists('Save');
    $assert->checkboxChecked('Published');
    $assert->buttonNotExists('Save and publish');
    $assert->buttonNotExists('Save as unpublished');

    $this->nodeType->setThirdPartySetting('lightning_workflow', 'workflow', 'editorial');

    $this->container
      ->get('module_handler')
      ->invoke('lightning_workflow', 'node_type_insert', [ $this->nodeType ]);

    $this->getSession()->reload();
    $assert->buttonExists('Save');
    $assert->fieldNotExists('status[value]');
    $assert->buttonNotExists('Save and publish');
    $assert->buttonNotExists('Save as unpublished');
  }

}

<?php

namespace Drupal\Tests\lightning_media\Functional;

use Drupal\embed\Entity\EmbedButton;
use Drupal\entity_browser\Entity\EntityBrowser;
use Drupal\FunctionalTests\Update\UpdatePathTestBase;
use Drupal\lightning_media\Update\Update360;
use Drupal\user\Entity\Role;
use Prophecy\Argument;
use Symfony\Component\Console\Style\StyleInterface;

/**
 * Tests the optional configuration updates targeting Lightning Media 3.6.0.
 *
 * @group lightning_media
 *
 * @covers \Drupal\lightning_media\Update\Update360
 */
class Update360Test extends UpdatePathTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setDatabaseDumpFiles() {
    $this->databaseDumpFiles = [
      __DIR__ . '/../../fixtures/Update360Test.php.gz',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Create a content type so we can test that content roles are correctly
    // updated.
    $this->drupalCreateContentType(['type' => 'test']);

    // Install Lightning Roles so we can ensure that content authoring
    // permissions are updated too.
    \Drupal::service('module_installer')->install(['lightning_roles']);
  }

  /**
   * Tests creating a CKEditor-specific media browser from the iFrame one.
   */
  public function test() {
    $io = $this->prophesize(StyleInterface::class);

    $io->confirm(Argument::type('string'))
      ->shouldBeCalledOnce()
      ->willReturn(TRUE);

    $io->ask(Argument::type('string'), Argument::any())
      ->shouldBeCalledTimes(2)
      ->willReturnArgument(1);

    // For reasons unclear, using $this->container to get the class resolver
    // will only work if $this->resetAll() is called when installing Lightning
    // Roles in setUp(). So, basically, a functional test can either use
    // $this->container or \Drupal, but not both.
    \Drupal::classResolver(Update360::class)
      ->cloneMediaBrowser($io->reveal());

    /** @var \Drupal\entity_browser\EntityBrowserInterface $browser */
    $browser = EntityBrowser::load('ckeditor_media_browser');
    $this->assertInstanceOf(EntityBrowser::class, $browser);
    $this->assertSame('Media browser (CKEditor)', $browser->label());
    $this->assertSame('iframe', $browser->getDisplay()->getPluginId());

    $settings = EmbedButton::load('media_browser')->getTypeSettings();
    $this->assertSame('ckeditor_media_browser', $settings['entity_browser']);

    /** @var \Drupal\entity_browser\DisplayInterface $browser_display */
    $browser_display = EntityBrowser::load('media_browser')->getDisplay();
    $this->assertSame('modal', $browser_display->getPluginId());
    $settings = $browser_display->getConfiguration();
    $this->assertEmpty($settings['width']);
    $this->assertEmpty($settings['height']);
    $this->assertSame('Add media', $settings['link_text']);
    $this->assertFalse($settings['auto_open']);

    $this->assertPermissions('media_creator');
    $this->assertPermissions('media_manager');
    $this->assertPermissions('test_creator');
  }

  /**
   * Asserts that a role has the expected entity browser permissions.
   *
   * @param string $role_id
   *   The ID of the role to check.
   */
  private function assertPermissions($role_id) {
    $role = Role::load($role_id);
    $this->assertInstanceOf(Role::class, $role);
    $this->assertTrue(Role::load($role_id)->hasPermission('access ckeditor_media_browser entity browser pages'));
  }

}

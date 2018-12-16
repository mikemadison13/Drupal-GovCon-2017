<?php

namespace Drupal\lightning_media\Update;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Extension\ModuleInstallerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @Update("3.1.0")
 */
final class Update310 implements ContainerInjectionInterface {

  /**
   * The media type storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  private $mediaTypeStorage;

  /**
   * The entity view display storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  private $entityViewDisplayStorage;

  /**
   * The module installer.
   *
   * @var \Drupal\Core\Extension\ModuleInstallerInterface
   */
  protected $moduleInstaller;

  /**
   * Update310 constructor.
   *
   * @param \Drupal\Core\Entity\EntityStorageInterface $media_type_storage
   *   The media type storage.
   * @param \Drupal\Core\Entity\EntityStorageInterface $entity_view_display_storage
   *   The entity view display storage.
   * @param \Drupal\Core\Extension\ModuleInstallerInterface $module_installer
   *   The module installer service.
   */
  public function __construct(EntityStorageInterface $media_type_storage, EntityStorageInterface $entity_view_display_storage, ModuleInstallerInterface $module_installer) {
    $this->mediaTypeStorage = $media_type_storage;
    $this->entityViewDisplayStorage = $entity_view_display_storage;
    $this->moduleInstaller = $module_installer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')->getStorage('media_type'),
      $container->get('entity_type.manager')->getStorage('entity_view_display'),
      $container->get('module_installer')
    );
  }

  /**
   * Enables the Media library module and adds the Media library view mode to
   * all media types.
   *
   * @update
   *
   * @ask Do you want to install the Media library module?
   */
  public function enableMediaLibrary() {
    $this->moduleInstaller->install(['media_library']);
    $media_types = $this->mediaTypeStorage->loadMultiple();

    foreach ($media_types as $media_type) {
      $bundle = $media_type->id();

      if ($this->entityViewDisplayStorage->load("media.$bundle.media_library")) {
        continue;
      }

      // If the Media library view mode doesn't already exist create one
      // containing only the thumbnail field.
      /** @var \Drupal\Core\Entity\Display\EntityViewDisplayInterface $display */
      $display = $this->entityViewDisplayStorage->create([
        'targetEntityType' => 'media',
        'bundle' => $bundle,
        'mode' => 'media_library',
        'status' => TRUE,
      ]);
      $display->set('content', []);
      $display->setComponent('thumbnail', [
        'type' => 'image',
        'region' => 'content',
        'label' => 'hidden',
        'settings' => [
          'image_style' => 'thumbnail',
        ],
      ]);
      $this->entityViewDisplayStorage->save($display);
    }
  }

  /**
   * Enables the Media Slideshow sub-component.
   *
   * @update
   *
   * @ask Do you want to add support for creating slideshows and carousels
   * of media assets?
   */
  public function enableMediaSlideshow() {
    $this->moduleInstaller->install(['lightning_media_slideshow']);
  }

}

<?php

namespace Drupal\multiversion;

use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\file\FileStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

interface MultiversionMigrationInterface {

  /**
   * Factory method.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @param \Drupal\Core\Entity\EntityManagerInterface $entity_manager
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public static function create(ContainerInterface $container, EntityManagerInterface $entity_manager);

  /**
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public function installDependencies();

  /**
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public function migrateContentToTemp(EntityTypeInterface $entity_type);

  /**
   * @param \Drupal\file\FileStorageInterface $storage
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public function copyFilesToMigrateDirectory(FileStorageInterface $storage);

  /**
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   * @param \Drupal\Core\Entity\EntityStorageInterface $storage
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public function emptyOldStorage(EntityTypeInterface $entity_type, EntityStorageInterface $storage);

  /**
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public function applyNewStorage();

  /**
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public function migrateContentFromTemp(EntityTypeInterface $entity_type);

  /**
   * @return \Drupal\multiversion\MultiversionMigrationInterface
   */
  public function uninstallDependencies();

  /**
   * Removes the map and message tables for a migration.
   *
   * @param int $id
   *   The migration ID.
   */
  public function cleanupMigration($id);

}

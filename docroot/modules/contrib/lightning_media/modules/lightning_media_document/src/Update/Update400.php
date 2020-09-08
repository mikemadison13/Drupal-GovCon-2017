<?php

namespace Drupal\lightning_media_document\Update;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Contains configuration updates targeting Lightning Media Document 4.0.0.
 *
 * @Update("4.0.0")
 */
final class Update400 implements ContainerInjectionInterface {

  use StringTranslationTrait;

  /**
   * The field config entity storage handler.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  private $fieldStorage;

  /**
   * The media type entity storage handler.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  private $mediaTypeStorage;

  /**
   * Update400 constructor.
   *
   * @param \Drupal\Core\Entity\EntityStorageInterface $field_storage
   *   The field config entity storage handler.
   * @param \Drupal\Core\Entity\EntityStorageInterface $media_type_storage
   *   The media type entity storage handler.
   */
  public function __construct(EntityStorageInterface $field_storage, EntityStorageInterface $media_type_storage) {
    $this->fieldStorage = $field_storage;
    $this->mediaTypeStorage = $media_type_storage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $entity_type_manager = $container->get('entity_type.manager');

    return new static(
      $entity_type_manager->getStorage('field_config'),
      $entity_type_manager->getStorage('media_type')
    );
  }

  /**
   * Makes the Document media type's source field required.
   *
   * @param \Symfony\Component\Console\Style\StyleInterface $io
   *   The I/O style.
   *
   * @update
   */
  public function requireDocumentMediaSourceField(StyleInterface $io) {
    /** @var \Drupal\Core\Field\FieldConfigInterface $field */
    $field = $this->fieldStorage->load('media.document.field_document');

    if ($field && $field->isRequired() == FALSE) {
      $question = (string) $this->t('Do you want to make the @field field required on the @media_type media type?', [
        '@field' => $field->getLabel(),
        '@media_type' => $this->mediaTypeStorage->load('document')->label(),
      ]);
      if ($io->confirm($question)) {
        $field->setRequired(TRUE);
        $this->fieldStorage->save($field);
      }
    }
  }

}

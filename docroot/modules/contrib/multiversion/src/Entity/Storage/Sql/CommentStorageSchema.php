<?php

namespace Drupal\multiversion\Entity\Storage\Sql;

use Drupal\Core\Entity\ContentEntityTypeInterface;
use Drupal\entity_storage_migrate\Entity\Storage\ContentEntityStorageSchemaTrait;
use Drupal\comment\CommentStorageSchema as CoreCommentStorageSchema;

/**
 * Storage schema handler for comments.
 */
class CommentStorageSchema extends CoreCommentStorageSchema {

  use ContentEntityStorageSchemaTrait;

  /**
   * {@inheritdoc}
   */
  protected function getEntitySchema(ContentEntityTypeInterface $entity_type, $reset = FALSE) {
    $schema = parent::getEntitySchema($entity_type, $reset);

    // @todo: Optimize indexes with the workspace field.
    return $schema;
  }

}

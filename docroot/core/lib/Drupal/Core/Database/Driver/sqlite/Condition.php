<?php

namespace Drupal\Core\Database\Driver\sqlite;

use Drupal\Core\Database\Connection;
use Drupal\Core\Database\Query\PlaceholderInterface;
use Drupal\Core\Database\Query\Condition as QueryCondition;

/**
 * SQLite implementation of \Drupal\Core\Database\Query\Condition.
 */
class Condition extends QueryCondition {

  /**
   * {@inheritdoc}
   */
  protected function compileValueList(array $values, Connection $connection, PlaceholderInterface $queryPlaceholder) {
    // SQLite has a default limit of 999 placeholders. Therefore, pass large
    // value lists as a single json-encoded placeholder. Because a query might
    // contain multiple conditions, treat any individual condition's value list
    // as large when it's over 50.
    if (count($values) > 50) {
      $value_fragment = [];
      $arguments = [];
      $json_value = json_encode($values, 0, 1);
      $placeholder = ':db_condition_placeholder_' . $queryPlaceholder->nextPlaceholder();
      // The single json_encoded placeholder is added as a subquery.
      $value_fragment[] = "select value from json_each($placeholder)";
      $arguments[$placeholder] = $json_value;
      return [$value_fragment, $arguments];
    }
    else {
      return parent::compileValueList($values, $connection, $queryPlaceholder);
    }
  }

}

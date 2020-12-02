<?php

namespace Drupal\Core\Database\Driver\sqlite;

use Drupal\Core\Database\Query\Upsert as QueryUpsert;

/**
 * SQLite implementation of \Drupal\Core\Database\Query\Upsert.
 */
class Upsert extends QueryUpsert {

  /**
   * Create the upsert query with a single placeholder.
   *
   * @var bool
   */
  protected $useSinglePlaceholder = FALSE;

  /**
   * {@inheritdoc}
   */
  public function __toString() {
    // Create a sanitized comment string to prepend to the query.
    $comments = $this->connection->makeComment($this->comments);

    // Default fields are always placed first for consistency.
    $unescaped_insert_fields = array_merge($this->defaultFields, $this->insertFields);
    $insert_fields = array_map(function ($field) {
      return $this->connection->escapeField($field);
    }, $unescaped_insert_fields);

    if ($this->useSinglePlaceholder) {
      // Each row with upsert values is stored in a json_encoded row. Each
      // variable in a row is keyed to their unescaped insert field name. We use
      // the json_extract method in the query to get the value from the
      // json_encoded row.
      $json_select_query = 'select ';
      $json_extract_fields = [];
      foreach ($unescaped_insert_fields as $unescaped_insert_field) {
        $json_extract_fields[] = 'json_extract(value, "$.' . $unescaped_insert_field . '") as ' . $this->connection->escapeField($unescaped_insert_field);
      }
      $json_select_query .= implode(', ', $json_extract_fields);

      // We use only a single placeholder for this query.
      $json_select_query .= ' from json_each(:db_insert_placeholder_0)';

      $query = $comments . 'INSERT OR REPLACE INTO {' . $this->table . '} (' . implode(', ', $insert_fields) . ') ' . $json_select_query;
    }
    else {
      $query = $comments . 'INSERT OR REPLACE INTO {' . $this->table . '} (' . implode(', ', $insert_fields) . ') VALUES ';

      $values = $this->getInsertPlaceholderFragment($this->insertValues, $this->defaultFields);
      $query .= implode(', ', $values);
    }

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function execute() {
    // SQLite has a default limit of 999 placeholders. Assuming fewer than 20
    // fields per row, if fewer than 50 rows are being upserted, then the
    // default query stays under this limit.
    if (count($this->insertValues) < 50) {
      return parent::execute();
    }

    // Otherwise, pack all of the values into a single json-encoded structure.
    if (!$this->preExecute()) {
      return NULL;
    }

    // Default fields are always placed first for consistency.
    $unescaped_insert_fields = array_merge($this->defaultFields, $this->insertFields);

    $value = [];
    foreach ($this->insertValues as $insert_values) {
      // The upsert values are keyed by their unescaped insert field name. We
      // need to do this for later retrieval with the json_extract function.
      $value[] = array_combine($unescaped_insert_fields, $insert_values);
    }

    // We use only a single placeholder for this query. All the upsert values
    // are stored in a json encoded array.
    $values = [':db_insert_placeholder_0' => json_encode($value)];
    $this->useSinglePlaceholder = TRUE;

    $last_insert_id = $this->connection->query((string) $this, $values, $this->queryOptions);

    // Re-initialize the values array so that we can re-use this query.
    $this->insertValues = [];
    $this->useSinglePlaceholder = FALSE;

    return $last_insert_id;
  }

}

<?php

namespace Drupal\KernelTests\Core\Database;

use Drupal\Core\Database\Connection;
use Drupal\Core\Database\Database;

/**
 * Tests the Upsert query builder.
 *
 * @group Database
 */
class UpsertTest extends DatabaseTestBase {

  /**
   * Confirms that we can upsert (update-or-insert) records successfully.
   */
  public function testUpsert() {
    $connection = Database::getConnection();
    $num_records_before = $connection->query('SELECT COUNT(*) FROM {test_people}')->fetchField();

    $upsert = $connection->upsert('test_people')
      ->key('job')
      ->fields(['job', 'age', 'name']);

    // Add a new row.
    $upsert->values([
      'job' => 'Presenter',
      'age' => 31,
      'name' => 'Tiffany',
    ]);

    // Update an existing row.
    $upsert->values([
      'job' => 'Speaker',
      // The initial age was 30.
      'age' => 32,
      'name' => 'Meredith',
    ]);

    $upsert->execute();

    $num_records_after = $connection->query('SELECT COUNT(*) FROM {test_people}')->fetchField();
    $this->assertEqual($num_records_before + 1, $num_records_after, 'Rows were inserted and updated properly.');

    $person = $connection->query('SELECT * FROM {test_people} WHERE [job] = :job', [':job' => 'Presenter'])->fetch();
    $this->assertEqual('Presenter', $person->job, 'Job set correctly.');
    $this->assertEqual(31, $person->age, 'Age set correctly.');
    $this->assertEqual('Tiffany', $person->name, 'Name set correctly.');

    $person = $connection->query('SELECT * FROM {test_people} WHERE [job] = :job', [':job' => 'Speaker'])->fetch();
    $this->assertEqual('Speaker', $person->job, 'Job was not changed.');
    $this->assertEqual(32, $person->age, 'Age updated correctly.');
    $this->assertEqual('Meredith', $person->name, 'Name was not changed.');
  }

  /**
   * Confirms that we can upsert records with keywords successfully.
   */
  public function testUpsertWithKeywords() {
    $num_records_before = $this->connection->query('SELECT COUNT(*) FROM {select}')->fetchField();

    $upsert = $this->connection->upsert('select')
      ->key('id')
      ->fields(['id', 'update']);

    // Add a new row.
    $upsert->values([
      'id' => 2,
      'update' => 'Update value 2',
    ]);

    // Update an existing row.
    $upsert->values([
      'id' => 1,
      'update' => 'Update value 1 updated',
    ]);

    $upsert->execute();

    $num_records_after = $this->connection->query('SELECT COUNT(*) FROM {select}')->fetchField();
    $this->assertEquals($num_records_before + 1, $num_records_after, 'Rows were inserted and updated properly.');

    $record = $this->connection->query('SELECT * FROM {select} WHERE [id] = :id', [':id' => 1])->fetch();
    $this->assertEquals('Update value 1 updated', $record->update);

    $record = $this->connection->query('SELECT * FROM {select} WHERE [id] = :id', [':id' => 2])->fetch();
    $this->assertEquals('Update value 2', $record->update);
  }

  /**
   * Confirms that we can upsert 1000 records successfully.
   *
   * This test is motivated by SQLite's default limit of 999 placeholders, but
   * it's good to ensure that all database drivers can handle large upserts.
   *
   * @link https://www.sqlite.org/limits.html#max_variable_number
   */
  public function testLargeUpsert() {
    $num_records_before = $this->connection->query('SELECT COUNT(*) FROM {test_people}')->fetchField();

    $upsert = $this->connection->upsert('test_people')
      ->key('job')
      ->fields(['job', 'age', 'name']);

    for ($i = 0; $i < 1000; $i++) {
      $values = [
        'job' => "Job $i",
        'age' => $i,
        'name' => "Name $i",
      ];
      $upsert->values($values);
    }

    $upsert_cloned = clone $upsert;

    $upsert->execute();

    $num_records_after = $this->connection->query('SELECT COUNT(*) FROM {test_people}')->fetchField();
    $this->assertEqual($num_records_before + 1000, $num_records_after, 'Rows were inserted properly.');

    $person = $this->connection->query('SELECT * FROM {test_people} WHERE job = :job', [':job' => 'Job 0'])->fetch();
    $this->assertEqual($person->job, 'Job 0', 'First job set correctly.');
    $this->assertEqual($person->age, 0, 'First age set correctly.');
    $this->assertEqual($person->name, 'Name 0', 'First name set correctly.');

    $person = $this->connection->query('SELECT * FROM {test_people} WHERE job = :job', [':job' => 'Job 999'])->fetch();
    $this->assertEqual($person->job, 'Job 999', 'Last job set correctly.');
    $this->assertEqual($person->age, 999, 'Last age set correctly.');
    $this->assertEqual($person->name, 'Name 999', 'Last name set correctly.');

    // The problem with testing that we want to use more variables then the
    // maximum limit that SQLite allows. The problem is that we do not know what
    // that maximum is. SQLite can be compiled with a setting that is much
    // higher then the default value of 999. What we can test is that when we
    // use a large number of variables in a query, that SQLite places them in a
    // single placeholder.
    if ($this->connection->databaseType() == 'sqlite') {
      $connection_mock = $this->getMockBuilder(Connection::class)
        ->disableOriginalConstructor()
        ->setMethods(['query', 'identifierQuote'])
        ->getMockForAbstractClass();

      // Mock the method query, so that is return the query string instead of
      // execution the query.
      $connection_mock->expects($this->once())
        ->method('query')
        ->willReturnArgument(0);

      // Mock the method identifierQuote, so that no deprecation is triggered.
      $connection_mock->expects($this->any())
        ->method('identifierQuote')
        ->willReturn('"');

      $property_ref = new \ReflectionProperty($upsert_cloned, 'connection');
      $property_ref->setAccessible(TRUE);
      $property_ref->setValue($upsert_cloned, $connection_mock);

      $this->assertEqual(substr_count($upsert_cloned->execute(), ':db_insert_placeholder'), 1, 'There should only be one placeholder used in the query for SQLite.');
    }
  }

}

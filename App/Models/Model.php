<?php

namespace App\Models;

use PDO;
use App\Settings\Connection\Database;
use PDOException;

class Model
{
  private PDO $pdo;
  private string $table;

  public function __construct(string $table)
  {
    $this->table = $table;
    $this->pdo = Database::getConnection();
  }

  private function hadleException(string $message, mixed $erroCode)
  {
    // TODO: In Development
    var_dump($message);
  }

  public function all(int $limit = 0): ?array
  {
    $query = "SELECT * FROM $this->table";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function find(string $column, mixed $value, int $limit = 0): ?array
  {
    $query = "SELECT * FROM $this->table WHERE $column = :$column";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$column", $value);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findOne(string $column, mixed $value)
  {
    $query = "SELECT * FROM $this->table WHERE $column = :$column LIMIT 1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$column", $value);
      $stmt->execute();

      return $stmt->fetchObject(get_called_class());
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findSpecificFields(array $fields, int $limit = 0): ?array
  {
    $query = "SELECT ";

    foreach ($fields as $column) {
      $query .= $column . ', ';
    }
    $query = substr($query, 0, -2);
    $query .= " FROM $this->table";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findSpecificFieldsAndCondition(array $fields, string $specificColumn, mixed $specificValue, int $limit = 0): ?array
  {
    $query = "SELECT ";

    foreach ($fields as $column) {
      $query .= $column . ', ';
    }
    $query = substr($query, 0, -2);
    $query .= " FROM $this->table";

    $query .= " WHERE $specificColumn = :$specificColumn";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$specificColumn", $specificValue);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findLast()
  {
    $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      return $stmt->fetchObject(get_called_class());
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function store()
  {
    $data = (array) $this;

    foreach ($data as $key => $value) {
      if (strpos($key, 'App\Models') !== false || $key === 'id') {
        unset($data[$key]);
      }
    }

    $columns = array_keys($data);

    $query = "INSERT INTO $this->table (";
    foreach ($columns as $column) {
      $query .= "$column, ";
    }
    $query = substr($query, 0, -2);
    $query .= ') VALUES (';

    foreach ($columns as $column) {
      $query .= ":$column, ";
    }
    $query = substr($query, 0, -2);
    $query .= ')';

    try {
      $stmt = $this->pdo->prepare($query);
      foreach ($data as $column => $value) {
        $stmt->bindValue(":$column", $value);
      }

      $stmt->execute();

      return $this->pdo->lastInsertId();
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function insertMany(array $items)
  {
    foreach ($items as $item) {
      $item->store();
    }
  }

  public function update(): ?bool
  {
    $data = (array) $this;

    foreach ($data as $key => $value) {
      if (strpos($key, 'App\Models') !== false) {
        unset($data[$key]);
      }
    }

    $columns = array_keys($data);

    $query = "UPDATE $this->table SET ";
    foreach ($columns as $column) {
      if ($column !== 'id') {
        $query .= "$column = :$column, ";
      }
    }
    $query = substr($query, 0, -2);
    $query .= " WHERE id = :id";

    try {
      $stmt = $this->pdo->prepare($query);
      foreach ($data as $column => $value) {
        if ($column !== 'id') {
          $stmt->bindValue(":$column", $value);
        }
      }
      $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);

      return $stmt->execute();
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function delete(): ?bool
  {
    $data = (array) $this;

    try {
      $id = $data['id'];

      $query = "DELETE FROM $this->table WHERE id = :id";

      $stmt = $this->pdo->prepare($query);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      return $stmt->execute();
    } catch (PDOException $pDOException) {
      $this->hadleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }
}
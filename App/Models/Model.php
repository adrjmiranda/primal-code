<?php

namespace App\Models;

use PDO;
use App\Settings\Connection\Database;
use PDOException;
use Exception;

class Model
{
  protected PDO $pdo;
  private string $table;

  public function __construct(string $table)
  {
    $this->table = $table;
    $this->pdo = Database::getConnection();
  }

  protected function handleException(string $message, mixed $erroCode)
  {
    // TODO: In Development
    var_dump($message);
  }

  public function findByText(array $fields, string $textColumn, string $text, string $conditionColumn, string $condition, mixed $conditionValue, string $orderBy = 'ASC'): ?array
  {
    $query = "SELECT ";

    foreach ($fields as $column) {
      $query .= "$column, ";
    }
    $query = substr($query, 0, -2);
    $query .= " FROM posts WHERE $textColumn LIKE :text AND $conditionColumn $condition :$conditionColumn ORDER BY id $orderBy";

    try {
      $stmt = $this->pdo->prepare($query);

      $stmt->bindValue(":text", '%' . $text . '%', PDO::PARAM_STR);
      $stmt->bindValue(":$conditionColumn", $conditionValue);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }


  public function all(string $orderBy = 'ASC', int $limit = 0): ?array
  {
    $query = "SELECT * FROM $this->table ORDER BY id $orderBy";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function find(string $column, mixed $value, string $orderBy = 'ASC', int $limit = 0): ?array
  {
    $query = "SELECT * FROM $this->table WHERE $column = :$column ORDER BY id $orderBy";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$column", $value);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
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
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findSpecificFields(array $fields, string $orderBy = 'ASC', int $limit = 0): ?array
  {
    $query = "SELECT ";

    foreach ($fields as $column) {
      $query .= $column . ', ';
    }
    $query = substr($query, 0, -2);
    $query .= " FROM $this->table ORDER BY id $orderBy";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findSpecificFieldsAndCondition(array $fields, string $specificColumn, string $condition, mixed $specificValue, string $orderBy = 'ASC', int $limit = 0, int $offset = 0): ?array
  {
    $query = "SELECT ";

    foreach ($fields as $column) {
      $query .= $column . ', ';
    }
    $query = substr($query, 0, -2);
    $query .= " FROM $this->table";

    $query .= " WHERE $specificColumn $condition :$specificColumn ORDER BY id $orderBy";

    if ($limit > 0) {
      $query .= " LIMIT $limit";
    }

    if ($offset > 0) {
      $query .= " OFFSET $offset";
    }

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$specificColumn", $specificValue);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
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
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findLastAndCondition(string $specificColumn, string $condition, mixed $specificValue)
  {
    $query = "SELECT * FROM posts WHERE";

    $query .= " $specificColumn $condition :$specificColumn ORDER BY id DESC LIMIT 1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$specificColumn", $specificValue);
      $stmt->execute();

      return $stmt->fetchObject(get_called_class());
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findFirst()
  {
    $query = "SELECT * FROM posts ORDER BY id ASC LIMIT 1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      return $stmt->fetchObject(get_called_class());
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function findFirstAndCondition(string $specificColumn, string $condition, mixed $specificValue)
  {
    $query = "SELECT * FROM posts WHERE";

    $query .= " $specificColumn $condition :$specificColumn ORDER BY id ASC LIMIT 1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$specificColumn", $specificValue);
      $stmt->execute();

      return $stmt->fetchObject(get_called_class());
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  private function removeUselessKeysInStore(array $data): array
  {
    foreach ($data as $key => $value) {
      if (strpos($key, 'App\Models') !== false || $key === 'id') {
        unset($data[$key]);
      }

      if (strpos($key, 'pdo') !== false) {
        unset($data[$key]);
      }
    }

    return $data;
  }

  private function removeUselessKeysInUpdate(array $data): array
  {
    foreach ($data as $key => $value) {
      if (strpos($key, 'App\Models') !== false) {
        unset($data[$key]);
      }

      if (strpos($key, 'pdo') !== false) {
        unset($data[$key]);
      }
    }

    return $data;
  }

  public function store()
  {
    $data = (array) $this;

    $data = $this->removeUselessKeysInStore($data);

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
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
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

    $data = $this->removeUselessKeysInUpdate($data);

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
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
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
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function removeSpecific(string $column, mixed $value): ?bool
  {
    try {
      $query = "DELETE FROM $this->table WHERE $column = :$column";

      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(":$column", $value);

      return $stmt->execute();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }


  // Pagination

  private function getTotalElements(): ?int
  {
    $query = "SELECT COUNT(id) FROM $this->table";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();

      return (int) $stmt->fetchColumn();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

  public function getQuantityPerPage(int $quantity = 1): int
  {
    if ($quantity <= 0) {
      throw new Exception("Var quantity must be greater than zero");
    }

    $numberOfEntities = $this->getTotalElements();

    $quantityPerPage = $quantity;

    if ($quantity > $numberOfEntities) {
      $quantityPerPage = $numberOfEntities === 0 ? 1 : $numberOfEntities;
    }

    return $quantityPerPage;
  }

  public function getNumberOfPages(int $quantityPerPage): int
  {
    $quantityPerPage = $this->getQuantityPerPage($quantityPerPage);

    if ($quantityPerPage <= 0) {
      return 0;
    }

    $numberOfPages = ceil($this->getTotalElements() / $quantityPerPage);

    return $numberOfPages;
  }

  public function getPage(array $fields, string $specificColumn, string $condition, mixed $specificValue, string $orderBy, int $pageNumber, int $quantityPerPage)
  {
    $offset = ($pageNumber - 1) * $quantityPerPage;

    return $this->findSpecificFieldsAndCondition($fields, $specificColumn, $condition, $specificValue, $orderBy, $quantityPerPage, $offset);
  }
}
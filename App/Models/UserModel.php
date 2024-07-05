<?php

namespace App\Models;

use PDO;
use PDOException;

class UserModel extends Model
{
  public int $id;
  public string $name;
  public string $email;
  public string $password;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('users');
  }

  public function getName(int $id)
  {
    $query = "SELECT name FROM users WHERE id = :id LIMIT 1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();

      return (string) $stmt->fetchColumn();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }
}
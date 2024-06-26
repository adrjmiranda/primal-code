<?php

namespace App\Config;

use PDO;

class Database
{
  private static ?PDO $pdo = null;

  public static function getConnection()
  {
    if (is_null(self::$pdo)) {
      $dbHost = $_ENV['DB_HOST'];
      $dbName = $_ENV['DB_NAME'];
      $dbUser = $_ENV['DB_USER'];
      $dbPass = $_ENV['DB_PASS'];


      self::$pdo = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);

      // TODO: In Development
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    return self::$pdo;
  }
}
<?php

namespace App\Models;

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
}
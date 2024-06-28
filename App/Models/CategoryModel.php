<?php

namespace App\Models;

class CategoryModel extends Model
{
  public int $id;
  public string $name;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('categories');
  }
}
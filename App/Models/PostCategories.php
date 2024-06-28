<?php

namespace App\Models;

class PostCategories extends Model
{
  public int $id;
  public int $post_id;
  public int $category_id;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('categories');
  }
}
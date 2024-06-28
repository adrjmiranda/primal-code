<?php

namespace App\Models;

class PostModel extends Model
{
  public int $id;
  public string $title;
  public mixed $content;
  public string $slug;
  public int $author_id;
  public string $image_url;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('posts');
  }
}
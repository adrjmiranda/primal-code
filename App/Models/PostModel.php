<?php

namespace App\Models;

class PostModel extends Model
{
  public int $id;
  public string $title;
  public string $content;
  public string $slug;
  public int $number_of_comments;
  public string $status;
  public int $author_id;
  public string $image_url;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('posts');
  }
}
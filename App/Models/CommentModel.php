<?php

namespace App\Models;

class CommentModel extends Model
{
  public int $id;
  public string $content;
  public int $post_id;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('comments');
  }
}
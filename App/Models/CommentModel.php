<?php

namespace App\Models;

use PDO;
use PDOException;

class CommentModel extends Model
{
  public int $id;
  public string $content;
  public int $post_id;
  public int $user_id;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('comments');
  }

  public function getCommentByUserIdAndPostId(int $userId, int $postId)
  {
    $query = "SELECT * FROM comments WHERE user_id = :user_id AND post_id = :post_id LIMIT 1";

    try {
      $stmt = $this->pdo->prepare($query);
      $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
      $stmt->bindParam(":post_id", $postId, PDO::PARAM_INT);
      $stmt->execute();

      return $stmt->fetchObject(get_called_class());
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }
}
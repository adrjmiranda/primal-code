<?php

namespace App\Models;

use PDO;
use PDOException;

class PostModel extends Model
{
  public int $id;
  public string $title;
  public string $description;
  public string $content;
  public string $slug;
  public int $number_of_comments;
  public string $status; // visible or hidden
  public int $author_id;
  public string $image_url;
  public string $created_at;
  public string $updated_at;

  public function __construct()
  {
    parent::__construct('posts');
  }

  public function getByCategories(array $fields, string $specificColumn, string $condition, mixed $specificValue, int $categoryId, string $orderBy = 'ASC')
  {
    $postIdList = (new PostCategoriesModel)->findSpecificFieldsAndCondition(['id', 'post_id'], 'category_id', '=', $categoryId);

    if (empty($postIdList)) {
      return [];
    }

    $postIds = array_map(function ($item) {
      return $item->post_id;
    }, $postIdList);

    $placeholders = implode(',', array_map(function ($index) {
      return ":id$index";
    }, array_keys($postIds)));

    $query = "SELECT ";

    foreach ($fields as $column) {
      $query .= "$column, ";
    }
    $query = substr($query, 0, -2);
    $query .= " FROM posts WHERE $specificColumn $condition :$specificColumn AND id IN ($placeholders) ORDER BY id $orderBy";

    try {
      $stmt = $this->pdo->prepare($query);

      $stmt->bindValue(":$specificColumn", $specificValue);

      foreach ($postIds as $index => $id) {
        $stmt->bindValue(":id$index", $id, PDO::PARAM_INT);
      }

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException->getMessage(), $pDOException->getCode());
    }
  }

}
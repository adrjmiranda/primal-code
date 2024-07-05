<?php

namespace App\Utils\Validations;

use App\Models\PostModel;
use App\Models\UserModel;

class EvaluateCommentSend
{
  private function isValidComment(string $comment): bool
  {
    $pattern = '/^.{1,255}$/s';
    return preg_match($pattern, $comment);
  }

  private function isValidId(int $id): bool
  {
    $pattern = '/^[1-9]\d{0,9}$/';
    return preg_match($pattern, $id);
  }

  private function postExists(int $id): bool
  {
    $entity = (new PostModel)->findOne('id', $id) ?? null;
    return ($entity instanceof PostModel);
  }

  private function userExists(int $id): bool
  {
    $entity = (new UserModel)->findOne('id', $id) ?? null;
    return ($entity instanceof UserModel);
  }

  public function getErrors(array $data): array
  {
    $errors = [];

    foreach ($data as $key => $value) {
      switch ($key) {
        case 'comment':

          if (!$this->isValidComment($value)) {
            $errors['comment'] = 'Incorrect comment';
          }

          break;

        case 'post_id':

          if (!$this->isValidComment($value)) {
            $errors['post_id'] = 'Post does not exist';
          } else if (!$this->postExists($value)) {
            $errors['post_id'] = 'Post does not exist';
          }

          break;

        case 'user_id':

          if (!$this->isValidComment($value)) {
            $errors['user_id'] = 'User does not exist';
          } else if (!$this->userExists($value)) {
            $errors['user_id'] = 'User does not exist';
          }

          break;
      }
    }

    return $errors;
  }
}
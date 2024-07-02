<?php

namespace App\Utils\Validations;

use App\Models\PostModel;

class EvaluatePostCreation
{
  private const MAX_IMAGE_SIZE = 4; // in MB

  private array $extensionsAllowedForImages = [
    'image/jpeg',
    'image/png'
  ];

  private function isValidImageExtension(array $file): bool
  {
    return in_array($file['type'], $this->extensionsAllowedForImages);
  }

  private function isValidImageSize(array $file): bool
  {
    return $file['size'] > 0 && ($file['size'] / (1024 * 1024)) <= EvaluatePostCreation::MAX_IMAGE_SIZE;
  }

  private function isValidTitle(string $title): bool
  {
    $pattern = '/^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s]{1,255}$/';
    return preg_match($pattern, $title);
  }

  private function slugAlreadyExists(string $slug): bool
  {
    $entity = new PostModel;
    $entityWithSameSlug = $entity->findOne('slug', $slug);

    return ($entityWithSameSlug instanceof PostModel);
  }

  private function isValidSlug(string $slug): bool
  {
    $pattern = '/^[A-Za-z0-9-]{1,255}$/';
    return preg_match($pattern, $slug);
  }

  private function isValidContent(string $content): bool
  {
    $pattern = '/^.{1,65535}$/s';
    return preg_match($pattern, $content);
  }

  public function getErrors(array $data): array
  {
    $errors = [];

    foreach ($data as $key => $value) {
      switch ($key) {
        case 'image':

          if (empty($value)) {
            $errors['image'] = 'Image is mandatory';
          } else if (!$this->isValidImageExtension($value)) {
            $errors['image'] = 'Only png, jpg and jpeg images allowed';
          } else if (!$this->isValidImageSize($value)) {
            $errors['image'] = 'The image must be a maximum of ' . EvaluatePostCreation::MAX_IMAGE_SIZE . 'MB';
          }

          break;

        case 'title':

          if (!$this->isValidTitle($value)) {
            $errors['title'] = 'The title must be valid text';
          }

          break;

        case 'content':

          if (!$this->isValidContent($value)) {
            $errors['content'] = 'The content must be valid text';
          }

          break;

        case 'slug':

          if ($this->slugAlreadyExists($value)) {
            $errors['slug'] = 'This slug is already registered for another post';
          } else if (!$this->isValidSlug($value)) {
            $errors['slug'] = 'The slug must be just text without accents or spaces (hyphens are allowed)';
          }

          break;
      }
    }

    return $errors;
  }
}
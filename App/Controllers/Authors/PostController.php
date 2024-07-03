<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Models\PostModel;
use App\Settings\Session\SessionKeyNames;
use App\Utils\Template\Generator;
use App\Utils\Validations\EvaluatePostCreation;

class PostController
{
  public function create(Request $request, array $params, array $data = [])
  {
    $data['session_title'] = 'Create post';

    return Generator::render("Authors/create-post", $data);
  }

  private function redirectAfterError(Request $request, array $params, array $fields, array $errors)
  {
    $data['data'] = $fields;
    $data['errors'] = $errors;

    return $this->create($request, $params, $data);
  }

  public function store(Request $request, array $params)
  {
    $postData = $request->getPostVars();
    $image = $request->getFile('image');

    $title = $postData['title'] ?? '';
    $slug = $postData['slug'] ?? '';
    $content = $postData['content'] ?? '';

    $dataToBeEvaluated = [
      'image' => $image,
      'title' => $title,
      'slug' => $slug,
      'content' => $content,
    ];

    $errors = (new EvaluatePostCreation)->getErrors($dataToBeEvaluated);

    if (!empty($errors)) {
      return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors);
    }

    $entity = new PostModel;

    // Save main image

    if ($image['error'] == UPLOAD_ERR_OK) {
      $imageDir = __DIR__ . '/../../../public/img/posts/';
      $imageName = $slug . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

      $imagePath = $imageDir . $imageName;

      if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        $errors['image'] = 'An error occurred and the image could not be saved';

        return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors);
      }
    } else {
      $errors['image'] = 'Error sending image';

      return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors);
    }

    $author_id = $_SESSION[SessionKeyNames::Authors->value]['id'];

    $entity->image_url = $imagePath;
    $entity->title = $title;
    $entity->slug = $slug;
    $entity->content = $content;
    $entity->author_id = $author_id;

    // Save post data

    if ($entity->store()) {
      $request->getRouter()->redirect('/authors/dashboard/posts');
    } else {
      $errors['create_error'] = 'An error occurred when trying to create the post';

      return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors);
    }
  }

  // TODO: implements
  public function update()
  {
  }

  // TODO: implements
  public function remove()
  {
  }
}
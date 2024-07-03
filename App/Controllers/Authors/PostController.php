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

  private function redirectAfterError(Request $request, array $params, array $fields, array $errors, string $area)
  {
    $data['data'] = $fields;
    $data['errors'] = $errors;

    switch ($area) {
      case 'create':
        return $this->create($request, $params, $data);

      case 'edit':
        return $this->edit($request, $params, $data);

    }
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
      return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'create');
    }

    $entity = new PostModel;

    // Save main image

    if ($image['error'] == UPLOAD_ERR_OK) {
      $imageDir = __DIR__ . '/../../../public/img/posts/';
      $imageName = $slug . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

      $imagePath = $imageDir . $imageName;

      if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        $errors['image'] = 'An error occurred and the image could not be saved';

        return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'create');
      }
    } else {
      $errors['image'] = 'Error sending image';

      return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'create');
    }

    $author_id = $_SESSION[SessionKeyNames::Authors->value]['id'];

    $entity->image_url = $imageName;
    $entity->title = $title;
    $entity->slug = $slug;
    $entity->content = $content;
    $entity->author_id = $author_id;

    // Save post data

    if ($entity->store()) {
      $request->getRouter()->redirect('/authors/dashboard/posts');
    } else {
      $errors['create_error'] = 'An error occurred when trying to create the post';

      return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'create');
    }
  }

  public function edit(Request $request, array $params, array $data = [])
  {
    $id = (int) $params['id'];
    $post = (new PostModel)->findOne('id', $id);

    if ($post instanceof PostModel) {
      $data['id'] = $post->id;
      $data['title'] = $post->title;
      $data['slug'] = $post->slug;
      $data['content'] = $post->content;
      $data['session_title'] = 'Edit post';

      return Generator::render("Authors/edit-post", $data);
    } else {
      $request->getRouter()->redirect('/authors/dashboard/posts');
    }
  }

  public function update(Request $request, array $params)
  {

    $postData = $request->getPostVars();

    $id = (int) ($postData['id'] ?? '');

    $post = (new PostModel)->findOne('id', $id) ?? null;

    if ($post instanceof PostModel) {
      $image = $request->getFile('image');

      $title = $postData['title'] ?? '';
      $slug = $postData['slug'] ?? '';
      $content = $postData['content'] ?? '';

      $dataToBeEvaluated = [
        'title' => $title,
        'slug' => $slug,
        'content' => $content
      ];

      if ($image['size'] !== 0) {
        $dataToBeEvaluated['image'] = $image;
      }

      $errors = (new EvaluatePostCreation)->getErrors($dataToBeEvaluated, $id);

      if (!empty($errors)) {
        $params['id'] = $id;

        return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'edit');
      }

      // Save main image

      if ($image['size'] !== 0) {
        if ($image['error'] == UPLOAD_ERR_OK) {
          $imageDir = __DIR__ . '/../../../public/img/posts/';
          $imageName = $slug . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

          $imagePath = $imageDir . $imageName;

          if (unlink($imagePath)) {
            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
              $errors['image'] = 'An error occurred and the image could not be saved';
              $params['id'] = $id;

              return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'edit');
            }

            $post->image_url = $imageName;
          } else {
            $errors['image'] = 'An error occurred when trying to update the image';
            $params['id'] = $id;

            return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'edit');
          }
        } else {
          $errors['image'] = 'Error sending image';
          $params['id'] = $id;

          return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'edit');
        }
      }

      $author_id = $_SESSION[SessionKeyNames::Authors->value]['id'];

      $post->title = $title;
      $post->slug = $slug;
      $post->content = $content;
      $post->author_id = $author_id;

      // Save post data

      if ($post->update()) {
        $request->getRouter()->redirect('/authors/dashboard/posts');
      } else {
        $errors['create_error'] = 'An error occurred when trying to update the post';
        $params['id'] = $id;

        return $this->redirectAfterError($request, $params, $dataToBeEvaluated, $errors, 'edit');
      }
    } else {
      $request->getRouter()->redirect('/authors/dashboard/posts');
    }
  }

  // TODO: implements
  public function remove(Request $request, array $params)
  {
  }
}
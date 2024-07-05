<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Models\CategoryModel;
use App\Models\PostCategoriesModel;
use App\Models\PostModel;
use App\Settings\Session\SessionKeyNames;
use App\Utils\Template\Generator;
use App\Utils\Validations\EvaluatePostCreation;

class PostController
{
  public function create(Request $request, array $params, array $data = [])
  {
    $data['session_title'] = 'Create post';
    $data['active_session'] = 'create-post';

    $categories = (new CategoryModel)->all();
    $data['categories'] = $categories;

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

    $categories = $postData['categories'] ?? '';
    $title = $postData['title'] ?? '';
    $description = $postData['description'] ?? '';
    $slug = $postData['slug'] ?? '';
    $content = $postData['content'] ?? '';

    $dataToBeEvaluated = [
      'image' => $image,
      'categories' => $categories,
      'title' => $title,
      'description' => $description,
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

    $author_id = $_SESSION['authors']['id'];

    $entity->image_url = $imageName;
    $entity->title = $title;
    $entity->description = $description;
    $entity->slug = $slug;
    $entity->content = $content;
    $entity->author_id = $author_id;

    // Save post data

    $postId = $entity->store();

    if ($postId) {
      $categoryList = [];
      $index = 0;
      foreach ($categories as $categoryId) {
        $postCategoryEntity = new PostCategoriesModel;

        $postCategoryEntity->post_id = (int) $postId;
        $postCategoryEntity->category_id = (int) $categoryId;

        $categoryList[$index] = $postCategoryEntity;
        $index++;
      }

      (new PostCategoriesModel)->insertMany($categoryList);

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
      $data['description'] = $post->description;
      $data['slug'] = $post->slug;
      $data['content'] = $post->content;
      $data['session_title'] = 'Edit post';

      $data['active_session'] = 'posts';

      $categories = (new CategoryModel)->all();
      $data['categories'] = $categories;

      $selectedCategories = (new PostCategoriesModel)->find('post_id', $post->id);
      $data['selected_categories'] = $selectedCategories;

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

      $categories = $postData['categories'] ?? '';
      $title = $postData['title'] ?? '';
      $description = $postData['description'] ?? '';
      $slug = $postData['slug'] ?? '';
      $content = $postData['content'] ?? '';

      $dataToBeEvaluated = [
        'categories' => $categories,
        'title' => $title,
        'description' => $description,
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

      $author_id = $_SESSION['authors']['id'];

      $post->title = $title;
      $post->description = $description;
      $post->slug = $slug;
      $post->content = $content;
      $post->author_id = $author_id;

      // Save post data

      if ($post->update()) {
        $categoryList = [];
        $index = 0;
        foreach ($categories as $categoryId) {
          $postCategoryEntity = new PostCategoriesModel;

          $postCategoryEntity->post_id = (int) $post->id;
          $postCategoryEntity->category_id = (int) $categoryId;

          $categoryList[$index] = $postCategoryEntity;
          $index++;
        }

        (new PostCategoriesModel)->removeSpecific('post_id', $post->id);
        (new PostCategoriesModel)->insertMany($categoryList);

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

  public function changeVisibility(Request $request, array $params)
  {
    $id = (int) ($params['id'] ?? '');

    $post = (new PostModel)->findOne('id', $id) ?? null;

    if ($post instanceof PostModel) {
      $post->status = $post->status === 'hidden' ? 'visible' : 'hidden';
      $post->update();

      $request->getRouter()->redirect('/authors/dashboard/posts');
    } else {
      $request->getRouter()->redirect('/authors/dashboard/posts');
    }
  }

  public function remove(Request $request, array $params)
  {
    $id = (int) ($params['id'] ?? '');

    $post = (new PostModel)->findOne('id', $id) ?? null;

    if ($post instanceof PostModel) {
      $post->delete();

      $request->getRouter()->redirect('/authors/dashboard/posts');
    } else {
      $request->getRouter()->redirect('/authors/dashboard/posts');
    }
  }
}
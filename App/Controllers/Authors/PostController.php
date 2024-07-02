<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Utils\Template\Generator;
use App\Utils\Validations\EvaluatePostCreation;

class PostController
{
  public function create(Request $request, array $params, array $data = [])
  {
    $data['session_title'] = 'Create post';

    return Generator::render("Authors/create-post", $data);
  }

  // TODO: implements
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
      $data['data'] = $dataToBeEvaluated;
      $data['errors'] = $errors;

      return $this->create($request, $params, $data);
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
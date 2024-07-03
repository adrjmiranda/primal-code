<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Models\PostModel;
use App\Utils\Template\Generator;

class PostController
{
  public function get(Request $request, array $params)
  {
    $slug = $params['slug'] ?? '';

    $post = (new PostModel)->findOne('slug', $slug) ?? null;

    if ($post instanceof PostModel) {
      $data['post'] = $post;

      return Generator::render('Users/post', $data);
    } else {
      $request->getRouter()->redirect('/');
    }
  }
}
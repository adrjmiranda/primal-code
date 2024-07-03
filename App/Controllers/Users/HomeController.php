<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Utils\Template\Generator;
use App\Models\PostModel;

class HomeController
{
  public function index(Request $request, array $params)
  {
    $posts = (new PostModel)->all();

    $data['posts'] = $posts;

    return Generator::render('Users/index', $data);
  }
}
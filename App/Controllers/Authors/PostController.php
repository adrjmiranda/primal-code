<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Utils\Template\Generator;

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

    echo '<pre>';
    var_dump($postData);
    echo '</pre>';
    exit;
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
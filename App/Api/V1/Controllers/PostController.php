<?php

namespace App\Api\V1\Controllers;

use App\Http\EnabledContentTypes;
use App\Http\Request;
use App\Http\Response;
use App\Models\PostModel;

class PostController
{
  public function index(Request $request, array $params)
  {
    $posts = (new PostModel)->findSpecificFields(['id', 'title', 'slug', 'number_of_comments', 'description', 'status', 'author_id', 'image_url', 'updated_at'], 'DESC') ?? [];

    return (new Response(['data' => $posts], EnabledContentTypes::ApplicationJson, 200))->send();
  }
}
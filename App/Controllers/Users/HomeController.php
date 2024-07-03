<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Utils\Template\Generator;
use App\Models\CategoryModel;
use App\Models\PostModel;

class HomeController
{
  public function index(Request $request, array $params)
  {
    $categories = (new CategoryModel)->all();
    $posts = (new PostModel)->findSpecificFields(['title', 'description', 'slug', 'image_url', 'updated_at']);
    $featuredPost = (new PostModel)->findLast();

    $data['categories'] = $categories;
    $data['posts'] = $posts;
    $data['featured_post'] = $featuredPost;

    return Generator::render('Users/index', $data);
  }
}
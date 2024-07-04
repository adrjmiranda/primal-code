<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Models\BasicConditions;
use App\Models\CategoryModel;
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

  public function cards(Request $request, array $params)
  {
    $pageNubmer = $params['page'] ?? 1;
    $itemsPerPage = 6;

    $categories = (new CategoryModel)->all();

    $quantityPerPage = (new PostModel)->getQuantityPerPage($itemsPerPage);
    $numberOfPages = (new PostModel)->getNumberOfPages($quantityPerPage);
    $posts = (new PostModel)->getPage(['title', 'description', 'slug', 'image_url', 'updated_at'], 'status', '=', 'visible', 'DESC', $pageNubmer, $quantityPerPage);

    $featuredPost = (new PostModel)->findLastAndCondition('status', '=', 'visible');

    $data['categories'] = $categories;
    $data['posts'] = $posts;
    $data['number_of_pages'] = $numberOfPages;
    $data['page_number'] = $pageNubmer;
    $data['featured_post'] = $featuredPost;

    return Generator::render('Users/index', $data);
  }
}
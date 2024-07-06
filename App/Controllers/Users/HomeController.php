<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Utils\Template\Generator;
use App\Models\CategoryModel;
use App\Models\PostModel;
use App\Settings\Cache\Main as Cache;

class HomeController
{
  public function index(Request $request, array $params, array $data = [])
  {
    $pageNumber = 1;
    $itemsPerPage = 6;

    $categories = (new CategoryModel)->all();

    $quantityPerPage = (new PostModel)->getQuantityPerPage($itemsPerPage);
    $numberOfPages = (new PostModel)->getNumberOfPages($quantityPerPage);

    $posts = (new PostModel)->getPage(['title', 'description', 'slug', 'image_url', 'updated_at'], 'status', '=', 'visible', 'DESC', $pageNumber, $quantityPerPage);

    $featuredPost = (new PostModel)->findLastAndCondition('status', '=', 'visible');

    $data['categories'] = $categories;
    $data['posts'] = $posts;
    $data['number_of_pages'] = $numberOfPages;
    $data['page_number'] = $pageNumber;
    $data['featured_post'] = $featuredPost;

    return Generator::render('Users/index', $data);
  }

  public function about(Request $request, array $params)
  {
    $cacheKey = $request->getUri();
    $cacheData = Cache::getCache($cacheKey);

    if ($cacheData !== false) {
      echo $cacheData;
    } else {
      $newData = Generator::render('Users/about');
      Cache::setCache($cacheKey, $newData, 10);

      return $newData;
    }
  }

  public function getPostsByCategory(Request $request, array $params)
  {
    $categoryId = (int) ($params['category_id'] ?? '');

    $category = (new CategoryModel)->findOne('id', $categoryId) ?? null;

    if ($category instanceof CategoryModel) {


      $posts = (new PostModel)->getByCategories(['title', 'description', 'slug', 'image_url', 'updated_at'], 'status', '=', 'visible', $categoryId, 'DESC') ?? [];

      $data['posts'] = $posts;
      $data['category_key'] = $category->name;
      return Generator::render('Users/search-category', $data);
    } else {
      $request->getRouter()->redirect('/');
    }
  }
}
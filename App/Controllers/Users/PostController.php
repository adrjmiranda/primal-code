<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\PostModel;
use App\Utils\Template\Generator;

class PostController
{
  public function get(Request $request, array $params, array $data = [])
  {
    $slug = $params['slug'] ?? '';

    $post = (new PostModel)->findOne('slug', $slug) ?? null;
    $categories = (new CategoryModel)->all();

    if ($post instanceof PostModel) {
      $data['post'] = $post;
      $data['categories'] = $categories;

      $postId = $post->id;
      $userId = (int) ($_SESSION['users']['id'] ?? '');

      $data['comment_already_made_on_this_post'] = false;
      $commentAlreadyMadeOnThisPost = (new CommentModel)->getCommentByUserIdAndPostId($userId, $postId);

      if ($commentAlreadyMadeOnThisPost instanceof CommentModel) {
        $data['comment_already_made_on_this_post'] = true;
      }

      // Get comments

      $comments = (new CommentModel)->findSpecificFieldsAndCondition(['id', 'content', 'post_id', 'user_id', 'created_at'], 'post_id', '=', $post->id, 'DESC');
      $data['comments'] = $comments;

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

  public function search(Request $request, array $params)
  {
    $data = $request->getPostVars();
    $searchKey = $data['search'] ?? '';

    if (empty($searchKey)) {
      $request->getRouter()->redirect('/');
    }

    $posts = (new PostModel)->findByText(['title', 'description', 'slug', 'image_url', 'updated_at'], 'title', $searchKey, 'status', '=', 'visible', 'DESC') ?? [];
    $data['posts'] = $posts;
    $data['search_key'] = $searchKey;

    return Generator::render('Users/search-posts', $data);
  }
}
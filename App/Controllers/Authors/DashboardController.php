<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Utils\Template\Generator;

use App\Models\AuthorModel;
use App\Models\PostModel;
use App\Models\UserModel;

class DashboardController
{
  private function getSessionContent(string $session): array
  {
    $data = [];
    $fields = [];
    $limit = 0;

    switch ($session) {
      case 'posts':
        $entity = new PostModel;
        $fields = ['id', 'title', 'number_of_comments', 'status', 'updated_at'];
        break;

      case 'users':
        $entity = new UserModel;
        $fields = ['id', 'name', 'email', 'updated_at'];
        break;

      case 'authors':
        $entity = new AuthorModel;
        $fields = ['id', 'name', 'email', 'updated_at'];
        break;
    }

    $data = $entity->findSpecificFields($fields, $limit);

    return $data;
  }

  public function index(Request $request, array $params, array $data = [])
  {
    $session = $params['session'] ?? '';
    $data['data'] = $this->getSessionContent($session);

    return Generator::render('Authors/posts', $data);
  }
}
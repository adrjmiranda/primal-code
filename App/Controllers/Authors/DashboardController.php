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
    $entity = null;
    $data = [];

    switch ($session) {
      case 'posts':
        $entity = new PostModel;
        break;

      case 'users':
        $entity = new UserModel;
        break;

      case 'authors':
        $entity = new AuthorModel;
        break;
    }

    if (!is_null($entity)) {
      $data = $entity->all();
    }

    return $data;
  }

  public function index(Request $request, array $params, array $data = [])
  {
    $session = $params['session'] ?? '';
    $data['data'] = $this->getSessionContent($session);

    return Generator::render('Authors/posts', $data);
  }
}
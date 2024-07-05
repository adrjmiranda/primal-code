<?php

namespace App\Controllers\Authors;

use App\Http\Request;
// use App\Models\BasicConditions;
use App\Utils\Template\Generator;

use App\Models\AuthorModel;
use App\Models\PostModel;
use App\Models\UserModel;

class DashboardController
{
  private static int $numberOfPages;

  private function getSessionContent(string $session, int $pageNumber): array
  {
    $data = [];
    $fields = [];
    $orderBy = 'DESC';

    $quantityPerPage = 8;

    $specificColumn = 'id';
    $condition = '>';
    $specificValue = 0;

    switch ($session) {
      case 'posts':
        $entity = new PostModel;
        $fields = ['id', 'title', 'number_of_comments', 'status', 'updated_at'];

        $specificColumn = 'status';
        $condition = '=';
        $specificValue = 'visible';
        break;

      case 'users':
        $entity = new UserModel;
        $fields = ['id', 'name', 'email', 'created_at'];
        break;

      case 'authors':
        $entity = new AuthorModel;
        $fields = ['id', 'name', 'email', 'created_at'];
        break;
    }

    DashboardController::$numberOfPages = $entity->getNumberOfPages($quantityPerPage);
    $data = $entity->getPage($fields, $specificColumn, $condition, $specificValue, $orderBy, $pageNumber, $quantityPerPage);

    return $data;
  }

  public function index(Request $request, array $params, array $data = [])
  {
    $session = $params['session'] ?? '';
    $page = $params['page'] ?? 1;

    $pageNumber = 0;

    if (!empty($page)) {
      $pageNumber = (int) $page;
    }

    $data['data'] = $this->getSessionContent($session, $pageNumber);

    $sessionTitle = str_replace('-', ' ', $session);
    $data['session_title'] = $sessionTitle;
    $data['active_session'] = $session;

    $data['number_of_pages'] = DashboardController::$numberOfPages;
    $data['page_number'] = $pageNumber;

    return Generator::render("Authors/$session", $data);
  }
}
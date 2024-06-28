<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Utils\Template\Generator;

class DashboardController
{
  private function getSessionContent(string $session): array
  {
    $data = [];

    switch ($session) {
      case 'posts':
        # code...
        break;

      case 'users':
        # code...
        break;

      case 'authors':
        # code...
        break;

      default:
        # code...
        break;
    }

    return $data;
  }

  public function index(Request $request, array $params, array $data = [])
  {
    $session = $params['session'] ?? '';

    return Generator::render('Authors/index', $data);
  }
}
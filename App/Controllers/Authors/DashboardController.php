<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Utils\Template\Generator;

class DashboardController
{
  public function index(Request $request, array $params, array $data = [])
  {
    return Generator::render('Authors/index', $data);
  }
}
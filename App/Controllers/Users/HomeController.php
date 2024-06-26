<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Utils\Template\Generator;

class HomeController
{
  public function index(Request $request, array $params)
  {
    return Generator::render('Users/index');
  }
}
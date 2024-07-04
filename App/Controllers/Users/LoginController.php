<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Utils\Template\Generator;

class LoginController
{
  public function index(Request $request, array $params, array $data = [])
  {
    return Generator::render('Users/login', $data);
  }
}
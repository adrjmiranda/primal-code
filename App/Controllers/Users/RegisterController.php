<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Utils\Template\Generator;

class RegisterController
{
  public function index(Request $request, array $params, array $data = [])
  {
    return Generator::render('Users/register', $data);
  }
}
<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Settings\Session\Users\Config;
use App\Utils\Template\Generator;

class LogoutController
{
  public function logout(Request $request, array $params)
  {
    Config::logout();

    return Generator::render('Users/login');
  }
}
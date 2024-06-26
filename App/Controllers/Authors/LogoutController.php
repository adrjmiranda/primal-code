<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Utils\Template\Generator;
use App\Settings\Session\Authors\Config;

class LogoutController
{
  public function logout(Request $request, array $params)
  {
    Config::logout();

    return Generator::render('Manager/login');
  }
}
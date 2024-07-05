<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Settings\Session\Authors\Config;

class LogoutController
{
  public function logout(Request $request, array $params)
  {
    Config::logout('authors');

    $request->getRouter()->redirect('/authors/login');
  }
}
<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Settings\Session\Users\Config;

class LogoutController
{
  public function logout(Request $request, array $params)
  {
    Config::logout('users');

    $request->getRouter()->redirect('/');
  }
}
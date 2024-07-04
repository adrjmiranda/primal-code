<?php

namespace App\Http\Middlewares\Users;

use App\Http\Request;
use App\Settings\Session\Users\Config;

class RequireLogin
{
  public function handle(Request $request, array $params, callable $next)
  {
    if (!Config::isLoggedIn()) {
      $request->getRouter()->redirect('/users/login');
      return;
    }

    return $next($request, $params);
  }
}
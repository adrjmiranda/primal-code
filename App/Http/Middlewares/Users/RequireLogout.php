<?php

namespace App\Http\Middlewares\Users;

use App\Http\Request;
use App\Settings\Session\Users\Config;

class RequireLogout
{
  public function handle(Request $request, array $params, callable $next)
  {
    if (Config::isLoggedIn()) {
      $request->getRouter()->redirect('/');
      return;
    }

    return $next($request, $params);
  }
}
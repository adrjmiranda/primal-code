<?php

namespace App\Http\Middlewares\Authors;

use App\Http\Request;
use App\Settings\Session\Authors\Config;

class RequireLogin
{
  public function handle(Request $request, array $params, callable $next)
  {
    if (!Config::isLoggedIn()) {
      $request->getRouter()->redirect('/authors/login');
      return;
    }

    return $next($request, $params);
  }
}
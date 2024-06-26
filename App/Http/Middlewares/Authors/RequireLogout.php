<?php

namespace App\Http\Middlewares\Authors;

use App\Http\Request;
use App\Settings\Session\Authors\Config;

class RequireLogout
{
  public function handle(Request $request, array $params, callable $next)
  {
    if (Config::isLoggedIn()) {
      $request->getRouter()->redirect('/authors/dashboard');
      return;
    }

    return $next($request, $params);
  }
}
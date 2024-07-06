<?php

namespace App\Http\Middlewares\CSRF;

use App\Http\Request;

class Create
{
  public function handle(Request $request, array $params, callable $next)
  {
    $_SESSION['csrf'] = bin2hex(random_bytes(48));

    return $next($request, $params);
  }
}
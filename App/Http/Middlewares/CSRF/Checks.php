<?php

namespace App\Http\Middlewares\CSRF;

use App\Http\Request;

class Checks
{
  public function handle(Request $request, array $params, callable $next)
  {
    $requestData = $request->getPostVars();
    $requestUri = $request->getUri();

    $csrf = $requestData['csrf'] ?? '';

    if (empty($csrf) || $csrf !== $_SESSION['csrf']) {
      $url = '/';

      switch ($requestUri) {
        case '/authors/login':
          $url = '/authors/login';
          break;

        case '/authors/post/create':
          $url = '/authors/post/create';
          break;

        case '/authors/post/update':
          $url = '/authors/dashboard/posts';
          break;
      }

      $request->getRouter()->redirect($url);
    }

    return $next($request, $params);
  }
}
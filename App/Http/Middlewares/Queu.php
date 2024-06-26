<?php

namespace App\Http\Middlewares;

use App\Http\Request;
use App\Http\Response;

class Queu
{
  private object $controller;
  private string $method;
  private array $middlewares;

  public function __construct(object $controller, string $method, array $middlewares)
  {
    $this->controller = $controller;
    $this->method = $method;
    $this->middlewares = $middlewares;
  }

  public function next(Request $request, array $params)
  {
    if (empty($this->middlewares)) {
      $controller = $this->controller;
      $method = $this->method;

      $content = $controller->$method($request, $params);

      return (new Response($content))->send();
    }

    $currentMiddleware = array_shift($this->middlewares);
    $queu = $this;
    $next = function ($request, $params) use ($queu) {
      return $queu->next($request, $params);
    };

    return (new $currentMiddleware)->handle($request, $params, $next);
  }
}
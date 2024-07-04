<?php

namespace App\Http;

use App\Http\Middlewares\Queu;
use Exception;

enum HttpMmethodsEnabled
{
  case GET;
  case POST;
  case PUT;
  case DELETE;
}

class Router
{
  const VAR_PATTERN = '/\{([^}]*)\}/';

  private $patternList = [
    '%d' => '/^[1-9][0-9]*$/',
    '%c' => '/^[a-zA-Z]+$/',
    '%s' => '/^[a-zA-Z\-]+$/',
    '?d' => '/^([1-9][0-9]*)*$/',
    '?c' => '/^[a-zA-Z]*$/',
    '?s' => '/^[a-zA-Z\-]*$/'
  ];
  private Request $request;
  private array $staticRoutes;
  private array $dynamicRoutes;
  private array $params;
  private string $baseUrl;

  public function __construct(string $baseUrl)
  {
    $this->request = new Request($this);

    $this->baseUrl = $baseUrl;

    $this->staticRoutes = [];
    $this->dynamicRoutes = [];
    $this->params = [];
  }

  private function addStaticRoute(HttpMmethodsEnabled $httpMethod, string $uri, object $controller, string $method, array $middlewares = []): void
  {
    if (isset($this->staticRoutes[$httpMethod->name][$uri]) || isset($this->dynamicRoutes[$httpMethod->name][$uri])) {
      throw new Exception("The route $uri is already defined");
    }

    $this->staticRoutes[$httpMethod->name][$uri] = [
      'controller' => $controller,
      'method' => $method,
      'middlewares' => $middlewares
    ];
  }

  private function validateVarPatternFormat(array $uriVarList): bool
  {
    foreach ($uriVarList as $value) {
      $nameAndPattern = explode(':', $value);

      if (!(count($nameAndPattern) === 2)) {
        return false;
      }

      if (!preg_match('/^[a-z]+(?:_[a-z]+)*$/', trim($nameAndPattern[0])) || !in_array(trim($nameAndPattern[1]), array_keys($this->patternList))) {
        return false;
      }
    }

    return true;
  }

  private function getBaseUri(string $uri): array
  {
    $pattern = Router::VAR_PATTERN;

    preg_match_all($pattern, $uri, $matches);

    if (!$this->validateVarPatternFormat($matches[1])) {
      throw new Exception("There Is An Error In The Definition Syntax Of The Dynamic Parameter Of The $uri Route. Example: {param_name:%d}");
    }

    $varsUri = '/' . implode('/', $matches[0]);
    $baseUri = str_replace($varsUri, '', $uri);

    return [
      'base' => $baseUri,
      'vars' => $varsUri
    ];
  }

  private function addDynamicRoute(HttpMmethodsEnabled $httpMethod, string $uri, object $controller, string $method, array $middlewares = []): void
  {
    $uriParams = $this->getBaseUri($uri);
    $varsUri = $uriParams['vars'];
    $baseUri = $uriParams['base'];

    if (isset($this->staticRoutes[$httpMethod->name][$baseUri]) || isset($this->dynamicRoutes[$httpMethod->name][$baseUri])) {
      throw new Exception("The route $baseUri is already defined");
    }

    $this->dynamicRoutes[$httpMethod->name][$baseUri] = [
      'controller' => $controller,
      'method' => $method,
      'middlewares' => $middlewares,
      'vars' => $varsUri
    ];
  }

  private function addRoute(HttpMmethodsEnabled $httpMethod, string $uri, object $controller, string $method, array $middlewares = []): void
  {
    if (strpos($uri, ':') === false) {
      $this->addStaticRoute($httpMethod, $uri, $controller, $method, $middlewares);
    } else {
      $this->addDynamicRoute($httpMethod, $uri, $controller, $method, $middlewares);
    }
  }

  private function getListOfDynamicRoutes(HttpMmethodsEnabled $httpMethod): array
  {
    $uriKeys = array_keys($this->dynamicRoutes[$httpMethod->name] ?? []);

    usort($uriKeys, function ($a, $b) {
      return strlen($b) - strlen($a);
    });

    return $uriKeys;
  }

  private function getController(string $controllerNamespace): ?object
  {
    if (!class_exists($controllerNamespace)) {
      throw new Exception("Controller $controllerNamespace Does Not Exist");
    }

    $controller = new $controllerNamespace();

    return $controller;
  }

  private function getMethod(object $controller, string $methodName): ?string
  {
    if (!method_exists($controller, $methodName)) {
      throw new Exception("$methodName method does not exist in the $controller controller");
    }

    return $methodName;
  }

  private function getHandleController(string $handleController): array
  {
    $controllerNamespace = explode('@', $handleController)[0] ?? '';
    $methodName = explode('@', $handleController)[1] ?? '';

    $controller = $this->getController($controllerNamespace);
    $method = $this->getMethod($controller, $methodName);

    return [
      'controller' => $controller,
      'method' => $method
    ];
  }

  private function getValidMiddlewares(array $middlewares = []): ?array
  {
    if (empty($middlewares)) {
      return [];
    }

    foreach ($middlewares as $middlewareNamespace) {
      if (!class_exists($middlewareNamespace)) {
        throw new Exception("Middleware $middlewareNamespace Does Not Exist");
      }
    }

    return $middlewares;
  }

  public function get(string $uri, string $handleController, array $middlewares = []): void
  {
    $handleFields = $this->getHandleController($handleController);
    $middlewares = $this->getValidMiddlewares($middlewares);

    $this->addRoute(HttpMmethodsEnabled::GET, $uri, $handleFields['controller'], $handleFields['method'], $middlewares);
  }

  public function post(string $uri, string $handleController, array $middlewares = []): void
  {
    $handleFields = $this->getHandleController($handleController);
    $middlewares = $this->getValidMiddlewares($middlewares);

    $this->addRoute(HttpMmethodsEnabled::POST, $uri, $handleFields['controller'], $handleFields['method'], $middlewares);
  }

  private function getUrlPartContents(string $url): array
  {
    $urlContents = explode('/', $url);

    $urlContents = array_filter($urlContents, function ($value) {
      return $value !== '';
    });
    $urlContents = array_values($urlContents);

    return $urlContents;
  }

  private function getControllerAndMethodIfExists(): array
  {
    $requestUri = $this->request->getUri();
    $requestHttpMethod = $this->request->getHttpMethod();

    if (isset($this->staticRoutes[$requestHttpMethod->name][$requestUri])) {
      return [
        'controller' => $this->staticRoutes[$requestHttpMethod->name][$requestUri]['controller'],
        'method' => $this->staticRoutes[$requestHttpMethod->name][$requestUri]['method'],
        'middlewares' => $this->staticRoutes[$requestHttpMethod->name][$requestUri]['middlewares']
      ];
    }

    $dynamicBaseUri = $this->getListOfDynamicRoutes($requestHttpMethod);

    foreach ($dynamicBaseUri as $uri) {
      if (strpos($requestUri, $uri) !== false) {
        $varsPatterns = $this->getUrlPartContents($this->dynamicRoutes[$requestHttpMethod->name][$uri]['vars']);

        $requestUri = str_replace($uri, '', $requestUri);
        $varsReceived = $this->getUrlPartContents($requestUri);

        $fields = [];

        $index = 0;
        foreach ($varsPatterns as $value) {
          $pattern = Router::VAR_PATTERN;

          preg_match_all($pattern, $value, $matches);

          $fields[] = $matches[1][0];
          $index++;
        }

        if (count($varsReceived) > count($fields)) {
          return [
            'error' => "Route not found",
            'code' => 404
          ];
        }

        if (!empty($fields)) {
          for ($i = 0; $i < count($fields); $i++) {
            $varName = trim(explode(':', $fields[$i])[0]);
            $patternKey = trim(explode(':', $fields[$i])[1]);

            if (preg_match($this->patternList[$patternKey], $varsReceived[$i])) {
              $this->params[$varName] = $varsReceived[$i];
            } else {
              $this->params = [];

              return [
                'error' => "Invalid Parameter In The $requestUri URI",
                'code' => 400
              ];
            }
          }
        }

        return [
          'controller' => $this->dynamicRoutes[$requestHttpMethod->name][$uri]['controller'],
          'method' => $this->dynamicRoutes[$requestHttpMethod->name][$uri]['method'],
          'middlewares' => $this->staticRoutes[$requestHttpMethod->name][$requestUri]['middlewares']
        ];
      }
    }

    return [
      'error' => "Route not found",
      'code' => 404
    ];
  }

  public function run()
  {
    try {
      $routeValidity = $this->getControllerAndMethodIfExists();

      if (isset($routeValidity['error'])) {
        throw new Exception($routeValidity['error'], $routeValidity['code']);
      }

      $controller = $routeValidity['controller'];
      $method = $routeValidity['method'] ?? '';
      $middlewares = $routeValidity['middlewares'] ?? [];

      return (new Queu($controller, $method, $middlewares))->next($this->request, $this->params);
    } catch (Exception $exception) {
      return (new Response($exception->getMessage(), EnabledContentTypes::TextHtml, $exception->getCode()))->send();
    }
  }

  public function redirect(string $uri): never
  {
    header('location: ' . $this->baseUrl . $uri);
    exit;
  }
}
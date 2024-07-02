<?php

namespace App\Http;

use Exception;

class Request
{
  private string $uri;
  private array $headers;
  private HttpMmethodsEnabled $httpMethod;
  private array $postVars;
  private array $queryParams;
  private array $files;
  private Router $router;

  public function __construct(Router $router)
  {
    $this->router = $router;

    $this->uri = $_SERVER['REQUEST_URI'];
    $this->setHttpMethod();
    $this->headers = getallheaders();
    $this->postVars = $_POST ?? [];
    $this->queryParams = $_GET ?? [];
    $this->files = $_FILES ?? [];
  }

  public function getRouter(): Router
  {
    return $this->router;
  }

  private function setHttpMethod()
  {
    $method = $_SERVER['REQUEST_METHOD'] ?? '';

    switch ($method) {
      case 'GET':
        $this->httpMethod = HttpMmethodsEnabled::GET;
        break;

      case 'POST':
        $this->httpMethod = HttpMmethodsEnabled::POST;
        break;

      case 'PUT':
        $this->httpMethod = HttpMmethodsEnabled::PUT;
        break;

      case 'DELETE':
        $this->httpMethod = HttpMmethodsEnabled::DELETE;
        break;

      default:
        throw new Exception("Method Not Enabled", 400);
    }
  }

  public function getUri(): string
  {
    return $this->uri;
  }

  public function getHttpMethod(): HttpMmethodsEnabled
  {
    return $this->httpMethod;
  }

  public function getHeaders(): array
  {
    return $this->headers;
  }

  public function getPostVars(): array
  {
    return $this->postVars;
  }

  public function getQueryParams(): array
  {
    return $this->queryParams;
  }

  public function getFile(string $key): array
  {
    return $this->files[$key];
  }
}
<?php

namespace App\Http;

enum EnabledContentTypes: string
{
  case TextHtml = 'text/html';
  case ApplicationJson = 'application/json';
}

class Response
{
  private array $headers;
  private EnabledContentTypes $contentType;
  private int $httpCode;
  private mixed $body;

  public function __construct(mixed $body, EnabledContentTypes $contentType = EnabledContentTypes::TextHtml, int $httpCode = 200)
  {
    $this->body = $body;
    $this->setContentType($contentType);
    $this->httpCode = $httpCode;
  }

  private function setContentType(EnabledContentTypes $contentType)
  {
    $this->contentType = $contentType;
    $this->setHeaders('Content-Type', $contentType->name);
  }

  private function setHeaders(string $key, mixed $value)
  {
    $this->headers[$key] = $value;
  }

  private function sendHeaders()
  {
    http_response_code($this->httpCode);

    foreach ($this->headers as $key => $value) {
      header($key . ': ' . $value);
    }
  }

  public function send()
  {
    $this->sendHeaders();

    switch ($this->contentType) {
      case EnabledContentTypes::TextHtml:
        echo $this->body;
        exit;

      case EnabledContentTypes::ApplicationJson:
        echo json_encode($this->body, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }
  }
}
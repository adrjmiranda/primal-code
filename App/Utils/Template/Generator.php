<?php

namespace App\Utils\Template;

use Exception;

class Generator
{
  private static string $baseUrl;
  private static string $masterLayout = '';
  private static mixed $masterContent;
  private static array $masterData;

  private static function getTemplateFile(string $template): string
  {
    $folderName = explode('/', $template)[0] ?? '';
    $fileName = explode('/', $template)[1] ?? '';

    if (empty($folderName) || empty($fileName)) {
      throw new Exception("Invalid Template Name");
    }

    $path = __DIR__ . '/../../Views/' . $folderName . '/' . $fileName . '.php';

    if (!file_exists($path)) {
      throw new Exception("Template $fileName.php Does Not Exist");
    }

    return $path;
  }

  public static function view(string $template, array $data = [])
  {
    $templatePath = Generator::getTemplateFile($template);

    ob_start();

    extract($data);

    require_once $templatePath;

    $content = ob_get_contents();

    ob_end_clean();

    if (!empty(Generator::$masterLayout)) {
      Generator::$masterContent = $content;

      $allData = array_merge(Generator::$masterData, $data);

      $layout = Generator::$masterLayout;
      Generator::$masterLayout = '';

      return Generator::view($layout, $allData);
    }

    return $content;
  }

  private static function extendLayout(string $template, array $data = []): void
  {
    Generator::$masterLayout = $template;
    Generator::$masterData = $data;
  }

  private static function load()
  {
    return Generator::$masterContent;
  }
}
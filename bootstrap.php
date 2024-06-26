<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Http\Router;
use App\Settings\Session\Main;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Global Session Settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
ini_set('session.use_only_cookies', 1);

if ($_ENV['APPLICATION_STATUS'] === 'production') {
  ini_set('session.cookie_secure', 1);
}

ini_set('session.cookie_samesite', 'Strict');

Main::init();

$baseUrl = $_ENV['BASE_URL'];

$router = new Router($baseUrl);
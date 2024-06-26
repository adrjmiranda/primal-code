<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Http\Router;

$router = new Router($baseUrl);

$router->get('/', 'App\\Controllers\\Users\\HomeController@index');

$router->run();
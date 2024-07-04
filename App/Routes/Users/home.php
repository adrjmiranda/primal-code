<?php

$router->get('/', 'App\\Controllers\\Users\\HomeController@index');
$router->get('/about', 'App\\Controllers\\Users\\HomeController@about');
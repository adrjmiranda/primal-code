<?php

$router->get('/posts/{page:%d}', 'App\\Controllers\\Users\\HomeController@index');
$router->get('/about', 'App\\Controllers\\Users\\HomeController@about');
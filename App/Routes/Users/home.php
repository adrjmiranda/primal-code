<?php

$router->get('/', 'App\\Controllers\\Users\\HomeController@index');
$router->get('/about', 'App\\Controllers\\Users\\HomeController@about');
$router->get('/posts/category/{category_id:%d}', 'App\\Controllers\\Users\\HomeController@getPostsByCategory');
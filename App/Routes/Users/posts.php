<?php

$router->get('/post/{slug:%s}', 'App\\Controllers\\Users\\PostController@get', [
  'App\\Http\\Middlewares\\CSRF\\Create'
]);
$router->get('/posts/{page:%d}', 'App\\Controllers\\Users\\PostController@cards');

// Search

$router->post('/posts/search', 'App\\Controllers\\Users\\PostController@search');
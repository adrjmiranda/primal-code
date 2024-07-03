<?php

$router->get(
  '/authors/post/create',
  'App\\Controllers\\Authors\\PostController@create',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);

$router->post(
  '/authors/post/create',
  'App\\Controllers\\Authors\\PostController@store',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);

$router->get(
  '/authors/post/edit/{id:%d}',
  'App\\Controllers\\Authors\\PostController@edit',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);

$router->post(
  '/authors/post/update',
  'App\\Controllers\\Authors\\PostController@update',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);

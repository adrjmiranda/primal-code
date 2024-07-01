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

<?php

$router->get(
  '/authors/login',
  'App\\Controllers\\Authors\\LoginController@index',
  ['App\\Http\\Middlewares\\Authors\\RequireLogout']
);
$router->post(
  '/authors/login',
  'App\\Controllers\\Authors\\LoginController@login',
  ['App\\Http\\Middlewares\\Authors\\RequireLogout']
);

$router->get(
  '/authors/logout',
  'App\\Controllers\\Authors\\LogoutController@logout',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);
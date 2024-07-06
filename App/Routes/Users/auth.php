<?php

// Login

$router->get(
  '/users/login',
  'App\\Controllers\\Users\\LoginController@index',
  [
    'App\\Http\\Middlewares\\Users\\RequireLogout',
    'App\\Http\\Middlewares\\CSRF\\Create'
  ]
);
$router->post(
  '/users/login',
  'App\\Controllers\\Users\\LoginController@login',
  [
    'App\\Http\\Middlewares\\Users\\RequireLogout',
    'App\\Http\\Middlewares\\CSRF\\Checks'
  ]
);

// Register

$router->get(
  '/users/register',
  'App\\Controllers\\Users\\RegisterController@index',
  [
    'App\\Http\\Middlewares\\Users\\RequireLogout',
    'App\\Http\\Middlewares\\CSRF\\Create'
  ]
);

$router->post(
  '/users/register',
  'App\\Controllers\\Users\\RegisterController@register',
  [
    'App\\Http\\Middlewares\\Users\\RequireLogout',
    'App\\Http\\Middlewares\\CSRF\\Checks'
  ]
);

// Logout

$router->get(
  '/users/logout',
  'App\\Controllers\\Users\\LogoutController@logout',
  ['App\\Http\\Middlewares\\Users\\RequireLogin']
);
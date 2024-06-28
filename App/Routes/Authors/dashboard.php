<?php

$router->get(
  '/authors/dashboard',
  'App\\Controllers\\Authors\\DashboardController@index',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);
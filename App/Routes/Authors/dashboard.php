<?php

$router->get(
  '/authors/dashboard/{session:%s}',
  'App\\Controllers\\Authors\\DashboardController@index',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);
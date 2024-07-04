<?php

$router->get(
  '/authors/dashboard/{session:%s}/{page:?d}',
  'App\\Controllers\\Authors\\DashboardController@index',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);
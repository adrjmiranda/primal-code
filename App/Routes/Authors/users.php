<?php

$router->get(
  '/authors/user/remove/{id:%d}',
  'App\\Controllers\\Authors\\UserController@remove',
  ['App\\Http\\Middlewares\\Authors\\RequireLogin']
);
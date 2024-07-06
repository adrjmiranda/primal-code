<?php

$router->post(
  '/post/comment',
  'App\\Controllers\\Users\\CommentController@sendComment',
  [
    'App\\Http\\Middlewares\\Users\\RequireLogin',
    'App\\Http\\Middlewares\\CSRF\\Checks'
  ]
);

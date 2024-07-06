<?php

$router->get(
  '/api/v1/posts',
  'App\Api\V1\Controllers\\PostController@index',
  []
);
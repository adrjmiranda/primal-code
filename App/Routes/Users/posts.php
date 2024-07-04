<?php

$router->get('/post/{slug:%s}', 'App\\Controllers\\Users\\PostController@get');
$router->get('/posts/{page:%d}', 'App\\Controllers\\Users\\PostController@cards');
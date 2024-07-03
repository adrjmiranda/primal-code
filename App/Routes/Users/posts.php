<?php

$router->get('/post/{slug:%s}', 'App\\Controllers\\Users\\PostController@get');
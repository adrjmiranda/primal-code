<?php

namespace App\Controllers\Users;

use App\Utils\Template\Generator;

class HomeController
{
  public static function index()
  {
    return Generator::view('Users/index');
  }
}
<?php

namespace App\Settings\Session\Authors;

use App\Settings\Session\Main;

class Config extends Main
{
  public function __construct()
  {
  }

  public static function isLoggedIn(): bool
  {
    parent::init();
    return isset($_SESSION['authors']);
  }
}
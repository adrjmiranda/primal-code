<?php

namespace App\Settings\Session\Users;

use App\Settings\Session\Main;

class Config extends Main
{
  public function __construct()
  {
    parent::__construct('users');
  }

  public static function isLoggedIn(): bool
  {
    parent::init();
    return isset($_SESSION['users']);
  }
}
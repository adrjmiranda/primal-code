<?php

namespace App\Settings\Session\Users;

use App\Settings\Session\Main;
use App\Settings\Session\SessionKeyNames;

class Config extends Main
{
  public function __construct()
  {
    parent::__construct(SessionKeyNames::Users);
  }

  public static function isLoggedIn(): bool
  {
    parent::init();
    return isset($_SESSION[SessionKeyNames::Users->value]);
  }
}
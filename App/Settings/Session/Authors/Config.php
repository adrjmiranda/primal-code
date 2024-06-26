<?php

namespace App\Settings\Session\Authors;

use App\Settings\Session\Main;
use App\Settings\Session\SessionKeyNames;

class Config extends Main
{
  public function __construct()
  {
    parent::__construct(SessionKeyNames::Authors);
  }

  public static function isLoggedIn(): bool
  {
    parent::init();
    return isset($_SESSION[SessionKeyNames::Authors->value]);
  }
}
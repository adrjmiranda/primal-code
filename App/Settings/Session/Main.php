<?php

namespace App\Settings\Session;

enum SessionKeyNames: string
{
  case Users = 'users';
  case Authors = 'authors';
}

class Main
{
  public static SessionKeyNames $sessionKey;

  public function __construct(SessionKeyNames $sessionKey)
  {
    self::$sessionKey = $sessionKey;
  }

  public static function init(): void
  {
    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $_ENV['APPLICATION_STATUS'] === 'production' ? true : false,
        'httponly' => true,
        'samesite' => 'Strict'
      ]);

      session_start();

      if (!isset($_SESSION['initialized'])) {
        session_regenerate_id(true);
        $_SESSION['initialized'] = true;
      }
    }
  }

  public static function setSession(object $user): void
  {
    self::init();

    $_SESSION[self::$sessionKey->value]['id'] = $user->id;
    $_SESSION[self::$sessionKey->value]['name'] = $user->name;
    $_SESSION[self::$sessionKey->value]['email'] = $user->email;
  }

  public static function logout(): void
  {
    self::init();

    if (isset($_SESSION[SessionKeyNames::Authors->value]) && isset($_SESSION[SessionKeyNames::Users->value])) {
      unset($_SESSION[self::$sessionKey->value]);
      return;
    }

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
      );
    }

    session_destroy();
  }
}
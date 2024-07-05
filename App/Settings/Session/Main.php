<?php

namespace App\Settings\Session;

class Main
{
  public function __construct(string $sessionKey)
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

  public static function setSession(object $user, string $sessionKey): void
  {
    self::init();

    $_SESSION[$sessionKey]['id'] = $user->id;
    $_SESSION[$sessionKey]['name'] = $user->name;
    $_SESSION[$sessionKey]['email'] = $user->email;
  }

  public static function logout(string $sessionKey): void
  {
    self::init();

    if (isset($_SESSION['authors']) && isset($_SESSION['users'])) {
      unset($_SESSION[$sessionKey]);
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
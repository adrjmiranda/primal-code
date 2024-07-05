<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Models\UserModel;
use App\Settings\Session\Users\Config;
use App\Utils\Template\Generator;

class LoginController
{
  public function index(Request $request, array $params, array $data = [])
  {
    return Generator::render('Users/login', $data);
  }

  public function login(Request $request, array $params)
  {
    $data = $request->getPostVars();

    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    $user = new UserModel;

    $user = $user->findOne('email', $email);

    if (!($user instanceof UserModel)) {
      return $this->index($request, $params, [
        'email' => $email,
        'password' => $password,
        'email_error' => 'Unregistered user',
        'password_error' => ''
      ]);
    }

    if (!password_verify($password, $user->password)) {
      return $this->index($request, $params, [
        'email' => $email,
        'password' => $password,
        'email_error' => '',
        'password_error' => 'Incorrect password'
      ]);
    }

    (new Config)::setSession($user, 'users');

    $request->getRouter()->redirect('/');
  }
}
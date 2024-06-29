<?php

namespace App\Controllers\Authors;

use App\Settings\Session\Authors\Config;
use App\Models\AuthorModel;
use App\Utils\Template\Generator;
use App\Http\Request;

class LoginController
{
  public function index(Request $request, array $params, array $data = [])
  {
    return Generator::render('Authors/login', $data);
  }

  public function login(Request $request, array $params)
  {
    $data = $request->getPostVars();

    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';

    $author = new AuthorModel;

    $user = $author->findOne('email', $email);

    if (!($user instanceof AuthorModel)) {
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

    (new Config())::setSession($user);

    $request->getRouter()->redirect('/authors/dashboard/posts');
  }
}
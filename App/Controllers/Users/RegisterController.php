<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Models\UserModel;
use App\Settings\Session\Users\Config;
use App\Utils\Template\Generator;
use App\Utils\Validations\EvaluateUserRegister;

class RegisterController
{
  public function index(Request $request, array $params, array $data = [])
  {
    return Generator::render('Users/register', $data);
  }

  public function register(Request $request, array $params)
  {
    $userData = $request->getPostVars();

    $name = $userData['name'] ?? '';
    $email = $userData['email'] ?? '';
    $password = $userData['password'] ?? '';
    $passwordConfirmation = $userData['password_confirmation'] ?? '';

    $dataForEvaluation = [
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'password_confirmation' => $passwordConfirmation,
      'password_confirmation_match' => [
        'password' => $password,
        'password_confirmation' => $passwordConfirmation,
      ]
    ];

    $errors = (new EvaluateUserRegister)->getErrors($dataForEvaluation);

    if (!empty($errors)) {
      $data['data'] = $dataForEvaluation;
      $data['errors'] = $errors;

      return $this->index($request, $params, $data);
    }

    $user = new UserModel;

    $user->name = $name;
    $user->email = $email;
    $user->password = password_hash($password, PASSWORD_DEFAULT);

    $userId = $user->store();

    if ($userId) {
      $user->id = $userId;
      (new Config)::setSession($user, 'users');

      $request->getRouter()->redirect('/');
    } else {
      $data['data'] = $dataForEvaluation;
      $data['errors']['register'] = 'Unable to register';

      return $this->index($request, $params, $data);
    }
  }
}
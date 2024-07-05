<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Models\UserModel;

class UserController
{
  public function remove(Request $request, array $params)
  {
    $id = (int) ($params['id'] ?? '');

    $user = (new UserModel)->findOne('id', $id) ?? null;

    if ($user instanceof UserModel) {
      $user->delete();

      $request->getRouter()->redirect('/authors/dashboard/users');
    } else {
      $request->getRouter()->redirect('/authors/dashboard/users');
    }
  }
}
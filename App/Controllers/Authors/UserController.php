<?php

namespace App\Controllers\Authors;

use App\Http\Request;
use App\Models\CommentModel;
use App\Models\UserModel;

class UserController
{
  public function remove(Request $request, array $params)
  {
    $id = (int) ($params['id'] ?? '');

    $user = (new UserModel)->findOne('id', $id) ?? null;

    if ($user instanceof UserModel) {
      if ($user->delete()) {
        (new CommentModel)->removeSpecific('user_id', $id);
      }

      $request->getRouter()->redirect('/authors/dashboard/users');
    } else {
      $request->getRouter()->redirect('/authors/dashboard/users');
    }
  }
}
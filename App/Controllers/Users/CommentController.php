<?php

namespace App\Controllers\Users;

use App\Http\Request;
use App\Models\CommentModel;
use App\Models\PostModel;
use App\Utils\Validations\EvaluateCommentSend;

class CommentController
{
  public function sendComment(Request $request, array $params)
  {
    $commentData = $request->getPostVars();

    $comment = $commentData['comment'] ?? '';
    $postId = (int) ($commentData['post_id'] ?? '');

    $userId = (int) ($_SESSION['users']['id'] ?? '');

    $dataToBeEvaluated = [
      'comment' => $comment,
      'post_id' => $postId,
      'user_id' => $userId,
    ];

    $errors = (new EvaluateCommentSend)->getErrors($dataToBeEvaluated);

    if (!empty($errors)) {
      $request->getRouter()->redirect('/');
    }

    $commentAlreadyMadeOnThisPost = (new CommentModel)->getCommentByUserIdAndPostId($userId, $postId) ?? null;

    if ($commentAlreadyMadeOnThisPost instanceof CommentModel) {
      $request->getRouter()->redirect('/');
    }

    $newComment = new CommentModel;

    $newComment->content = $comment;
    $newComment->post_id = $postId;
    $newComment->user_id = $userId;

    if ($newComment->store()) {
      $post = (new PostModel)->findOne('id', $postId) ?? null;

      if ($post instanceof PostModel) {
        $slug = $post->slug;
        $request->getRouter()->redirect("/post/$slug");
      }
    }

    $request->getRouter()->redirect('/');
  }
}
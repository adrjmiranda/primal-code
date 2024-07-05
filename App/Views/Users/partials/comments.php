<?php
use App\Models\UserModel;

$userEntity = new UserModel;
?>

<div id="comments">
  <div class="container">

    <?php if (count($comments) > 0): ?>
      <h3>Comments:</h3>
      <div class="content">

        <?php foreach ($comments as $comment): ?>
          <div class="comment">
            <div class="comment-header">
              <div class="user-info">
                <img src="<?= $base_url ?>/img/users/avatar.png" alt="<?= $userEntity->getName($comment->user_id) ?>" />
                <span class="user-name"><?= $userEntity->getName($comment->user_id) ?></span>
              </div>
              <div class="date"><?= (new DateTime($comment->created_at))->format('F jS, Y') ?></div>
            </div>
            <div class="comment-text">
              <p><?= $comment->content ?></p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    <?php endif; ?>
  </div>
</div>
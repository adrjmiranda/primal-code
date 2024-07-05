<?php if (!$comment_already_made_on_this_post): ?>
  <div id="comment-area">
    <div class="container">
      <div class="content">
        <form action="/post/comment" id="comment-form" method="post">
          <input type="hidden" name="post_id" value="<?= $post->id ?>">

          <label for="comment">Leave your comment about the post:</label>
          <textarea name="comment" id="comment" placeholder="Your comment..."></textarea>

          <button type="submit" class="btn btn-secondary">
            Send comment
          </button>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>
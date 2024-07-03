<div class="post-card">
  <div class="img">
    <img src="<?= $base_url ?>/img/posts/<?= $post->image_url ?>.jpg" alt="<?= $post->title ?>" loading="lazy" />
  </div>

  <div class="info">
    <h3 class="title"><?= $post->title ?></h3>
    <span class="date"><?= (new DateTime($post->updated_at))->format('F jS, Y') ?></span>
    <p class="description">
      Lorem ipsum dolor sit amet consectetur, adipisicing elit.
      Pariatur velit iusto debitis ipsa ipsum similique autem.
    </p>
  </div>

  <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
</div>
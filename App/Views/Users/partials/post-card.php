<div class="post-card">
  <div class="img">
    <img src="<?= $base_url ?>/img/posts/<?= $post->image_url ?>" alt="<?= $post->title ?>" loading="lazy" />
  </div>

  <div class="info">
    <h3 class="title"><?= $post->title ?></h3>
    <span class="date"><?= (new DateTime($post->updated_at))->format('F jS, Y') ?></span>
    <p class="description"><?= $post->description ?></p>
  </div>

  <a href="/post/<?= $post->slug ?>" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
</div>
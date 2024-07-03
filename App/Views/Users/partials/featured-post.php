<div id="featured-post">
  <div class="img">
    <img src="<?= $base_url ?>/img/posts/<?= $featured_post->image_url ?>" alt="<?= $featured_post->title ?>"
      loading="lazy" />
  </div>

  <div class="info">
    <h2 class="title"><?= $featured_post->title ?></h2>
    <span class="date"><?= (new DateTime($featured_post->updated_at))->format('F jS, Y') ?></span>
    <p class="description"><?= $featured_post->description ?></p>
  </div>

  <a href="/post/<?= $featured_post->slug ?>" class="btn-read">Read<ion-icon name="book-outline"></ion-icon></a>
</div>
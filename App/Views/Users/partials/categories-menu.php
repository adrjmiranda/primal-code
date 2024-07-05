<ul class="categories-menu">
  <button class="left-btn">
    <ion-icon name="caret-back-outline"></ion-icon>
  </button>
  <button class="right-btn">
    <ion-icon name="caret-forward-outline"></ion-icon>
  </button>

  <li><a href="/">All</a></li>

  <?php foreach ($categories as $category): ?>
    <li><a href="/posts/category/<?= $category->id ?>"><?= $category->name ?></a></li>
  <?php endforeach; ?>
</ul>
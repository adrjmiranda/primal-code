<div class="categories-bar">
  <h4 class="title">Categories</h4>
  <ul class="categories-menu">
    <li><a href="#">All</a></li>

    <?php foreach ($categories as $category): ?>
      <li><a href="#"><?= $category->name ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>
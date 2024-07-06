<div id="pagination-bar">
  <div class="container">
    <?php if (($page_number - 1) > 0): ?>
      <a href="/posts/<?= $page_number - 1 ?>" class="link-arrow">
        <ion-icon name="caret-back-circle-outline"></ion-icon>
      </a>
    <?php endif; ?>

    <ul>
      <?php if (($page_number - 1) > 0): ?>
        <li><a href="/posts/<?= $page_number - 1 ?>"><?= $page_number - 1 ?></a></li>
      <?php endif; ?>

      <li><a href="/posts/<?= $page_number ?>" class="active"><?= $page_number ?></a></li>

      <?php if (($page_number + 1) <= $number_of_pages): ?>
        <li><a href="/posts/<?= $page_number + 1 ?>"><?= $page_number + 1 ?></a></li>
      <?php endif; ?>

      <?php if ($page_number < ($number_of_pages - 2)): ?>
        <span style="display: flex; align-items: flex-end; color: white;">...</span>
        <li><a href="/posts/<?= $number_of_pages ?>"><?= $number_of_pages ?></a></li>
      <?php endif; ?>
    </ul>

    <?php if (($page_number + 1) < $number_of_pages): ?>
      <a href="/posts/<?= $page_number + 1 ?>" class="link-arrow">
        <ion-icon name="play-circle-outline"></ion-icon>
      </a>
    <?php endif; ?>
  </div>
</div>
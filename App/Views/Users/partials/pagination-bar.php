<div id="pagination-bar">
  <div class="container">
    <ul>
      <?php for ($index = 1; $index <= $number_of_pages; $index++): ?>
        <li><a href="/posts/<?= $index ?>"><?= $index ?></a></li>
      <?php endfor; ?>
    </ul>
  </div>
</div>
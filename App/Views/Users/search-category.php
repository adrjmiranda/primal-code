<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Users/master');
?>


<!-- Header -->

<header>
  <!-- Navbar -->

  <?php require_once __DIR__ . '/partials/navbar-home.php'; ?>
</header>

<h1 class="container" style="margin-top: 2rem;">Search results for category: <span
    style="font-weight: 900; font-size: 2rem; text-transform: uppercase; color: white;"><?= $category_key ?></span>
</h1>

<?php if (!empty($posts)): ?>
  <main id="posts-container" style="min-height: calc(100vh - 533px);">
    <div class="container">
      <!-- Posts -->

      <div id="posts">
        <?php foreach ($posts as $post): ?>
          <?php require __DIR__ . '/partials/post-card.php'; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

<?php else: ?>
  <div style="min-height: calc(100vh - 533px);">

    <p style="font-style: italic; font-weight: bold; text-align: center; margin: 4rem 0">No posts published...</p>
  </div>
<?php endif; ?>

<!-- Footer -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>

<!-- Ion Icons -->

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
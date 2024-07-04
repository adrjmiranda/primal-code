<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Users/master');
?>


<!-- Header -->

<header>
  <!-- Navbar -->

  <?php require_once __DIR__ . '/partials/navbar-home.php'; ?>

  <!-- Banner -->

  <div id="banner">
    <div class="container">
      <div class="left">
        <h1>Programming</h1>
        <p>
          Welcome to <span>Primal Code</span>, your definitive guide to the
          world of technology.
        </p>
      </div>

      <div class="right">
        <img src="<?= $base_url ?>/img/robot.png" alt="Robot" loading="eager" />
      </div>
    </div>
  </div>
</header>

<!-- Categories Bar -->

<div id="category-bar">
  <div class="container">
    <?php require __DIR__ . '/partials/categories-menu.php'; ?>
  </div>
</div>

<?php if (!empty($posts)): ?>
  <main id="posts-container">
    <div class="container">
      <!-- Featured Post -->

      <?php if (isset($featured_post)): ?>
        <?php require __DIR__ . '/partials/featured-post.php'; ?>
      <?php endif; ?>


      <!-- Posts -->

      <div id="posts">
        <?php foreach ($posts as $post): ?>
          <?php require __DIR__ . '/partials/post-card.php'; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <!-- Pagination Bar -->

  <?php require_once __DIR__ . '/partials/pagination-bar.php'; ?>

<?php else: ?>
  <p style="font-style: italic; font-weight: bold; text-align: center; margin: 4rem 0">No posts published...</p>
<?php endif; ?>

<!-- Footer -->

<?php require_once __DIR__ . '/partials/footer.php'; ?>

<!-- Ion Icons -->

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
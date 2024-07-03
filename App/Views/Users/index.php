<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Users/master');
?>


<!-- Header -->

<header>
  <!-- Navbar -->

  <nav id="navbar">
    <div class="container">
      <a href="/" class="logo">
        <img src="<?= $base_url ?>/img/code.png" alt="Primal Code Logo" loading="eager" />Primal Code
      </a>

      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#" id="login-btn">Login</a></li>
      </ul>

      <form action="#">
        <input type="search" name="search" id="search" placeholder="Search..." />
        <button type="submit">
          <ion-icon name="search-outline"></ion-icon>
        </button>
      </form>
    </div>

    <button type="button" id="toggle-menu">
      <ion-icon name="menu-outline"></ion-icon>
    </button>
  </nav>

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

      <?php require __DIR__ . '/partials/featured-post.php'; ?>

      <!-- Posts -->

      <div id="posts">
        <?php foreach ($posts as $post): ?>
          <?php require __DIR__ . '/partials/post-card.php'; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <!-- Pagination Bar -->

  <div id="pagination-bar">
    <div class="container">
      <ul>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">...</a></li>
        <li><a href="#">22</a></li>
        <li><a href="#">21</a></li>
      </ul>
    </div>
  </div>

<?php else: ?>
  <p style="font-style: italic; font-weight: bold; text-align: center; margin: 4rem 0">No posts published...</p>
<?php endif; ?>

<!-- Footer -->

<footer>
  <div class="container">
    <div class="info">
      <div class="col">
        <a href="#" class="logo">
          <img src="<?= $base_url ?>/img/code.png" alt="Primal Code Logo" loading="lazy" />Primal Code
        </a>

        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima
          officiis accusantium magnam consectetur placeat obcaecati,
          molestias quam, nulla assumenda tenetur deserunt voluptates earum
          provident nobis nostrum, quibusdam repellat in dolor.
        </p>
      </div>

      <div class="col">
        <h4>Menu</h4>

        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Categories</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#" class="login-btn">Login</a></li>
        </ul>
      </div>

      <div class="col">
        <h4>Contact us</h4>

        <form action="#">
          <input type="email" name="email" placeholder="Your best e-mail" />
          <textarea name="message" id="message" placeholder="Your message"></textarea>
          <button class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>

    <div class="bottom-footer">
      <p>
        Made with
        <ion-icon name="heart" style="color: crimson"></ion-icon> by
        <span>Adriano Miranda</span> &copy; 2024
      </p>
    </div>
  </div>
</footer>

<!-- Ion Icons -->

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
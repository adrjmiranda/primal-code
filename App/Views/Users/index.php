<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Users/master');
?>


<!-- Header -->

<header>
  <!-- Navbar -->

  <nav id="navbar">
    <div class="container">
      <a href="#" class="logo">
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
    <ul class="categories-menu">
      <button class="left-btn">
        <ion-icon name="caret-back-outline"></ion-icon>
      </button>
      <button class="right-btn">
        <ion-icon name="caret-forward-outline"></ion-icon>
      </button>
      <li><a href="#">All</a></li>
      <li><a href="#">Web Development</a></li>
      <li><a href="#">Programming</a></li>
      <li><a href="#">Technology</a></li>
      <li><a href="#">Software Development</a></li>
      <li><a href="#">Mobile</a></li>
      <li><a href="#">Database</a></li>
      <li><a href="#">Career in Technology</a></li>
      <li><a href="#">Information Security</a></li>
      <li><a href="#">Data Analysis</a></li>
      <li><a href="#">Tutorials and Guides</a></li>
      <li><a href="#">News and Trends</a></li>
      <li><a href="#">Open Source</a></li>
    </ul>
  </div>
</div>

<main id="posts-container">
  <div class="container">
    <!-- Featured Post -->

    <div id="featured-post">
      <div class="img">
        <img src="<?= $base_url ?>/img/post_14.jpg" alt="..." loading="lazy" />
      </div>

      <div class="info">
        <h2 class="title">
          Great technology
          milestonecccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc
        </h2>
        <span class="date">October 6th, 1981</span>
        <p class="description">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur
          velit iusto debitis ipsa ipsum similique
          autem.weeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
        </p>
      </div>

      <a href="#" class="btn-read">Read<ion-icon name="book-outline"></ion-icon></a>
    </div>

    <!-- Posts -->

    <div id="posts">
      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_1.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">
            Great technology milestonesdddddddddddddddddddddddddd
          </h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique
            autem.dssssssssssssssssssssssssssssssssssssssssssssssssssssssssrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_2.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_3.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_4.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_5.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_6.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_7.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_8.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_9.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_10.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>

      <div class="post-card">
        <div class="img">
          <img src="<?= $base_url ?>/img/post_11.jpg" alt="..." loading="lazy" />
        </div>

        <div class="info">
          <h3 class="title">Great technology milestone</h3>
          <span class="date">October 6th, 1981</span>
          <p class="description">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Pariatur velit iusto debitis ipsa ipsum similique autem.
          </p>
        </div>

        <a href="#" class="post-link"><ion-icon name="book-outline"></ion-icon>Read</a>
      </div>
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
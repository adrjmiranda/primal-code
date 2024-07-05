<nav id="navbar">
  <div class="container">
    <a href="/" class="logo">
      <img src="<?= $base_url ?>/img/code.png" alt="Primal Code Logo" loading="eager" />Primal Code
    </a>

    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="#">Contact</a></li>

      <?php if (isset($_SESSION['users'])): ?>
        <li><a href="/users/logout" id="login-btn">Logout</a></li>
      <?php else: ?>
        <li><a href="/users/login" id="login-btn">Login</a></li>
      <?php endif; ?>
    </ul>
  </div>

  <button type="button" id="toggle-menu">
    <ion-icon name="menu-outline"></ion-icon>
  </button>
</nav>
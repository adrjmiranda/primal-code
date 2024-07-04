<nav id="navbar">
  <div class="container">
    <a href="#" class="logo">
      <img src="<?= $base_url ?>/img/code.png" alt="Primal Code Logo" loading="eager" />Primal Code
    </a>

    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
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
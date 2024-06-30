<div class="content-header">
  <div class="inner">
    <button type="button" id="toggle-menu-btn" data-active="true">
      <ion-icon name="menu"></ion-icon>
    </button>

    <h1 class="session-title"><?= $session_title ?></h1>

    <div class="authors-info">
      <div class="info">
        <span>Welcome!</span>
        <a href="#"><?= $_SESSION['authors']['name'] ?></a>
      </div>

      <img src="<?= $base_url ?>/img/avatar.png" alt="<?= $_SESSION['authors']['name'] ?>" />
    </div>
  </div>
</div>
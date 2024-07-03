<div class="side-menu">
  <div class="inner">
    <button type="button" id="close-mobile-menu">
      <ion-icon name="arrow-undo"></ion-icon>
    </button>

    <div class="menu-header">
      <img src="<?= $base_url ?>/img/code.png" alt="Primal Code Logo" loading="eager" />
      <h3>Primal Code</h3>
    </div>

    <ul class="menu">
      <li>
        <a href="/authors/dashboard/posts" class="<?= $active_session === 'posts' ? 'active' : '' ?>"><ion-icon
            name="book"></ion-icon>Posts</a>
      </li>

      <li>
        <a href="/authors/dashboard/users" class="<?= $active_session === 'users' ? 'active' : '' ?>"><ion-icon
            name="people"></ion-icon>Users</a>
      </li>

      <li>
        <a href="/authors/dashboard/authors" class="<?= $active_session === 'authors' ? 'active' : '' ?>"><ion-icon
            name="people-circle"></ion-icon>Authors</a>
      </li>

      <li>
        <a href="/authors/post/create" class="<?= $active_session === 'create-post' ? 'active' : '' ?>"><ion-icon
            name="add-circle"></ion-icon>New post</a>
      </li>
    </ul>

    <a href="/authors/logout" class="btn btn-secondary" id="logout-btn">Logout</a>
  </div>
</div>
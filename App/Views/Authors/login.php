<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Authors/auth');
?>


<div id="auth">
  <div class="container">
    <form action="/authors/login" method="post">
      <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

      <div class="form-header">
        <div class="logo">
          <img src="<?= $base_url ?>/img/code.png" alt="Primal Code Logo" loading="eager" />
          <h1>Primal Code</h1>
        </div>

        <p style="font-family: monospace">Welcome back!</p>
      </div>

      <div class="input-field">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="example@email.com" value="<?= $email ?>" />

        <p class="form_error"><?= !empty($email_error) ? $email_error : '' ?></p>
      </div>

      <div class="input-field">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Your password" value="<?= $password ?>" />

        <p class="form_error"><?= !empty($password_error) ? $password_error : '' ?></p>

        <div class="toggle-visibility-pass" data-area="pass">
          <button type="button" class="visible">
            <ion-icon name="eye-outline"></ion-icon>
          </button>
          <button type="button" class="hidden hide">
            <ion-icon name="eye-off-outline"></ion-icon>
          </button>
        </div>
      </div>

      <div class="input-field">
        <button type="submit" class="btn btn-primary">Enter</button>
      </div>
    </form>
  </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?= $base_url ?>/favicon.ico" type="image/x-icon" />
  <title>Primal Code | Authors</title>

  <!-- Styles -->

  <link rel="stylesheet" href="<?= $base_url ?>/css/authors/master.css" />

  <!-- Scripts -->

  <script defer src="<?= $base_url ?>/js/authors.js"></script>
</head>

<body>
  <div id="auth">
    <div class="container">
      <form action="<?= $base_url ?>/authors/login" method="post">
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

  <!-- Ion Icons -->

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
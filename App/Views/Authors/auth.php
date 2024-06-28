<?php
use App\Utils\Template\Generator;

?>

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
  <?= Generator::load() ?>
  <!-- Ion Icons -->

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
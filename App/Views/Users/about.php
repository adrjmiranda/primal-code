<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?= $base_url ?>/favicon.ico" type="image/x-icon" />
	<title>Primal Code</title>

	<!-- Styles -->

	<link rel="stylesheet" href="<?= $base_url ?>/css/users/master.css" />

	<!-- Scripts -->

	<script defer src="<?= $base_url ?>/js/users.js"></script>
</head>

<body>
	<!-- Header -->

	<header>
		<!-- Navbar -->

		<?php require_once __DIR__ . '/partials/navbar-about.php'; ?>
	</header>

	<!-- About -->

	<div id="about">
		<div class="container">
			<h1>About <span>Primal Code</span></h1>

			<div class="content">
				<div class="row">
					<div class="text">
						<h2>About us</h2>
						<p>
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Mollitia rem voluptatum quibusdam sunt maxime at ut? Beatae a
							aliquam, eaque, dolorem tenetur quam, quo sequi odit nam nemo
							magni. Quod!
						</p>
						<p>
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Mollitia rem voluptatum quibusdam sunt maxime at ut? Beatae a
							aliquam, eaque, dolorem tenetur quam, quo sequi odit nam nemo
							magni. Quod!
						</p>
						<p>
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Mollitia rem voluptatum quibusdam sunt maxime at ut? Beatae a
							aliquam, eaque, dolorem tenetur quam, quo sequi odit nam nemo
							magni. Quod!
						</p>
					</div>

					<img src="<?= $base_url ?>/img/brain_and_heart.png" alt="Brain And Heart" />
				</div>
				<div class="row">
					<img src="<?= $base_url ?>/img/mini_robot.png" alt="Brain And Heart" />

					<div class="text">
						<h2>Our mission</h2>
						<p>
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Mollitia rem voluptatum quibusdam sunt maxime at ut? Beatae a
							aliquam, eaque, dolorem tenetur quam, quo sequi odit nam nemo
							magni. Quod!
						</p>
						<p>
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Mollitia rem voluptatum quibusdam sunt maxime at ut? Beatae a
							aliquam, eaque, dolorem tenetur quam, quo sequi odit nam nemo
							magni. Quod!
						</p>
						<p>
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Mollitia rem voluptatum quibusdam sunt maxime at ut? Beatae a
							aliquam, eaque, dolorem tenetur quam, quo sequi odit nam nemo
							magni. Quod!
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?php require_once __DIR__ . '/partials/footer.php'; ?>

	<!-- Ion Icons -->

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
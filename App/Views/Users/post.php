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

		<?php require_once __DIR__ . '/partials/navbar-post.php'; ?>
	</header>

	<!-- Post -->

	<div id="post">
		<div class="container">
			<!-- Content -->

			<div class="content">
				<div class="img">
					<img src="<?= $base_url ?>/img/posts/<?= $post->image_url ?>" alt="<?= $post->title ?>" />
				</div>

				<div class="info">
					<h1 class="title"><?= $post->title ?></h1>
					<p class="date"><?= (new DateTime($post->updated_at))->format('F jS, Y') ?></p>
					<p class="description"><?= $post->description ?></p>
				</div>

				<div class="text-content">
					<p class="description"><?= $post->content ?></p>
				</div>
			</div>

			<!-- Side Bar -->

			<aside id="side-bar">
				<div class="search-area">
					<h4 class="title">Search</h4>

					<?php require_once __DIR__ . '/partials/search-form.php'; ?>
				</div>

				<?php require_once __DIR__ . '/partials/categories-bar.php'; ?>
			</aside>
		</div>
	</div>

	<!-- Author -->

	<div id="author">
		<div class="container">
			<div class="content">
				<div class="img">
					<img src="<?= $base_url ?>/img/authors/avatar.png" alt="..." />
				</div>

				<div class="info">
					<h3 class="name"><span>Author:</span> Adriano Miranda</h3>
					<p class="description">
						Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde,
						tempora sit. Quam laborum excepturi quas id ad, corrupti earum vel
						quasi minus assumenda placeat ex, architecto corporis eligendi rem
						vitae?
					</p>

					<div class="social-media">
						<ul>
							<li>
								<a href="#" target="_blank">
									<ion-icon name="logo-linkedin"></ion-icon>
								</a>
							</li>

							<li>
								<a href="#" target="_blank">
									<ion-icon name="logo-instagram"></ion-icon>
								</a>
							</li>

							<li>
								<a href="#" target="_blank">
									<ion-icon name="logo-facebook"></ion-icon>
								</a>
							</li>

							<li>
								<a href="#" target="_blank">
									<ion-icon name="logo-twitter"></ion-icon>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Comment Area -->

	<?php require_once __DIR__ . '/partials/comment-area.php'; ?>

	<!-- Comments -->

	<?php require __DIR__ . '/partials/comments.php'; ?>


	<!-- Footer -->

	<?php require_once __DIR__ . '/partials/footer.php'; ?>

	<!-- Ion Icons -->

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
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

					<form action="#">
						<input type="search" name="search" id="search" placeholder="Search..." />
						<button type="submit">
							<ion-icon name="search-outline"></ion-icon>
						</button>
					</form>
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
					<img src="<?= $base_url ?>/img/avatar.png" alt="..." />
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

	<div id="comment-area">
		<div class="container">
			<div class="content">
				<form action="#" id="comment-form">
					<label for="comment">Leave your comment about the post:</label>
					<textarea name="comment" id="comment" placeholder="Your comment..."></textarea>

					<button type="submit" class="btn btn-secondary">
						Send comment
					</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Comments -->

	<div id="comments">
		<div class="container">
			<h3>Comments:</h3>

			<div class="content">
				<div class="comment">
					<div class="comment-header">
						<div class="user-info">
							<img src="<?= $base_url ?>/img/user_1.jpg" alt="..." />
							<span class="user-name">Jane Doe</span>
						</div>
						<div class="date">October 6th, 1981</div>
					</div>
					<div class="comment-text">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Reiciendis ad fugit odit aliquid excepturi numquam voluptatibus
							fuga quas aperiam vel provident, maxime commodi quam sit
							perspiciatis doloremque illo assumenda in.
						</p>
					</div>
				</div>

				<div class="comment">
					<div class="comment-header">
						<div class="user-info">
							<img src="<?= $base_url ?>/img/user_2.jpg" alt="..." />
							<span class="user-name">John Doe</span>
						</div>
						<div class="date">October 6th, 1981</div>
					</div>
					<div class="comment-text">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Reiciendis ad fugit odit aliquid excepturi numquam voluptatibus
							fuga quas aperiam vel provident, maxime commodi quam sit
							perspiciatis doloremque illo assumenda in.
						</p>
					</div>
				</div>

				<div class="comment">
					<div class="comment-header">
						<div class="user-info">
							<img src="<?= $base_url ?>/img/user_3.jpg" alt="..." />
							<span class="user-name">Jane Doe</span>
						</div>
						<div class="date">October 6th, 1981</div>
					</div>
					<div class="comment-text">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Reiciendis ad fugit odit aliquid excepturi numquam voluptatibus
							fuga quas aperiam vel provident, maxime commodi quam sit
							perspiciatis doloremque illo assumenda in.
						</p>
					</div>
				</div>

				<div class="comment">
					<div class="comment-header">
						<div class="user-info">
							<img src="<?= $base_url ?>/img/user_4.jpg" alt="..." />
							<span class="user-name">Jane Doe</span>
						</div>
						<div class="date">October 6th, 1981</div>
					</div>
					<div class="comment-text">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Reiciendis ad fugit odit aliquid excepturi numquam voluptatibus
							fuga quas aperiam vel provident, maxime commodi quam sit
							perspiciatis doloremque illo assumenda in.
						</p>
					</div>
				</div>

				<div class="comment">
					<div class="comment-header">
						<div class="user-info">
							<img src="<?= $base_url ?>/img/user_5.jpg" alt="..." />
							<span class="user-name">Jane Doe</span>
						</div>
						<div class="date">October 6th, 1981</div>
					</div>
					<div class="comment-text">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Reiciendis ad fugit odit aliquid excepturi numquam voluptatibus
							fuga quas aperiam vel provident, maxime commodi quam sit
							perspiciatis doloremque illo assumenda in.
						</p>
					</div>
				</div>
			</div>

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
</body>

</html>
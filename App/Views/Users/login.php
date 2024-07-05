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
	<div id="auth">
		<div class="container">
			<form action="#">
				<h1><ion-icon name="code-slash"></ion-icon>Login</h1>

				<div class="input-field">
					<label for="email"><ion-icon name="mail-outline"></ion-icon>E-mail</label>
					<input type="email" name="email" id="email" placeholder="Your email" />

					<p class="form_error"><?= !empty($email_error) ? $email_error : '' ?></p>
				</div>

				<div class="input-field">
					<label for="password"><ion-icon name="lock-closed-outline"></ion-icon>Password</label>
					<input type="password" name="password" id="password" placeholder="Your password" />

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

				<button type="submit" class="btn btn-secondary">Enter</button>

				<p class="toggle-form">
					Don't have an account yet? <a href="/users/register">Register</a>
				</p>
			</form>
		</div>
	</div>

	<!-- Ion Icons -->

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
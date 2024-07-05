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
			<form action="/users/register" method="post">
				<h1><ion-icon name="code-slash"></ion-icon>Register</h1>

				<div class="input-field">
					<label for="name"><ion-icon name="person-circle-outline"></ion-icon>Name</label>
					<input type="text" name="name" id="name" placeholder="Your name"
						value="<?= isset($data['name']) ? $data['name'] : '' ?>" />

					<p class="form_error"><?= isset($errors['name']) ? $errors['name'] : '' ?></p>
				</div>

				<div class="input-field">
					<label for="email"><ion-icon name="mail-outline"></ion-icon>E-mail</label>
					<input type="email" name="email" id="email" placeholder="Your email"
						value="<?= isset($data['email']) ? $data['email'] : '' ?>" />

					<p class="form_error"><?= isset($errors['email']) ? $errors['email'] : '' ?></p>
				</div>

				<div class="input-field">
					<label for="password"><ion-icon name="lock-closed-outline"></ion-icon>Password</label>
					<input type="password" name="password" id="password" placeholder="Your password"
						value="<?= isset($data['password']) ? $data['password'] : '' ?>" />

					<p class="form_error"><?= isset($errors['password']) ? $errors['password'] : '' ?></p>

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
					<label for="password_confirmation"><ion-icon name="lock-closed-outline"></ion-icon>Password
						confirmation</label>
					<input type="password" name="password_confirmation" id="password-confirmation"
						placeholder="Your password again"
						value="<?= isset($data['password_confirmation']) ? $data['password_confirmation'] : '' ?>" />

					<p class="form_error"><?= isset($errors['password_confirmation']) ? $errors['password_confirmation'] : '' ?>
					</p>

					<div class="toggle-visibility-pass" data-area="passconfirmation">
						<button type="button" class="visible">
							<ion-icon name="eye-outline"></ion-icon>
						</button>
						<button type="button" class="hidden hide">
							<ion-icon name="eye-off-outline"></ion-icon>
						</button>
					</div>
				</div>

				<button type="submit" class="btn btn-secondary">Register</button>

				<p class="toggle-form">
					Already have an account? <a href="/users/login">Login</a>
				</p>
			</form>
		</div>
	</div>

	<!-- Ion Icons -->

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
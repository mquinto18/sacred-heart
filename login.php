<?php
ob_start();
session_start();
require_once "inc/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<?php require_once "template-parts/head.php"; ?>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

		*,
		::before,
		::after {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		:root {
			--primary-clr: #374151;
			--secondary-clr: #FFFF;
			--third-clr: #666;
			--fourth-clr: #6b7280;
			--fifth-clr: #e5e7eb;
			--sixth-clr: #0d6efd;
			--seventh-clr: #212529;
			--eight-clr: #194F90;
		}

		.login-container {
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			background-image: url("img/img/login-bg.jpg");
			background-position: center;
		}

		#login-page {
			background-color: var(--secondary-clr);
			border: 1px solid var(--fifth-clr);
			width: 450px;
			height: 450px;
			border-radius: 6px;
			padding: 2.5rem;
		}

		#login-page h1 {
			text-align: center;
			font-size: 30px;
			margin-bottom: 20px;
			color: var(--eight-clr);
		}

		.user-login {
			padding: 20px;
		}

		.input-label-container,
		.input-label {
			display: flex;
			flex-direction: column;
			align-items: stretch;
		}

		.input-label {
			gap: 10px;
		}

		.input-label-container {
			gap: 20px;
		}

		.input-label input {
			padding: .5rem .75rem;
			width: 100%;
			height: 40px;
			border-radius: 6px;
			border: 1px solid #e5e7eb;
		}

		.input-label label {
			color: var(--primary-clr);
		}


		.login-button {
			height: 40px;
			background-color: var(--eight-clr);
			border-radius: 6px;
			border: 0px;
			color: var(--secondary-clr);
			font-weight: 500;
		}

		.login-button a {
			padding: 11px 145px;

		}

		.login-button:hover {
			background-color: var(--fifth-clr);
			color: var(--eight-clr);
		}

		.no-acc-container p {
			margin-top: 12px;
			text-align: center;
			font-size: 14px;
		}

		a {
			text-decoration: none;
		}

		.password-container {
			position: relative;
		}

		#passLog {
			padding-right: 30px;
		}

		.toggle-password {
			position: absolute;
			top: 50%;
			right: 5px;
			transform: translateY(-50%);
			cursor: pointer;
		}

		#toggleIcon {
			display: block;
			margin: auto;
		}
	</style>

</head>

<body>
<?php require_once "template-parts/navLogin.php"; ?>

	<section class="login-container">
		<div id="login-page">
			<h1>Login User Account</h1>
			<form class="user-login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<div class="input-label-container">
					<div class="input-label">
						<label for="name-label"><b>Username</b></label>
						<input type="text" name="userLog" autofocus="" class="form-control" placeholder="Enter Username" required="">
					</div>
					<div class="input-label">
						<label for="pass-label"><b>Password</b></label>
						<div class="password-container">
							<input type="password" id="passLog" name="passLog" class="form-control" placeholder="Enter Password" required="">
							<span class="toggle-password" onclick="togglePassword()">
								<img id="toggleIcon" src="img/img/show-pass.svg" alt="Show Password">
							</span>
						</div>
					</div>

					<input type="submit" name="btnLogin" class="login-button">

					<div class="no-acc-container">
						<p>No account yet? <a href="signup.php">Click here to sign up.</a></p>
					</div>
				</div>
			</form>
		</div>
	</section>

	<style>
		.password-container {
			position: relative;
		}

		#passLog {
			padding-right: 30px;
		}

		.toggle-password {
			position: absolute;
			top: 50%;
			right: 5px;
			transform: translateY(-50%);
			cursor: pointer;
		}
	</style>

	<script>
		function togglePassword() {
			var passwordInput = document.getElementById("passLog");
			var toggleIcon = document.getElementById("toggleIcon");

			if (passwordInput.type === "password") {
				passwordInput.type = "text";
				toggleIcon.src = "img/img/hide-pass.svg"; // Replace with the path to your hide icon
			} else {
				passwordInput.type = "password";
				toggleIcon.src = "img/img/show-pass.svg"; // Replace with the path to your show icon
			}
		}
	</script>

</body>

</html>
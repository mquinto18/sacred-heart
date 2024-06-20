<?php
	require_once "inc/sessions.php";
	require_once "inc/functions.php";
	// ternary operator
	// check if account type are equal to the user
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>

<body>

<?php 
	require_once "template-parts/navLogin.php";
?>

<section id="password-verify">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 bg-light p-md-4 mt-5">
				<h3 class="overflow-hidden text-danger fw-bolder text-end"><?= $initials; ?></h3>
				<p class="text-muted fw-bolder text-center">Please Input your personal Password</p>
				<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
				<input type="hidden" name="user_id" value="<?= $user_id; ?>">
				
				<div class="col-md-12 mb-3">
					<div class="input-group">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
					<input type="text" readonly="" name="name" class="form-control" value="<?= $first_name . " " . $last_name; ?>">
				</div>
				</div>

				<div class="col-md-12 mb-3">
					<div class="input-group">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" name="pass_verified" pattern="^(?=.*[A-Z]).{8,}$" title="Please enter a password with at least one capital letter, one special character, and a minimum of 8 characters" class="form-control togglePassword">
							<span class="input-group-text toggleIcon">
							<i class="fa fa-eye-slash d-none hide_eyes"></i>
							<i class="fa fa-eye show_eyes"></i>
						</span>
					</div>
				</div>

					<div class="col-md-12 text-end">
						<input type="submit" name="btnPassVerified" value="Update Password" class="btn btn-outline-primary btn-sm">
					</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</section>
 

<?php
	require_once "template-parts/bottom.php"; 
?>
</body>
</html>
<?php
	require_once "inc/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>

<body>

<?php require_once "template-parts/navLogin.php"; ?>
 
<section id="signup">
	<div class="container pt-5">
		<div class="row">
			<div class="col-md-12 bg-light ps-md-3 pe-md-3 pt-3 pb-2 pb-md-3">
				<h3 class="text-center text-danger text-uppercase overflow-hidden fw-bolder fs-1 ">Admin Signup</h3><hr class="text-danger">

				<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
				
				<div class="col-md-3 mb-3">
							<label>Last Name:</label>
							<div class="input-group">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
								<input type="text" pattern="[A-Za-z ]+" title="Please Enter letters only" name="lname" class="form-control" required="" placeholder="Last Name">
							</div>
					</div>

					<div class="col-md-3 mb-3">
						<label>First Name:</label>
							<div class="input-group">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
								<input type="text" pattern="[A-Za-z ]+" title="Please Enter letters only" name="fname" class="form-control" required="" placeholder="First Name">
							</div>
					</div>

					<div class="col-md-3 mb-3">
						<label>Middle Name:</label>
							<div class="input-group">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
								<input type="text" pattern="[A-Za-z ]+" title="Please Enter letters only" name="mname" class="form-control" placeholder="Middle Name...Optional">
							</div>
					</div>

					<div class="col-md-3 mb-3">
						<label>Contact Number:</label>
							<div class="input-group">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							<input type="number" class="form-control number" step="1" name="contact" maxlength="11" min="0" required="">
							</div>
					</div>

					<div class="col-md-4 mb-3">
						<label>Email:</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" class="form-control" required="" placeholder="Email">
						</div>
					</div>

					<div class="col-md-4 mb-3">
						<label>Username:</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
							<input type="text" name="username" class="form-control" pattern="[A-Za-z]+" title="Please Enter letters only" placeholder="Username" required="">
						</div>
					</div>

					<div class="col-md-4 mb-3">
						<label>Password:</label>
						<div class="input-group">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" name="password" class="form-control togglePassword" placeholder="Input password" pattern="^(?=.*[A-Z]).{8,}$" title="Please enter a password with at least one capital letter, one special character, and a minimum of 8 characters" required="">
							<span class="input-group-text toggleIcon">
							<i class="fa fa-eye-slash d-none hide_eyes"></i>
							<i class="fa fa-eye show_eyes"></i>
						</span>
						</div>
					</div>

					<div class="col-md-12 mb-3">
						<div class="input-group">
							<span class="input-group-text"><i class="fas fa-house-user"></i></span>
							<input type="text" name="address" class="form-control" required="">
						</div>
					</div>

					<div class="col-md-12 mb-3 text-start text-md-end">
						<input type="submit" class="btn btn-outline-success" name="btnAdmin" value="Register">
					</div>

				</form>

				<hr class="text-danger">
				<div class="row">
					<div class="col-md-12 mt-md-3 mt-2">
						<center><small class="text-primary"><a href="login" class="text-success fw-bolder text-decoration-none">Back</a></small></center> 
					</div>
				</div>

			</div>
		</div>
	</div>
</section>


<?php
	require_once "template-parts/footer.php";
	require_once "template-parts/bottom.php"; 
?>
</body>
</html>
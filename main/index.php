<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";
require_once "inc/calendar.php";

// ternary operator
// check if account type are equal to the user
$_SESSION["account_type"] == "admin" ? /* true condition */ : header("location: ../logout");
?>

<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php require_once "template-parts/head.php"; ?>

<body>

<?php 
require_once "template-parts/navLogin.php";
?>
<style>
    .backgroundimg{
                    background-image: url(img/img/about.png);
                    background-size: cover;
                    background-repeat: no-repeat;
                    width: 100%;
                    height: 150vh;
                    position: absolute;
                    top:0;
                    z-index: -1;
                }
</style>
<div class="backgroundimg"> </div>

<div class="container-fluid mt-5">
<div class="row">
<div class="col-md-12 mt-3">
<h5 class="">Dashboard</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">
<div class="row">
<div class="col-md-3 p-md-2 p-2">
<div class="bg-primary p-3 p-0 text-light">

<div class="row">
	<div class="col-6 text-center">
				<?php
		$view_tbl_donation = "SELECT COUNT(*) AS TOTAL FROM tbl_donate";
		$get_tbl_donation = $conn->query($view_tbl_donation) or die($conn->error);
		$row_tbl_donation = $get_tbl_donation->fetch_assoc();
		$total_donation = $row_tbl_donation["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_donation."</h4>";
	?>		
			<p class="text-center">Total Donation</p>
	</div>
	<div class="col-6 pt-2">
		<img src="https://cdn3.iconfinder.com/data/icons/donate-1/67/17-512.png" alt="" width="50px" style="filter: brightness(0) invert(1);">
	</div>
	<hr>
	<div class="col-md-12 text-center">
		<a href="donations" class="text-decoration-none text-light">More Info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>

</div>
</div>

<div class="col-md-3 p-md-2 p-2">
<div class="bg-success p-3 text-light">

<div class="row">
	<div class="col-6 text-center">
				<?php
		$view_tbl_wedding = "SELECT COUNT(*) AS TOTAL FROM tbl_wedding";
		$get_tbl_wedding = $conn->query($view_tbl_wedding) or die($conn->error);
		$row_tbl_wedding = $get_tbl_wedding->fetch_assoc();
		$total_wedding = $row_tbl_wedding["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_wedding."</h4>";
	?>			
			<p class="text-center">Total Wedding</p>
	</div>
	<div class="col-6 pt-2 text-center">
		<h1><img src="https://cdn3.iconfinder.com/data/icons/marriage/247/marriage-marry-001-1024.png" alt="" width="50px" style="filter: brightness(0) invert(1);" ></h1>
	</div>
		<hr>
	<div class="col-md-12 text-center">
		<a href="wedding" class="text-decoration-none text-light">More Info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>

</div>
</div>

<div class="col-md-3 p-md-2 p-2">
<div class="bg-danger p-3 text-light">

<div class="row">
	<div class="col-6 text-center">
			<?php
		$view_tbl_event = "SELECT COUNT(*) AS TOTAL FROM tbl_event";
		$get_tbl_event = $conn->query($view_tbl_event) or die($conn->error);
		$row_tbl_event = $get_tbl_event->fetch_assoc();
		$total_event = $row_tbl_event["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_event."</h4>";
	?>			
			<p class="text-center">Total Events</p>
	</div>
	<div class="col-6 pt-2 text-center">
		<h1><i class="fas fa-calendar-week"></i></h1>
	</div>
		<hr>
	<div class="col-md-12 text-center">
		<a href="events" class="text-decoration-none text-light">More Info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>

</div>
</div>

<div class="col-md-3 p-md-2 p-2">
<div class="bg-warning p-3 text-light">

<div class="row">
	<div class="col-6 text-center">
	<?php
		$view_table_user = "SELECT COUNT(*) AS TOTAL FROM tbl_user";
		$get_tbl_user = $conn->query($view_table_user) or die($conn->error);
		$row_tbl_user = $get_tbl_user->fetch_assoc();
		$total_user = $row_tbl_user["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_user."</h4>";
	?>			
			<p class="text-center">Total Users</p>
	</div>
	<div class="col-6 pt-2 text-center">
		<h1><i class="fas fa-users"></i></h1>
	</div>
		<hr>
	<div class="col-md-12 text-center">
		<a href="#" class="text-decoration-none text-light">More Info<i class="fas fa-arrow-circle-right"></i></a> 
	</div>
</div>

</div>
</div>

</div> <!-- end of row -->

<div class="row">

<div class="col-md-3 p-md-2 p-2">
<div class="bg-danger p-3 text-light">

<div class="row">
	<div class="col-6 text-center">
	<?php
		$view_church_expenses = "SELECT COUNT(*) AS TOTAL FROM tbl_church_expenses";
		$get_tbl_church_exp = $conn->query($view_church_expenses) or die($conn->error);
		$row_church_exp = $get_tbl_church_exp->fetch_assoc();
		$total_church_exp = $row_church_exp["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_church_exp."</h4>";
	?>			
			<p class="text-center">Total Expenses</p>
	</div>
	<div class="col-6 pt-2 text-center">
		<img src="https://th.bing.com/th/id/R.27120d02330a77c43bc5b4f498d606f9?rik=YawyXPXDxPeWrg&riu=http%3a%2f%2fcdn.onlinewebfonts.com%2fsvg%2fimg_459078.png&ehk=XxuIPwVJQsDgpqleXiibCqNHXcWtAhaoU%2bxZ%2bCW7Mwc%3d&risl=&pid=ImgRaw&r=0" alt="" width="50px" style="filter: brightness(0) invert(1);">
	</div>
		<hr>
	<div class="col-md-12 text-center">
		<a href="church-expenses" class="text-decoration-none text-light">More Info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>

</div>
</div> <!-- end of column -->


<div class="col-md-3 p-md-2 p-2">
<div class="bg-warning p-1 text-light">

<div class="row">
	<div class="col-6 text-center">
	<?php
		$view_church_expenses = "SELECT COUNT(*) AS TOTAL FROM tbl_certificate";
		$get_tbl_church_exp = $conn->query($view_church_expenses) or die($conn->error);
		$row_church_exp = $get_tbl_church_exp->fetch_assoc();
		$total_church_exp = $row_church_exp["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_church_exp."</h4>";
	?>			
			<p class="text-center">Total Certificate Request</p>
	</div>
	<div class="col-6 pt-4 text-center">
		<img src="https://cdn3.iconfinder.com/data/icons/wedding-88/64/Certificate-marry-wedding-invite-1024.png" alt="" width="50px" style="filter: brightness(0) invert(1)";>
	</div>
		<hr>
	<div class="col-md-12 text-center">
		<a href="certificates" class="text-decoration-none text-light">More Info<i class="fas fa-arrow-circle-right"></i></a> 
	</div>
</div>

</div>
</div> <!-- end of column -->

<div class="col-md-3 p-md-2 p-2">
<div class="bg-primary p-3 text-light">

<div class="row">
	<div class="col-6 text-center">
	<?php
		$view_church_expenses = "SELECT COUNT(*) AS TOTAL FROM tbl_baptismal";
		$get_tbl_church_exp = $conn->query($view_church_expenses) or die($conn->error);
		$row_church_exp = $get_tbl_church_exp->fetch_assoc();
		$total_church_exp = $row_church_exp["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_church_exp."</h4>";
	?>			
			<p class="text-center">Total Baptism</p>
	</div>
	<div class="col-6 pt-2 text-center">
		<h1><i class="fa-solid fa-church" style="color: #ffffff;"></i></i></h1>
	</div>
		<hr>
	<div class="col-md-12 text-center">
		<a href="baptismal" class="text-decoration-none text-light">More Info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>

</div>
</div> <!-- end of column -->

<div class="col-md-3 p-md-2 p-2">
<div class="bg-success p-1 text-light">

<div class="row">
	<div class="col-6 text-center">
	<?php
		$view_mass_intent = "SELECT COUNT(*) AS TOTAL FROM tbl_mass_intent";
		$get_tbl_mass_intent = $conn->query($view_mass_intent) or die($conn->error);
		$row_mass_intent = $get_tbl_mass_intent->fetch_assoc();
		$total_mass_intent = $row_mass_intent["TOTAL"]; // Use array notation to access the total count
			echo "<h4>".$total_mass_intent."</h4>";
	?>			
			<p class="text-center">Total Mass Intention</p>
	</div>
	<div class="col-6 pt-2 text-center">
		<h1><i class="fa-solid fa-book-bible"></i></h1>
	</div>
		<hr>
	<div class="col-md-12 text-center">
		<a href="mass-intention" class="text-decoration-none text-light">More Info <i class="fas fa-arrow-circle-right"></i></a>
	</div>
</div>

</div>
</div> <!-- end of column -->
	
</div> <!-- end of row -->

</div> <!-- end of container -->
<hr>


<div class="container-fluid mt-3">
<div class="row">

<div class="col-md-7">
<?php
$dateComponents = getdate();
if (isset($_GET["month"]) && isset($_GET["year"])) {
	$month = (int)$_GET["month"];
	$year = (int)$_GET["year"];
}else{
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";

$month = (int)$dateComponents["month"];
$year = (int)$dateComponents["year"];
}
echo build_calendar($month,$year);
?>
</div>

<div class="col-md-5 border">
<h5 class="text-muted mt-3">Add New Event</h5>

<form class="row needs-validation" novalidate="" enctype="multipart/form-data" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-6 mb-3">
<label>Title</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-heading"></i></span>
<select name="event_title" class="form-control" id="event_title">
	<option value="" selected disabled>Choose Event Type</option>
    <option value="Wedding">Wedding</option>
    <option value="Baptismal">Baptismal</option>
    <option value="Mass">Mass for the Dead</option>
    <option value="Kumpil">Confirmation / Kumpil</option>
</select>
</div>
</div>

<div class="col-md-6 mb-3">
<label>Full Name</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="event_name" class="form-control" required="">
</div>
</div>

<div class="col-md-12 mb-3">
<label>Description</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-prescription-bottle"></i></span>
<input type="text" name="description" class="form-control" placeholder="Optional">
</div>
</div>



<div class="col-md-6 mb-3">
    <label>Start Time:</label>
    <div class="input-group">
        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
        <select required="" name="start_date" class="form-control">
            <option value="08:00">8:00AM - 9:30AM</option>
            <option value="09:30">9:30AM - 11:00AM</option>
            <option value="13:00">1:00AM - 3:00PM</option>
            <option value="15:00">3:00PM - 5:00PM</option>
            <option value="18:00">6:00PM - 8:00PM</option>
        </select>
    </div>
</div>

<!--  -->
<div class="col-md-6 mb-3">
<label>Date Book:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="text" id="end_date" required="" name="end_date" class="form-control"> 
</div>
</div>
<!--  -->
<div class="col-md-12 mb-3">
<label>Remarks(Walk-In/Online Registration)</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-flag"></i></span>
<select class="form-control" id="testchange" name="remarks" class="form-control" required="">
	<option name="remarks"></option>
	<option name="remarks" value="Walk-in Registration">Walk-in Registration</option>
	<option name="remarks" value="Online Registration">Online Registration</option>
</select> 
</div>
</div>


<div class="col-md-12 mb-3">
<a href="index" type="button" class="btn btn-outline-danger">Cancel</a> <input type="submit" name="btnAddEvent" value="Add Event" class="btn btn-outline-primary">
</div>

</form>

</div>

</div> <!-- end of row -->
</div> <!-- end of container -->
</section>


<?php
require_once "template-parts/bottom.php"; 
?>
</body>
</html>
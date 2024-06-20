<?php
	require_once "../inc/sessions.php";
	require_once "../inc/clientFunctions.php";
	require_once "inc/calendar.php";

	$_SESSION["account_type"] == "guest" ? /*true condition */ : header("location: ../logout");
?>
<!DOCTYPE html>
<html>
<?php require_once "template-parts/head.php"; ?>
<body>

<style>
    .backgroundimg{
                    background-image: url(img/img/bg.jpg);
                    background-size: cover;
                    background-repeat: no-repeat;
                    width: 100%;
                    height: 110vh;
                    position: absolute;
                    top:0;
                    z-index: -1;
                }
</style>
<div class="backgroundimg"> </div>
<?php
	require_once "template-parts/navLogin.php";
?>
<div class="container-fluid mt-5">
<hr>
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
<label>Type of Service</label>
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

</div> 
</div> 
</section>

<?php require_once "template-parts/bottom.php"; ?>
</body>
</html>
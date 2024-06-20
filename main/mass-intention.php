<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";

// ternary operator
// check if account type are equal to the user
$_SESSION["account_type"] == "admin" ? /* true condition */ : header("location: ../logout");
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>

<body>

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/modal.php";
?>

<style>
    .backgroundimg{
                    background-image: url(img/img/about.png);
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

<div class="container-fluid mt-5">
<div class="row">
<div class="col-md-12 mt-3">
	<h3 class="text-muted ">List of Mass Intent</h3>
</div>
</div>
</div><hr>

<div class="container-fluid">
<div class="row mb-md-3 mb-2">

<div class="col-md-6">
<a href="#" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalMassIntention"><i class="fa-solid fa-plus"></i> New</a>
</div> <!-- end of col -->

<div class="col-md-6 d-md-flex">
<label class="mt-2 me-1 fw-bolder">Search:</label> <input type="search" id="getMass" class="form-control ms-1 me-2 getMassClass"> <a href="mass-intention" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
</div>

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">
<div id="showMassData">
	<table class="table table-hover" id="table-mass-intent">
		<thead>
			<tr class="text-center">
				<th>No.</th>
				<th>Requested</th>
				<th>Specific</th>
				<th>Transacts Date</th>
				<th>Time</th>
				<th>Date</th>
				<th>Person to be pray</th>
				<th>Person making offering</th>
				<th>Username</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

		<?php

		$ctr = 1;
		while ($row = $tbl_mass_list->fetch_assoc()) {
			$origTransdate = $row["transacts_date"];
			$dateTrans = new DateTime($origTransdate);
			$format_transdate = $dateTrans->format("M d, Y");

			$origMassdate = $row["mass_date"];
			$dateMass = new DateTime($origMassdate);
			$format_massdate = $dateMass->format("M d, Y");

			$origMasstime = $row["mass_time"];
			$timeMass = new DateTime($origMasstime);
			$format_masstime = $timeMass->format("h:i A");
		?>
			<tr class="text-center">
				<td><?= $ctr; ?></td>
				<td><?= $row["mass_intention_request"]; ?></td>
				<td><?= $row["specify"]; ?></td>
				<td><?= $format_transdate; ?></td>
				<td><?= $format_masstime; ?></td>
				<td><?= $format_massdate; ?></td>
				<td><?= $row["person_to_prayed_for"]; ?></td>
				<td><?= $row["person_making_offering"]; ?></td>
				<td><?= $row["username"]; ?></td>
				<td>
					<a href="#" id="<?= $row['mass_id']; ?>" type="button" class="btn btn-outline-success editMassIntent-data" data-bs-toggle="modal" data-bs-target="#modalUpdateMassIntent"><i class="fa-solid fa-pencil"></i></a> <a href="#" id="<?= $row['mass_id']; ?>" type="button" class="btn btn-outline-danger deleteMassIntent-data" data-bs-toggle="modal" data-bs-target="#modalDeleteMassIntent"><i class="fa-solid fa-eraser"></i></a>
				</td>
			</tr>
				<?php
$ctr++;			
}
	?>
		</tbody>	
	</table>
</div>
</div>

</div>
</div> <!-- end of row -->

</div>

</section>

<?php
require_once "template-parts/bottom.php"; 
?>
</body>
</html>
<?php
require_once "../inc/sessions.php";
require_once "../inc/clientFunctions.php";
require_once "inc/calendar.php";

// ternary operator
// check if account type are equal to the user
$_SESSION["account_type"] == "guest" ? /* true condition */ : header("location: ../logout");
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>

<body>

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/modal.php";
require_once "modal/modalwedDates.php";
?>

<style>
                .backgroundimg{
                    background-image: url(../img/img/about.png);
                    background-size: cover;
                    background-repeat: no-repeat;
                    width: 100%;
                    height: 110vh;
                    position: absolute;
                    top:0;
                    z-index: -1;
                }
            </style>

<div class="container-fluid mt-0">
<div class="row">
<div class="col-md-12 mt-3">
	<h3 class="text-muted ">List of Wedding Events</h3>
</div>
</div>
</div><hr>

<div class="container-fluid">
<div class="row mb-md-3 mb-2">
<div class="col-md-12"> 
	<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalWeddingDates">Click to view Available Dates</button>
</div>
</div>

<div class="row mb-md-3 mb-2">

<div class="col-md-6">
<a href="#" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalWeddingEntry"><i class="fa-solid fa-plus"></i> New</a>
</div> <!-- end of col -->

<div class="col-md-6 d-md-flex">
<label class="mt-2 me-1 fw-bolder">Search:</label> <input type="search" id="getWedding" class="form-control ms-1 me-2 getWeddingClass"> <a href="wedding" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
</div>

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">
<div id="showWeddingData">
<table class="table table-hover" id="table-wedding">
	
<thead>
	<tr class="text-center">
		<th colspan="4" class="border border-1 border-dark">General Information</th>
		<th colspan="4" class="border border-1 border-dark">Bride's Information</th>
		<th colspan="5" class="border border-1 border-dark">Groom's Information</th>
	</tr>
	<tr>
		<th>No.</th>
		<th>Ceremony Date</th>
		<th>Ceremony Time</th>
		<th>Fees</th>
		<th>Receipt</th>
		<th>Full Name</th>
		<th>Cenomar</th>
		<th>Contact</th>
		<th>Full Name</th>
		<th>Cenomar</th>
		<th>Contact</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
<?php
	$ctr = 1;
	$peso_sign = "\xE2\x82\xB1";
	$total_fees = 0;

	while ($row_wedding = $get_wedding_list->fetch_assoc()) {
		$origWedDate = $row_wedding["ceremony_date"];
		$wedDate = new DateTIme($origWedDate);
		$formatWedDate = $wedDate->format("M d, Y");

		$origWedTime = $row_wedding["ceremony_time"];
		$wedTime = new DateTime($origWedTime);
		$formatWedTime = $wedTime->format("h:i a");

		$total_fees += $row_wedding["fees"];
?>
<tr class="text-center">
	
<td><?= $ctr; ?></td>
<td><?= $formatWedDate; ?></td>
<td><?= $formatWedTime; ?></td>
<td><?= $peso_sign.number_format($row_wedding["fees"]); ?></td>
<td><a target="_blank" class=" text-success fw-bolder" href="../upload/<?= $row_wedding['receipt'] ?>"><?= shortenLinkName($row_wedding["receipt"]) ?></a></td>
<td><?= $row_wedding["bride_full_name"]; ?></td>
<td><a target="_blank" class="text-success fw-bolder " href="../upload/<?= $row_wedding['bride_cenomar']; ?>"><?= shortenLinkName($row_wedding["bride_cenomar"]); ?></a></td>
<td><?= $row_wedding["bride_contact"]; ?></td>
<td><?= $row_wedding["groom_full_name"]; ?></td>
<td><a target="_blank" href="../upload/<?= $row_wedding["groom_cenomar"]; ?>" class="text-success fw-bolder " target="_blank"><?= shortenLinkName($row_wedding["groom_cenomar"]); ?></a></td>
<td><?= $row_wedding["groom_contact"]; ?></td>
<td>
	<a href="#" id="<?= $row_wedding['wedding_id']; ?>" type="button" class="btn btn-outline-success editWedding-data" data-bs-toggle="modal" data-bs-target="#modalWeddingUpdate"><i class="fa-solid fa-pencil"></i></a> <a href="#" id="<?= $row_wedding['wedding_id']; ?>" type="button" class="btn btn-outline-danger deleteWedding-data" data-bs-toggle="modal" data-bs-target="#modalWeddingDelete"><i class="fa-solid fa-eraser"></i></a>
</td>
</tr>
<?php
$ctr++;
	}
?>
<tr>
	<th>Total Fees: </th>
	<td class="border fw-bolder"><?= $peso_sign.number_format($total_fees); ?></td>
</tr>
<?php

?>
</tbody>
</table>
</div>
</div>

</div>
</div> <!-- end of row -->

</div>

<div class="backgroundimg"> </div>

<?php
require_once "template-parts/bottom.php"; 
?>
</body>
</html>
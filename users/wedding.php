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
<style>
        /* Image div styles */
        .image-div {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
			border: 2px solid black;
        }
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

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/modal.php";
?>

<section id="wedding" class="mb-0">

<div class="container-fluid mt-5">
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
		<th class="text-center">Status</th>
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
<td style="font-weight:bold; <?php if($row_wedding['status'] == 'approved'){ echo 'color:green';} else{ echo 'color:red';} ?>"><?= ucfirst($row_wedding["status"]); ?></td>
<td>
	
<a href="#" id="<?= $row_wedding['wedding_id']; ?>" type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalWeddingInfo<?= $row_wedding['wedding_id']; ?>"><i class="fa-solid fa-eye"></i></a>


<div class="modal fade" id="modalWeddingInfo<?= $row_wedding['wedding_id']; ?>" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<!-- modal header -->
<div class="modal-header"> 
<h3 class="text-success">Wedding Details</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->


<!-- modal body -->
<div class="modal-body">
<div class="col-md-12">
	<h4>Bride's Information</h4>
</div>

<label>Baptismal Certifcate</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['bBaptismal'] ?>" class="img-fluid">
</div>

<label>Birth Certifcate</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['bBirth'] ?>" class="img-fluid">
</div>

<label>Confirmation Certificate</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['bConfirmation'] ?>" class="img-fluid">
</div>

<label>2x2 ID</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['b2x2'] ?>" class="img-fluid">
</div>

<label>Government ID 1</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['bGov1'] ?>" class="img-fluid">
</div>

<label>Government ID 2</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['bGov2'] ?>" class="img-fluid">
</div>

<div class="col-md-12">
	<h4>Groom's Information</h4>
</div>

<label>Baptismal Certifcate</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['gBaptismal'] ?>" class="img-fluid">
</div>

<label>Birth Certifcate</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['gBirth'] ?>" class="img-fluid">
</div>

<label>Confirmation Certificate</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['gConfirmation'] ?>" class="img-fluid">
</div>

<label>2x2 ID</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['g2x2'] ?>" class="img-fluid">
</div>

<label>Government ID 1</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['gGov1'] ?>" class="img-fluid">
</div>

<label>Government ID 2</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['gGov2'] ?>" class="img-fluid">
</div>

<div class="col-md-12">
	<h4>Marriage Certificates</h4>
</div>

<label>Marriage License</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['marriageLicense'] ?>" class="img-fluid">
</div>

<label>Matrimony Contract</label>
<div class="image-div">
	<img src="../upload/<?= $row_wedding['contractMatrimony'] ?>" class="img-fluid">
</div>

<label>Sponsors List</label>
<div class="image-div">
	<p><?= nl2br($row_wedding['sponsors']); ?></p>
</div>


</div>
</div>
</div>
</div>

	<a href="#" id="<?= $row_wedding['wedding_id']; ?>" type="button" class="btn btn-sm btn-outline-danger deleteWedding-data" data-bs-toggle="modal" data-bs-target="#modalWeddingDelete<?= $row_wedding['wedding_id']; ?>"><i class="fa-solid fa-eraser"></i></a>
	<!-- modal delete wedding  -->
<div class="modal fade" id="modalWeddingDelete<?= $row_wedding['wedding_id']; ?>" aria-hidden="true" tabindex="-1">

<!-- Modal dialog -->
<div class="modal-dialog modal-dialog-scrollable modal-lg">
	
<!-- Modal Content -->
<div class="modal-content">
	
	<!-- modal header -->
	<div class="modal-header">
		<h3 class="text-danger ">Delete Wedding Page</h3>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<!-- end of modal header -->

	<div class="modal-body">
		<h4>You will delete the wedding records of <u class="text-danger"><em><span><?= $row_wedding['bride_full_name']; ?></span></em></u> and <u class="text-danger"><em><span><?= $row_wedding['groom_full_name']; ?></span></em></u>?</h4>
		
		<form class="row" method="POST" action="../inc/clientFunctions.php">
			<input type="hidden" name="del_weddingId" id="del_weddingId">
			<input type="hidden" name="wedding_id" value="<?= $row_wedding['wedding_id'] ?>">

			<div class="col-md-12 text-end">
				<input type="submit" name="btnDelWed" class="btn btn-outline-danger" value="Delete">
			</div>
		
		</form>
	</div>

</div>
<!-- end of modal content -->
</div>
<!-- end of modal dialog -->

</div><!-- end of modal delete wedding -->
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
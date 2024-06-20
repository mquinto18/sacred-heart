<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";

// ternary operator
// check if account type are equal to the user
$_SESSION["account_type"] == "super admin" ? /* true condition */ : header("location: ../logout");
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>

<body>

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/updatePassModal.php"; 
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
<div class="backgroundimg"> </div>

<section id="baptismal-archive" class="pt-2 mt-3 text-md-start text-center mt-md-5 mb-5">
<div class="container-fluid mt-5">
<div class="row">
<div><h3 class="text-danger fw-bolder ">Baptismal Archives</h3></div> <!-- end of column -->
</div> <!-- end of row -->
<hr>
<div class="row">
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4 d-flex">
<label class="me-1 mt-2 fw-bolder">Filter: </label>
<input type="text" id="searchBaptismalArchive" class="form-control ms-1 me-2 searchBaptismalArchive"> <a href="baptismal-archives" class="btn btn-outline-danger" type="button">Reset</a>	
</div> <!-- end of column -->
</div> <!-- end of row -->

<div class="row">
<div class="col-md-12">
<div class="table-responsive">

<div id="showArchiveBaptismal">
<form method="POST" action="<?php echo htmlspecialchars('PHP_SELF'); ?>">
<table class="table table-hover" id="baptismal-table-archive">
<thead>
<tr class="text-center">
<th>No.</th>
		<th>OR #</th>
		<th>Fees</th>
		<th>Reservation Date</th>
		<th>Reservation Time</th>
		<th>Baptismal Name</th>
		<th>Address</th>
		<th>Baptismal Date</th>
		<th>Gender</th>
		<th>Birthday</th>
		<th>Birth Place</th>
		<th>Father's Name</th>
		<th>Birth Place</th>
		<th>Mother's Name</th>
		<th>Birth Place</th>
		<th>Contact</th>
		<th>Marriage Type</th>
		<th>Priest</th>
		<th>Deleted By</th>
		<th>Date Deleted</th>
		<th>Actions</th>
</tr>
</thead>
<tbody>

<?php

$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_fees = 0;

while ($row_baptist_arch = $get_baptistArch->fetch_assoc()) {
			$origReserveDate = $row_baptist_arch["reservation_date_arch"];
			$reservDate = new DateTime($origReserveDate);
			$formatReservdate = $reservDate->format("M d, Y");

			$origBapdate = $row_baptist_arch["baptismal_date_arch"];
			$baptismaldate = new DateTime($origBapdate);
			$formatbapDate = $baptismaldate->format("M d, Y");

			$origBday = $row_baptist_arch["date_of_birth_arch"];
			$reserBday = new DateTime($origBday);
			$formatBday = $reserBday->format("M d, Y");

			$total_fees += $row_baptist_arch["fee_arch"];
?>

<tr class="text-center">
		<td><?= $ctr; ?></td>
		<td><?= $row_baptist_arch["or_number_arch"]; ?></td>
		<td><?= $peso_sign.number_format($row_baptist_arch["fee_arch"]); ?></td>
		<td><?= $formatReservdate; ?></td>
		<td><?= $row_baptist_arch["time_reservation_arch"]; ?></td>
		<td><?= $row_baptist_arch["baptismal_name_arch"]; ?></td>
		<td><?= $row_baptist_arch["baptismal_address_arch"]; ?></td>
		<td><?= $formatbapDate; ?></td>
		<td><?= $row_baptist_arch["gender_arch"]; ?></td>
		<td><?= $formatBday; ?></td>
		<td><?= $row_baptist_arch["birth_place_arch"]; ?></td>
		<td><?= $row_baptist_arch["father_name_arch"]; ?></td>
		<td><?= $row_baptist_arch["father_birth_place_arch"]; ?></td>
		<td><?= $row_baptist_arch["mother_name_arch"]; ?></td>
		<td><?= $row_baptist_arch["mother_birth_place_arch"]; ?></td>
		<td><?= $row_baptist_arch["contact_arch"]; ?></td>
		<td><?= $row_baptist_arch["type_of_marriage_arch"]; ?></td>
		<td><?= $row_baptist_arch["priest_arch"]; ?></td>
		<td><?= $row_baptist_arch["deleted_by"]; ?></td>
		<td><?= $row_baptist_arch["date_deleted"]; ?></td>

		<td>
			<a href="#" id="<?= $row_baptist_arch["baptismal_id_arch"]; ?>" class="btn btn-outline-success editBaptistArch-data" type="button" data-bs-toggle="modal" data-bs-target="#modalBaptistRestore"><i class="fa-solid fa-plus"></i></a>
		</td>

</tr>

<?php 
$ctr++;
}

?>
<tr>
<th class="border" colspan="3">Total Fees</th>
<td class="border fw-bolder"><?= $peso_sign.number_format($total_fees); ?></td>
</tr>
</tbody>

</table>	
</form>
</div> <!-- end of show donate archive data -->

</div> <!-- end of table responsive -->
</div> <!-- end of column -->
</div> <!-- end of row -->

</div> <!-- end of container -->
</section>

<?php
require_once "template-parts/bottom.php"; 
?>
</body>
</html>
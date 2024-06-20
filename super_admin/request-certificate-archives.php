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
<section id="donations">

<div class="container-fluid mt-5">
<div class="row">
<div class="col-md-12 mt-5">
<h5 class="">List of Request Certificate</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">

<div class="row mb-md-3 mb-2">
<div class="col-md-5 mb-md-0 mb-3">


</div> <!-- end of column -->

<div class="col-md-7">

<div class="row">
<div class="col-md-12">
	<label class="mt-2">Search:</label>
</div> <!-- end of column -->
</div> <!-- end of row -->

<div class="row">
	<div class="col-md-10">
		<input type="search" id="sreq_cert_arch" class="form-control ms-1 me-2 sreq_cert_archClass"> 
	</div> <!-- end of column -->
	<div class="col-md-2">
		<a href="request-certificate-archives" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
	</div>
</div> <!-- end of row -->

</div>

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<div id="super_showCertReqArch">
<table class="table table-hover" id="table-certReqArchive">

<thead>
<tr class="text-center">
<th>No.</th>
<th>Date Request</th>
<th>Person's Name(Baptized/Confirmed)</th>
<th>Birthday</th>
<th>Request Type</th>
<th>Others</th>
<th>Purpose</th>
<th>Year Baptized</th>
<th>Year Confirmed</th>
<th>Father's Name</th>
<th>Mother's Name(Maiden)</th>
<th>Requestor</th>
<th>Requestor Address</th>
<th>Contact</th>
<th>Relationship</th>
<th>Amount</th>
<th>Deleted By</th>
<th>Date Deleted</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

<?php

$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount_archive = 0;
while ($row_req_cert_archive = $get_cert_req_archive->fetch_assoc()) {
$origdateBirth = $row_req_cert_archive["date_of_birth_archive"];
$dateBirth = new DateTime($origdateBirth);
$formatDateBirth = $dateBirth->format("M d, Y");

$orig_req_date = $row_req_cert_archive["date_request_archive"];
$dateReq = new DateTime($orig_req_date);
$formatReqDate = $dateReq->format("M d, Y");

$total_amount_archive += $row_req_cert_archive["cert_amount_archive"];
?>
<tr class="text-center">
<td><?= $ctr; ?></td>
<td><?= $formatReqDate; ?></td>
<td><?= $row_req_cert_archive["person_name_archive"]; ?></td>
<td><?= $formatDateBirth; ?></td>
<td><?= $row_req_cert_archive["request_type_archive"]; ?></td>
<td><?= $row_req_cert_archive["cert_others_archive"]; ?></td>
<td><?= $row_req_cert_archive["certificate_purpose_archive"]; ?></td>
<td><?= $row_req_cert_archive["year_baptized_archive"]; ?></td>
<td><?= $row_req_cert_archive["year_confirmed_archive"]; ?></td>
<td><?= $row_req_cert_archive["father_name_archive"]; ?></td>
<td><?= $row_req_cert_archive["mother_name_archive"]; ?></td>
<td><?= $row_req_cert_archive["requesting_person_name_archive"]; ?></td>
<td><?= $row_req_cert_archive["requesting_person_add_archive"]; ?></td>
<td><?= $row_req_cert_archive["contact_archive"]; ?></td>
<td><?= $row_req_cert_archive["relationship_archive"]; ?></td>
<td><?= $peso_sign.number_format($row_req_cert_archive["cert_amount_archive"]); ?></td>
<td><?= $row_req_cert_archive["deleted_by"]; ?></td>
<td><?= $row_req_cert_archive["date_deleted"]; ?></td>

<td>
<a href="#" id="<?= $row_req_cert_archive['cert_req_id_archive']; ?>" class="btn btn-outline-primary ret_cert_req_arch" type="button" data-bs-toggle="modal" data-bs-target="#modalCertReqArch"><i class="fa-solid fa-plus fw-bolder"></i></a>
</td>

</tr>
<?php
$ctr++;
}
?>
<tr>
	<th class="border" colspan="3">Total Amount</th>
	<td class="border fw-bolder"><?= $peso_sign.number_format($total_amount_archive); ?></td>
</tr>
</tbody>

</table>
</div>
</div>
</div> <!-- end of col -->
</div> <!-- end of row -->

</div> <!-- end of container -->

</section>


<?php
require_once "template-parts/bottom.php"; 
?>
</body>
</html>
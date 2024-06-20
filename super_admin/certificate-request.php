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
<section id="certReq-track">

<div class="container-fluid mt-5">
<div class="row">
<div class="col-md-12 mt-5">
<h5 class="">List of Certificate Request</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">

<div class="row mb-md-3 mb-2">
<div class="col-md-5 mb-md-0 mb-3">

	<div class="row mt-2">
			<div class="col-md-4 ps-1 pe-0">
			<label class="ms-1">From Date:</label>
			<input type="date" class="form-control" name="strack_certReq_to_date" id="strack_certReq_to_date">
		</div>
		<div class="col-md-4 ps-md-0 ps-1 ps pe-0">
			<label>To Date:</label>
			<input type="date" class="form-control" name="strack_certReq_from_date" id="strack_certReq_from_date">
		</div>
		<div class="col-md-4 p-0 mt-4">
			<input type="button" name="strack_certReq_filter" id="strack_certReq_filter" class="btn ms-md-2 ms-0 btn-outline-primary" value="Filter">
		</div>
	</div> <!-- end of row -->

</div> <!-- end of column -->

<div class="col-md-7">

<div class="row">
<div class="col-md-12">
	<label class="mt-2">Search:</label>
</div> <!-- end of column -->
</div> <!-- end of row -->

<div class="row">
	<div class="col-md-10">
		<input type="search" id="strack_certReq" class="form-control ms-1 me-2 strack_certReqClass"> 
	</div> <!-- end of column -->
	<div class="col-md-2">
		<a href="certificate-request" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
	</div>
</div> <!-- end of row -->

</div>

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<div id="super_showCertReqData">
<table class="table table-hover" id="table-certReq">

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
<th>Encoded By</th>
<th>Date Encoded</th>
<th>Updated By</th>
<th>Date Updated</th>
</tr>
</thead>
<tbody>

<?php
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;
while ($row_req_cert = $get_req_cert->fetch_assoc()) {
$origdateBirth = $row_req_cert["date_of_birth"];
$dateBirth = new DateTime($origdateBirth);
$formatDateBirth = $dateBirth->format("M d, Y");

$orig_req_date = $row_req_cert["date_request"];
$dateReq = new DateTime($orig_req_date);
$formatReqDate = $dateReq->format("M d, Y");

$total_amount += $row_req_cert["cert_amount"];
?>
<tr class="text-center">
<td><?= $ctr; ?></td>
<td><?= $formatReqDate; ?></td>
<td><?= $row_req_cert["person_name"]; ?></td>
<td><?= $formatDateBirth; ?></td>
<td><?= $row_req_cert["request_type"]; ?></td>
<td><?= $row_req_cert["cert_others"]; ?></td>
<td><?= $row_req_cert["certificate_purpose"]; ?></td>
<td><?= $row_req_cert["year_baptized"]; ?></td>
<td><?= $row_req_cert["year_confirmed"]; ?></td>
<td><?= $row_req_cert["father_name"]; ?></td>
<td><?= $row_req_cert["mother_name"]; ?></td>
<td><?= $row_req_cert["requesting_person_name"]; ?></td>
<td><?= $row_req_cert["requesting_person_add"]; ?></td>
<td><?= $row_req_cert["contact"]; ?></td>
<td><?= $row_req_cert["relationship"]; ?></td>
<td><?= $peso_sign.number_format($row_req_cert["cert_amount"]); ?></td>
<td><?= $row_req_cert["encoded_by"]; ?></td>
<td><?= $row_req_cert["date_encoded"]; ?></td>
<td><?= $row_req_cert["updated_by"]; ?></td>
<td><?= $row_req_cert["date_updated"]; ?></td>
</tr>
<?php
$ctr++;
}
?>
<tr>
	<th class="border" colspan="3">Total Amount</th>
	<td class="border fw-bolder"><?= $peso_sign.number_format($total_amount); ?></td>
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
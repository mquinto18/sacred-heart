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
<h5 class="">List of Donations</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">

<div class="row mb-md-3 mb-2">
	<div class="col-md-12">
<a href="#" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalAddDonations"><i class="fa-solid fa-plus"></i> New</a>
</div> <!-- end of col -->

</div>

<div class="row mb-md-3 mb-2">
<div class="col-md-5 mb-md-0 mb-3">

	<div class="row mt-2">
			<div class="col-md-4 ps-1 pe-0">
			<label class="ms-1">From Date:</label>
			<input type="date" class="form-control" name="donate_from_date" id="donate_from_date">
		</div>
		<div class="col-md-4 ps-md-0 ps-1 ps pe-0">
			<label>To Date:</label>
			<input type="date" class="form-control" name="donate_to_date" id="donate_to_date">
		</div>
		<div class="col-md-4 p-0 mt-4">
			<input type="button" name="donate_filter" id="donate_filter" class="btn ms-md-2 ms-0 btn-outline-primary" value="Filter">
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
		<input type="search" id="getDonations" class="form-control ms-1 me-2 getDonationClass"> 
	</div> <!-- end of column -->
	<div class="col-md-2">
		<a href="donations" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
	</div>
</div> <!-- end of row -->

</div>

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<div id="showDonationsData">
<table class="table table-hover" id="table-donate">

<thead>
<tr class="text-center">
<th>No.</th>
<th>Donators Name</th>
<th>Amount</th>
<th>Donated On</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>

<?php
	$ctr = 1;
	$peso_sign = "\xE2\x82\xB1";
	$total_amount = 0;	//initial total amount to 0
	while ($row_donate = $tbl_donate_list->fetch_assoc()) {
$originalStartTime = $row_donate["donate_on"]; // Original date and time string
$dateStartTime = new DateTime($originalStartTime); 	// Create a DateTime object from the original string
$formatDateStartTime = $dateStartTime->format("M d, Y");
$total_amount += $row_donate["donate_amount"]; //accumulate or adding all amount on rows to get total amount
?>

<tbody>
<tr class="text-center">
<td><?= $ctr; ?></td>
<td><?= $row_donate["donate_name"]; ?></td>
<td><?= $peso_sign.$row_donate["donate_amount"]; ?></td>
<td><?= $formatDateStartTime; ?></td>
<td><?= $row_donate["donate_description"]; ?></td>
<td>
<a href="#" id="<?= $row_donate['donate_id']; ?>" class="btn btn-outline-success editDonate-data" type="button" data-bs-toggle="modal" data-bs-target="#modalUpdateDonate"><i class="fa-solid fa-pencil"></i></a> <a id="<?= $row_donate['donate_id']; ?>" href="#" type="button" class="btn btn-outline-danger deleteDonate-data" data-bs-toggle="modal" data-bs-target="#modalDeleteDonate"><i class="fa-solid fa-eraser"></i></a>
</td>
</tr>
<?php 
	$ctr++;
	}
?>
<tr>
	<!-- Place this outside the loop to show the total after all donation records -->
	<th class="border">Total Donations</th>
	<td class="border fw-bolder">
	<?php 
		echo $peso_sign.number_format($total_amount); //format the number into currency or having a , sign
	?>
	</td>
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
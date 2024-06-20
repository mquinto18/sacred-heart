<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";

// stop at for add modal

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

<section id="church-expenses" class="mb-5">

<div class="container-fluid mt-5">
<div class="row">
<div class="col-md-12 mt-3">
<h5 class="">List of Expenses</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">

<div class="row">
	<div class="col-md-12">
		<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modaladdchurchExpenses"><i class="fa-solid fa-plus"></i> New</button>
	</div>
</div> <!-- end of row -->

<div class="row mb-md-3 mb-2">

<div class="col-md-5 mb-md-0 mb-3">
	
<div class="row mt-2">
			<div class="col-md-4 ps-1 pe-0">
			<label class="ms-1">From Date:</label>
			<input type="date" class="form-control" name="churchexp_from_date" id="churchexp_from_date">
		</div>
		<div class="col-md-4 ps-md-0 ps-1 ps pe-0">
			<label>To Date:</label>
			<input type="date" class="form-control" name="churchexp_to_date" id="churchexp_to_date">
		</div>
		<div class="col-md-4 p-0 mt-4">
			<input type="button" name="churchexp_filter" id="churchexp_filter" class="btn ms-md-2 ms-0 btn-outline-primary" value="Filter">
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
		<input type="search" id="seachChurchExp" placeholder="format date to search is Y-m-dd (2023-11-21)" class="form-control ms-1 me-2 seachChurchExp"> 
	</div> <!-- end of column -->
	<div class="col-md-2">
		<a href="church-expenses" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
	</div>
</div> <!-- end of row -->

</div> <!-- end of column -->

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">

<div id="showChurchExpensesData">
<table class="table table-hover" id="table-church-expenses">
<thead>
	<tr class="text-center">
		<th>No.</th>
		<th>Date Receipt</th>
		<th>Type of Transaction</th>
		<th>Description</th> 
		<th>Amount</th>
		<th>TIN #</th>
		<th>Action</th>
	</tr>
</thead>

<?php
	// $ctr = 1;
	$peso_sign = "\xE2\x82\xB1";
	$total_amount = 0;
	while ($row_church = $church_tbl_list->fetch_assoc()) {
	$originalDate = $row_church["date_receipt"];
	$datechurch = new DateTime($originalDate);
	$formatDate = $datechurch->format("M d, Y");
	$total_amount += $row_church["expenses"];
?>
<tbody>
<tr class="text-center">
	<!-- <td><?= $ctr; ?></td> -->
	<td><?= $row_church["expenses_id"]; ?></td>
	<td><?= $formatDate; ?></td>
	<td><?= $row_church["type_of_transaction"]; ?></td> 
	<td><?= $row_church["description"]; ?></td>
	<td><?= $row_church["expenses"]; ?></td>
	<td><?= $row_church["tin"]; ?></td>
	<td>
		<a href="#" id="<?= $row_church['expenses_id']; ?>" class="btn btn-outline-success editChurch-data" type="button" data-bs-toggle="modal" data-bs-target="#modalUpdateChurch"><i class="fa-solid fa-pencil"></i></a> <a id="<?= $row_church['expenses_id']; ?>" href="#" type="button" class="btn btn-outline-danger deleteChurch-data" data-bs-toggle="modal" data-bs-target="#modalDeleteChurchExp"><i class="fa-solid fa-eraser"></i></a>
	</td>
</tr>
<?php
		// $ctr++;
	}
?>
<tr>
	<th class='border'>Total Expenses</th>
	<td class="border fw-bolder">
	<?php
		echo $peso_sign.number_format($total_amount);
	?>
	</td>
</tr>
</tbody>
</table>
</div>

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
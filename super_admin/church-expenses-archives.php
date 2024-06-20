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
<section id="archive-church-expenses" class="pt-2 mt-3 text-md-start text-center mt-md-5 mb-5">
<div class="container-fluid mt-5">
<div class="row">
<div><h3 class="text-danger fw-bolder ">Church Expenses Archives</h3></div> <!-- end of column -->
</div> <!-- end of row -->
<hr>
<div class="row">
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4 d-flex">
<label class="me-1 mt-2 fw-bolder">Filter: </label>
<input type="text" id="searchExpenseArch" class="form-control ms-1 me-2 searchExpenseArch"> <a href="church-expenses-archives" class="btn btn-outline-danger" type="button">Reset</a>	
</div> <!-- end of column -->
</div> <!-- end of row -->

<div class="row">
<div class="col-md-12">
<div class="table-responsive">

<div id="showChurchArchExpensesData">
<table class="table table-hover" id="church-expenses-table-archive">
<thead>
<tr class="text-center">
<th>No.</th>
<th>Date Receipt</th>
<th>TIN #</th>
<th>Description</th>
<th>Expenses</th>
<th>Deleted By</th>
<th>Date Delete</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
	$ctr = 1;
	$peso_sign = "\xE2\x82\xB1";
	$total_church_arch_amount = 0;

	while ($row_church_arch = $tbl_list_churhcexp_arch->fetch_assoc()) {
		$origDate = $row_church_arch["date_receipt_arch"];
		$date_receipt_arch = new DateTime($origDate);
		$formatdate = $date_receipt_arch->format("M d, Y");

		$origDateDel = $row_church_arch["date_deleted"];
		$date_deleted = new DateTime($origDateDel);
		$date_format = $date_deleted->format("M d, Y");
		$total_church_arch_amount += $row_church_arch["total_expenses_arch"];
?>	

<tr class="text-center">
	<td><?= $ctr; ?></td>
	<td><?= $formatdate; ?></td>
	<td><?= $row_church_arch["tin_arch"]; ?></td>
	<td><?= $row_church_arch["description_arch"]; ?></td>
	<td><?= $row_church_arch["expenses_arch"] ;?></td>
	<td><?= $row_church_arch["deleted_by"]; ?></td>
	<td><?= $date_format; ?></td>
	<td>
		<a href="#" type="button" class="btn btn-outline-primary delChurchExpArch" id="<?= $row_church_arch['expenses_id_arch']; ?>" data-bs-toggle="modal" data-bs-target="#modalChurchDelRestore"><i class="fa-solid fa-plus fw-bolder"></i></a>
	</td>
</tr>

<?php
$ctr++;
	}
?>

<tr>
<th class="border">Total Amount</th>
<td class="border fw-bolder"><?= $peso_sign.number_format($total_church_arch_amount); ?></td>
</tr>
</tbody>

</table>	

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
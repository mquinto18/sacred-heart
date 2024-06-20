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
<section id="archive-donation" class="pt-2 mt-3 text-md-start text-center mt-md-5 mb-5">
<div class="container-fluid mt-5">
<div class="row">
<div><h3 class="text-danger fw-bolder ">Donation Archives</h3></div> <!-- end of column -->
</div> <!-- end of row -->
<hr>
<div class="row">
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4 d-flex">
<label class="me-1 mt-2 fw-bolder">Filter: </label>
<input type="text" id="searchDonateArchive" class="form-control ms-1 me-2 searchDonateArchive"> <a href="donate-archives" class="btn btn-outline-danger" type="button">Reset</a>	
</div> <!-- end of column -->
</div> <!-- end of row -->

<div class="row">
<div class="col-md-12">
<div class="table-responsive">

<div id="showDonationArchives">
<form method="POST" action="<?php echo htmlspecialchars("PHP_SELF"); ?>">
<table class="table table-hover" id="table-donation-archive">
<thead>
<tr class="text-center">
<th>No.</th>
<th>Donator's Name</th>
<th>Amount</th>
<th>Donated On</th>
<th>Description</th>
<th>Deleted By</th>
<th>Date Deleted</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$ctr=1;
$peso_sign="\xE2\x82\xB1";
$total_archive_amount = 0;
while ($row_donate_arch = $tbl_donate_arch_list->fetch_assoc()) {
$origDateTime = $row_donate_arch["donate_archive_on"];
$dateStart = new DateTime($origDateTime);
$formatDate = $dateStart->format("M d, Y");

$origDateDeleted = $row_donate_arch["date_deleted"];
$dateDeleted = new DateTime($origDateDeleted);
$formatDateDeleted = $dateDeleted->format("M d, Y");
$total_archive_amount += $row_donate_arch["total_archive_amount"];
?>

<tr class="text-center">
<td><?= $ctr; ?></td>
<td><?= $row_donate_arch["donate_archive_name"]; ?></td>
<td><?= $peso_sign.number_format($row_donate_arch["donate_archive_amount"]); ?></td>
<td><?= $formatDate;?></td>
<td><?= $row_donate_arch["donate_archive_desc"]; ?></td>
<td><?= $row_donate_arch["deleted_by"]; ?></td>
<td><?= $formatDateDeleted; ?></td>
<td>
<button data-bs-toggle="modal" data-bs-target="#modaldeleterestore" class="btn btn-outline-primary delete_donate_archive" id="<?=  $row_donate_arch['donate_archive_id']; ?>" type="button"><i class="fa-solid fa-plus fw-bolder"></i></button>
</td>
</tr>
<?php
$ctr++;
}
?>
<tr>
<th class="border">Total Amount</th>
<td class="border fw-bolder">
	<?php
		echo $peso_sign.number_format($total_archive_amount);
	?>
</td>
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
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
<h5 class="">Certification Request</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">

<div class="row">
<div class="row mb-md-3 mb-2">

<div class="col-md-6">
<a href="#" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalcert"><i class="fa-solid fa-plus"></i> New</a>
</div> <!-- end of col -->

<div class="col-md-6 d-md-flex">
<label class="mt-2 me-1 fw-bolder">Search:</label> <input type="search" id="getCert" class="form-control ms-1 me-2 getCertClass"> <a href="certificates" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
</div>

</div> <!-- end of row --><hr>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">			
<div id="showCertReqdata">
<table class="table table-hover" id="table-cert-request">
<thead>
	<tr class="text-center">	
		<th>No.</th>
		<th>Full Name</th>
		<th>Date</th>
		<th>Title</th>
		<th>Sub Title</th>
		<th>Description</th>
		<th>Sub Description</th>
		<th>Generate</th>
	</tr>
</thead>
<tbody>
<?php
$ctr = 1;
while ($row = $get_cert->fetch_assoc()) {
$origDate = $row["cert_date"];
$date = new DateTime($origDate);
$format = $date->format("M d, Y");	
?>
	<tr class="text-center">
		<td><?= $ctr++ ?></td>
		<td><?= $row["full_name"]; ?></td>
		<td><?= $format; ?></td>
		<td><?= $row["title"]; ?></td>
		<td><?= $row["sub_title"]; ?></td>
		<td><?= $row["description"]; ?></td>
		<td><?= $row["sub_description"]; ?></td>
		<td>
    <form method="POST">
        <input type="hidden" name="download_cert" value="<?= $row["cert_id"]; ?>">
        <button type="submit" class="btn btn-outline-primary">Download</button>
    </form>
</td>
	</tr>
<?php
$ctr++;
}

?>
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
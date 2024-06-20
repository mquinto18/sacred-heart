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
<section id="event-archives" class="pt-2 mt-3 text-md-start text-center mt-md-5 mb-5">
<div class="container-fluid mt-5">

<div class="row">
<div class="col-md-12">
<h3 class="text-danger fw-bolder ">Event Archives</h3>
</div> <!-- end of column -->
</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4"></div> <!-- end of column -->
<div class="col-md-4 d-flex">
<label class="me-1 mt-2 fw-bolder">Filter: </label>
<input type="text" id="searchEventArchive" class="form-control ms-1 me-2 searchEventArchive"> <a href="event-archives" class="btn btn-outline-danger" type="button">Reset</a>	
</div> <!-- end of column -->
</div> <!-- end of row -->

<div class="row">
<div class="col-md-12">
<div class="table-responsive">

<div id="showEventArchivesData">
<table class="table table-hover" id="table-event-archive">
<thead>
<tr class="text-center">
	<th>No.</th>
	<th>Title</th>
	<th>Name</th>
	<th>Description</th>
	<th>Start Time</th>
	<th>Date Book</th>
	<th>Remarks</th>
	<th>Receipt</th>
	<th>Username</th>
	<th>Deleted User By</th>
	<th>Date Deleted</th>
	<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$ctr = 1;
while ($row_event_archive = $tbl_event_list_archive->fetch_assoc()) {
$origEventArchStartTime = $row_event_archive["event_archive_start_time"];
$dateEventArchStartTime = new DateTime($origEventArchStartTime);
$formatDateStartTime = $dateEventArchStartTime->format("M d, Y / h:i A");

$origEventArchEndTime = $row_event_archive["event_archive_date_entry"];
$dateEventArchEndTime = new DateTime($origEventArchEndTime);
$formatDateEndTime = $dateEventArchEndTime->format("M d, Y");

$origEventArchDeletedBy = $row_event_archive["date_deleted"];
$dateEventArchDeletedBy = new DateTime($origEventArchDeletedBy);
$formatDateDeletedBy = $dateEventArchDeletedBy->format("M d, Y / h:i A");
?>
	<tr class="text-center">
	<td><?= $ctr; ?></td>
	<td><?= $row_event_archive["event_archive_title"]; ?></td>
	<td><?= $row_event_archive["event_archive_name"]; ?></td>
	<td><?= $row_event_archive["event_archive_desc"]; ?></td>
	<td><?= $formatDateStartTime; ?></td>
	<td><?= $formatDateEndTime; ?></td>
	<td><?= $row_event_archive["event_remarks_archive"]; ?></td>
	<td>
		<?php
			if ($row_event_archive["event_upload_archives"] == "") {
			}else{
		?>
		<a href="../upload/<?= $row_event_archive['event_upload_archives']; ?>" type="button" target="_blank" class="text-danger fw-bolder text-decoration-none"><img class="img-fluid" width="50" height="50" src="../upload/<?= $row_event_archive["event_upload_archives"]; ?>"></a>
		<?php		
			}
		?>
	</td>
	<td><?= $row_event_archive["event_username_archives"]; ?></td>
	<td><?= $row_event_archive["deleted_user_by"]; ?></td>
	<td><?= $formatDateDeletedBy; ?></td>
	<td>
	<a href="#" class="btn btn-outline-primary eventArchData" data-bs-toggle="modal" data-bs-target="#modalEventArchive" type="button" id="<?= $row_event_archive['event_archive_id']; ?>"><i class="fa-solid fa-plus fw-bolder"></i></a>
</td>
</tr>
</tbody>

<?php
$ctr++;
}
?>

</table>	
</div> <!-- end of show event archive data -->

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
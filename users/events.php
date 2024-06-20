<?php
	require_once "../inc/sessions.php";
	require_once "../inc/clientFunctions.php";
	require_once "inc/calendar.php";

	$_SESSION["account_type"] == "guest" ? /*true condition */ : header("location: ../logout");
	
?>
<!DOCTYPE html>
<html>
<?php require_once "template-parts/head.php"; ?>
<body>

<?php
	require_once "template-parts/navLogin.php";
	require_once "modal/modal.php";
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

<div class="container-fluid mt-5">
<div class="row">
<div class="col-md-12 mt-3">
<h5 class="">List of Events</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">

<div class="row mb-md-3 mb-2">
<div class="col-md-6">
<a href="#" class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalAddEvents"><i class="fa-solid fa-plus"></i> New</a>
</div> <!-- end of col -->

<div class="col-md-6 d-md-flex">
<label class="mt-2 me-1 fw-bolder">Search:</label> <input type="search" id="getEvents" class="form-control ms-1 me-2 getEventClass"> <a href="events" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
</div>

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<div id="showEventData">
<table class="table table-hover" id="table-event">
<thead>
<tr class="text-center">
<th>No.</th>
<th>Event Title</th>
<th>Full Name</th>
<th>Description</th>
<th>Start Time</th>
<th>Date Book</th>
<th>Remarks</th>
<th>Receipt</th>
<th>Actions</th>
</tr>
</thead>
<?php 
$ctr = 1;
while($row = $tbl_event_list->fetch_assoc()){
$originalStartTime = $row["event_start_time"]; // Original date and time string
$dateStartTime = new DateTime($originalStartTime); 	// Create a DateTime object from the original string
$formatDateStartTime = $dateStartTime->format("h:i A");

$originalEndTime = $row["date_entry"]; 
$dateEndTime = new DateTime($originalEndTime);
$formatDateEndTime = $dateEndTime->format("M d, Y");
?>
<tbody>
<tr class="text-center">
<td><?= $ctr; ?></td>
<td><?= $row["event_title"]; ?></td>
<td><?= $row["event_name"]; ?></td>
<td><?= $row["event_description"]; ?></td>
<td><?= $formatDateStartTime; ?></td>
<td><?= $formatDateEndTime; ?></td>
<td><?= $row["remarks_event"]; ?></td>
<td><?php
if ($row["upload"] == "") {
}else{
?>
<a href="../upload/<?= $row['upload']; ?>" type="button" target="_blank" class="text-danger fw-bolder text-decoration-none"><img class="img-fluid" width="50" height="50" src="../upload/<?= $row['upload']; ?>"></a>
<?php
}
?>
</td>

<td>
<a href="#" id="<?= $row['event_id']; ?>" class="btn btn-outline-success editEvent-data" type="button" data-bs-toggle="modal" data-bs-target="#modalUpdateEvent"><i class="fa-solid fa-pencil"></i></a> <a href="#" id="<?= $row['event_id']; ?>" type="button" class="btn btn-outline-danger deleteEvent-data" data-bs-toggle="modal" data-bs-target="#modalDeleteEvent"><i class="fa-solid fa-eraser"></i></a>
</td>
</tr>
</tbody>
<?php
$ctr++;
}
?>
</table>
</div>
</div>
</div> <!-- end of col -->
</div> <!-- end of row -->

</div> <!-- end of container -->

</section>

<?php require_once "template-parts/bottom.php"; ?>
</body>
</html>
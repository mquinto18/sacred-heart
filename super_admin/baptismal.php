<?php
require_once "../inc/sessions.php";
require_once "../inc/functions.php";
require_once "../inc/calendar.php";

// stop at for add modal

// ternary operator
// check if account type are equal to the user
$_SESSION["account_type"] != "guest" ? /* true condition */ : header("location: ../logout");
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>

<body>

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/modal.php";
require_once "modal/modalDates.php";
?><style>
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

<section id="church-expenses" class="mb-5">

<div class="container-fluid mt-5">
<div class="row">
<div class="col-md-12 mt-3">
<h5 class="">Baptismal</h5>
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
<input type="date" class="form-control" name="baptist_from_date" id="baptist_from_date">
</div>
<div class="col-md-4 ps-md-0 ps-1 ps pe-0">
<label>To Date:</label>
<input type="date" class="form-control" name="baptist_to_date" id="baptist_to_date">
</div>
<div class="col-md-4 p-0 mt-4">
<input type="button" name="baptist_filter" id="baptist_filter" class="btn ms-md-2 ms-0 btn-outline-primary" value="Filter">
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
<input type="search" id="searchBaptist" placeholder="format date to search is Y-m-dd (2023-11-21)" class="form-control ms-1 me-2 searchBaptist"> 
</div> <!-- end of column -->
<div class="col-md-2">
<a href="baptismal" class="mt-md-0 mt-2 text-end text-md-start btn btn-outline-danger" type="button">Reset</a>	
</div>
</div> <!-- end of row -->

</div> <!-- end of column -->

</div> <!-- end of row -->
<hr>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">			
<div id="showBaptistData">
<table class="table table-hover" id="table-baptist">
<thead>
<tr class="text-center">
<th>No.</th>
<th>OR #</th>
<th>Fees</th>
<th>Reservation Date</th>
<th>Reservation Time</th>
<th>Baptismal Name</th>
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
<th>Status</th>
</tr>
</thead>
<tbody>

<?php
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_fees = 0;

while ($row_baptismal = $get_baptismal->fetch_assoc()) {
$origReserveDate = $row_baptismal["reservation_date"];
$reservDate = new DateTime($origReserveDate);
$formatReservdate = $reservDate->format("M d, Y");

$origBapdate = $row_baptismal["baptismal_date"];
$baptismaldate = new DateTime($origBapdate);
$formatbapDate = $baptismaldate->format("M d, Y");

$origBday = $row_baptismal["date_of_birth"];
$reserBday = new DateTime($origBday);
$formatBday = $reserBday->format("M d, Y");

$total_fees += $row_baptismal["fee"];

?>
<tr class="text-center">
<td><?= $ctr; ?></td>
<td><?= $row_baptismal["or_number"]; ?></td>
<td><?= $peso_sign.number_format($row_baptismal["fee"]); ?></td>
<td><?= $formatReservdate; ?></td>
<td><?= $row_baptismal["time_reservation"]; ?></td>
<td><?= $row_baptismal["baptismal_name"]; ?></td>
<td><?= $formatbapDate; ?></td>
<td><?= $row_baptismal["gender"]; ?></td>
<td><?= $formatBday; ?></td>
<td><?= $row_baptismal["birth_place"]; ?></td>
<td><?= $row_baptismal["father_name"]; ?></td>
<td><?= $row_baptismal["father_birth_place"]; ?></td>
<td><?= $row_baptismal["mother_name"]; ?></td>
<td><?= $row_baptismal["mother_birth_place"]; ?></td>
<td><?= $row_baptismal["contact"]; ?></td>
<td><?= $row_baptismal["type_of_marriage"]; ?></td>
<td><?= $row_baptismal["priest"]; ?></td>
<td style="font-weight:bold; <?php if($row_baptismal['status'] == 'approved'){ echo 'color:green';} else{ echo 'color:red';} ?>"><?= ucfirst($row_baptismal["status"]); ?></td>

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
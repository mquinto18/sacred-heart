<?php
require_once "../inc/sessions.php";
require_once "../inc/clientFunctions.php";
require_once "inc/calendar.php";

// stop at for add modal

// ternary operator
// check if account type are equal to the user
$_SESSION["account_type"] == "guest" ? /* true condition */ : header("location: ../logout");
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "template-parts/head.php"; ?>
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

<body>

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/modal.php";

?>


<div class="container-fluid mt-0">
<div class="row">
<div class="col-md-12 mt-3">
<h5 class="">Baptismal</h5>
</div>
</div> <!-- end of row -->
</div> <!-- end of container -->
<hr>

<div class="container-fluid">

<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalBaptisEntry"><i class="fa-solid fa-plus"></i> New</button>
</div>
<div class="col-md-6 text-end">
	<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalBaptismalDates">Click to view Available Dates</button>
</div>
</div> <!-- end of row -->

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
<th>Address</th>
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
<th>Actions</th>
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
<td><?= $row_baptismal["baptismal_address"]; ?></td>
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

<td>
<a href="#" id="<?= $row_baptismal["baptismal_id"]; ?>" class="btn btn-outline-success btn-sm editBaptist-data" type="button" data-bs-toggle="modal" data-bs-target="#modalUpdateBap"><i class="fa-solid fa-pencil"></i></a> 
<a id="<?= $row_baptismal["baptismal_id"]; ?>" href="#" type="button" class="btn btn-outline-danger btn-sm deleteBaptist-data" data-bs-toggle="modal" data-bs-target="#modalDelBap1<?= $row_baptismal['baptismal_id'] ?>"><i class="fa-solid fa-eraser"></i></a>
<div class="modal fade" id="modalDelBap1<?= $row_baptismal['baptismal_id'] ?>" aria-hidden="true" aria-labelledby="exampleToggle" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
                <h3 class="text-danger">Delete Baptismal</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- modal body -->
            <form action="../inc/functions.php" method="POST">
            <div class="modal-body">
                <p>Are you sure you want to delete this Baptismal record?</p>
                <input type="hidden" name="del_baptismal_idUser" value="<?= $row_baptismal['baptismal_id'] ?>">
                <!-- You can display additional information or details here -->
            </div>
            
            <!-- modal footer -->
            <div class="modal-footer">
                <!-- Add your delete button here -->
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div></td>

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
<div class="backgroundimg"> </div>



<?php
require_once "template-parts/bottom.php"; 
?>
</body>
</html>
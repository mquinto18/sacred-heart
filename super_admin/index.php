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

<?php 
require_once "template-parts/navLogin.php";
require_once "modal/updatePassModal.php"; 
?>




<section class="mt-5 mb-5">
<div class="backgroundimg"> </div>
<div class="container">

<div class="row">
<div class="col-md-12 mt-5 text-center">
<h3 class="overflow-hidden text-primary text-uppercase fw-bolder ">Table Data</h3>
</div>
</div>

<div class="row">
<div class="col-md-4 d-flex">
<label class="mt-2 me-1 fw-bolder">Filter:</label> <input type="text" id="getSearch" class="form-control ms-1 me-2 getSearch"> <a href="index" class="btn btn-outline-danger" type="button">Reset</a>	
</div>
</div>

<div class="row mt-4">
<div class="col-md-12">
<div class="table-responsive">

<div id="showData">
<table class="table table-hover border border-1 border-dark">
<thead>
<tr class="text-center">
<th>No.</th>
<th>Last Name</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Email</th>
<th>Username</th>
<th>Account Type</th>
<th>Options</th>
</tr>
</thead>
<?php 
$ctr = 1;
while ($row = $tbl_list->fetch_assoc()) {
?>

<tbody>
<tr class="text-center">
<td><?= $ctr; ?></td>
<td><?= $row["last_name"]; ?></td>
<td><?= $row["first_name"]; ?></td>
<td><?= $row["middle_name"]; ?></td>
<td><?= $row["email"]; ?></td>
<td><?= $row["username"]; ?></td>
<td><?= $row["account_type"] ?></td>
<td>
	<a href="#" class="btn btn-outline-primary edit-data" data-bs-toggle="modal" data-bs-target="#modalUpdate" type="button" id="<?= $row['user_id']; ?>"><i class="fa-solid fa-rotate-left"></i></a> <a href="#" type="button" class="btn btn-outline-success editUser" data-bs-toggle="modal" data-bs-target="#modalUpdateUser" id="<?= $row['user_id']; ?>"><i class="fas fa-underline"></i></a> <a href="#" id="<?=  $row['user_id']; ?>" class="btn btn-outline-danger deleteUser" type="button" data-bs-toggle="modal" data-bs-target="#modalDeleteUser"><i class="fas fa-eraser"></i></a>

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
</div>
</div>

</div>
</section>


<?php
require_once "template-parts/bottom.php"; 
?>
</body>
</html>
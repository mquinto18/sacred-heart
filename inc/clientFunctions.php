<?php
// checking if the session doesnt exist it will start a new session
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
include("conn.php");


// shortenLink url
function shortenLinkName($linkName, $maxLength=10){
if (strlen($linkName > $maxLength)) {
return substr($linkName, 0, $maxLength -3) . "...";
}else{
return $linkName;
}
}
// 

$currentDate = date('Y-m-d'); echo "<br>";
$daysToSubtract = 100; // Change this value to set the number of days to subtract
// Calculate the given date by subtracting days from the current date
$givenDate = date("Y-m-d", strtotime("-$daysToSubtract days", strtotime($currentDate)));

// home page
if (isset($_POST["btnAddEvent"])) {
$event_title = $conn->escape_string(trim($_POST["event_title"]));
$event_name = $conn->escape_string(trim($_POST["event_name"]));
$description = $conn->escape_string(trim($_POST["description"]));
$start_date = $conn->escape_string(trim($_POST["start_date"]));
$end_date = $conn->escape_string(trim($_POST["end_date"]));
$remarks = $conn->escape_string(trim($_POST["remarks"]));
$username = $_SESSION["username"];
$files = $_FILES["upload_files"];

$check_end_date = "SELECT * FROM tbl_event WHERE date_entry = '$end_date'";
$check_end_date_row = $conn->query($check_end_date) or die($conn->error);
$total_end_date = $check_end_date_row->num_rows;

if ($total_end_date > 0) {

echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Schedule date was already booked select other schedule',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a href=\"index?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Confirm</a>'
});
});
</script>";
}

if($currentDate < $baptist_entry_reserve_date){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Schedule date was passed!!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a href=\"index?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Confirm</a>'

});
});
</script>";	
}else{
if (!empty($upload_file["name"])) {
$originalName = $upload_file["name"];
$extension = pathinfo($originalName, PATHINFO_EXTENSION);
$newFileName = uniqid(). "_" . $originalName;
$destination = "../upload/" . $newFileName;

while (file_exists($destination)) {
$newFileName = uniqid() . "_" . $originalName;
$destination = "../upload/" . $newFileName;
}

move_uploaded_file($upload_file["tmp_name"], $destination);

$sql_insert_home = "INSERT INTO tbl_event(event_title,event_name,event_description,event_start_time,date_entry,remarks_event,upload,username) VALUES(?,?,?,?,?,?,?,?)";
$stmt_insert_home = $conn->prepare($sql_insert_home) or die($conn->error);
$stmt_insert_home->bind_param("ssssssss",$event_title,$event_name,$description,$start_date,$end_date,$remarks,$newFileName,$username);
$stmt_insert_home->execute();
$stmt_insert_home->close();

header("location: index");

}else{
$sql_insert_home = "INSERT INTO tbl_event(event_title,event_name,event_description,event_start_time,date_entry,remarks_event,username) VALUES(?,?,?,?,?,?,?)";
$stmt_insert_home = $conn->prepare($sql_insert_home) or die($conn->error);
$stmt_insert_home->bind_param("sssssss",$event_title,$event_name,$description,$start_date,$end_date,$remarks,$username);
$newFileName = NULL;
$stmt_insert_home->execute();
$stmt_insert_home->close();

header("location: index");
}
}
}
#+++++++++++++++++++++++++

// event page

// add event modal query
if (isset($_POST["btnEventAdd"])) {
$event_user = $conn->escape_string(trim($_POST["event_user"]));
$event_title = $conn->escape_string(trim($_POST["event_title"]));
$start_date = $conn->escape_string(trim($_POST["start_date"]));
$end_date = $conn->escape_string(trim($_POST["end_date"]));
$event_description = $conn->escape_string(trim($_POST["event_description"]));
$remarks = $conn->escape_string(trim($_POST["remarks"]));
$username = $_SESSION["username"];
$uploadAddEvent_file = $_FILES["uploadAddEvent_files"];

$check_end_date = "SELECT * FROM tbl_event WHERE date_entry = '$end_date'";
$check_end_date_row = $conn->query($check_end_date) or die($conn->error);
$total_end_date = $check_end_date_row->num_rows;

if ($total_end_date > 0) {
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Schedule date was already booked, select other schedule',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a href=".'events'." type=".'button'." class=".'swal-success'.">Confirm</a>'
});
});
</script>"; 

}else if($givenDate  < $currentDate){

echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Schedule date was passed!!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a href=".'events'." type=".'button'." class=".'swal-success'.">Confirm</a>'
});
});
</script>";
}else if($givenDate ){
if (!empty($uploadAddEvent_file["name"])){

$origAddEventModal = $uploadAddEvent_file["name"];
$ext_addEvent_modal = pathinfo($origAddEventModal, PATHINFO_EXTENSION);
$newFile_add_event = uniqid() . "_" . $origAddEventModal;
$destEventAdd_modal = "../upload/" . $newFile_add_event;

while (file_exists($destEventAdd_modal)) {
$newFile_add_event = uniqid() . "_" . $origAddEventModal;
$destEventAdd_modal = "../upload/" . $newFile_add_event;
}

move_uploaded_file($uploadAddEvent_file["tmp_name"], $destEventAdd_modal);

$sql_insert_event = "INSERT INTO tbl_event(event_title,event_name,event_description,event_start_time,date_entry,remarks_event,upload,username) VALUES(?,?,?,?,?,?,?,?)";
$stmt_event = $conn->prepare($sql_insert_event) or die($conn->error);
$stmt_event->bind_param("ssssssss",$event_title,$event_user,$event_description,$start_date,$end_date,$remarks,$newFile_add_event,$_SESSION["username"]);
$stmt_event->execute();
$stmt_event->close();
header("location: events");

}else{
$sql_insert_event = "INSERT INTO tbl_event(event_title,event_name,event_description,event_start_time,date_entry,remarks_event,username) VALUES(?,?,?,?,?,?,?)";
$stmt_event = $conn->prepare($sql_insert_event) or die($conn->error);
$stmt_event->bind_param("sssssss",$event_title,$event_user,$event_description,$start_date,$end_date,$remarks,$_SESSION["username"]);
$newFile_add_event = NULL;
$stmt_event->execute();
$stmt_event->close();
header("location: events");
}
}
}

//

if (isset($_SESSION["username"])) {
$session_user = $_SESSION["username"];
#view table event query
$tbl_event_view = "SELECT * FROM tbl_event WHERE username='$session_user' ORDER BY event_id DESC";
$tbl_event_list = $conn->query($tbl_event_view) or die();
#----- 
} //end of username session


// ajax event filter
if (isset($_POST["eventSearch"]) AND isset($_SESSION["username"])) {

$eventSearch = $_POST["eventSearch"];
// echo $sql_event_filter = "SELECT tbl_user.username, tbl_event.* FROM tbl_user LEFT JOIN tbl_event ON tbl_user.username = tbl_event.username WHERE tbl_user.username = '".$_SESSION["username"]."' 
// AND (tbl_event.event_title LIKE '%$eventSearch%' OR tbl_event.event_name LIKE '%$eventSearch%')";
$sql_event_filter = "SELECT * FROM tbl_event WHERE username='".$_SESSION["username"]."' AND (event_title LIKE '%$eventSearch%' OR event_name LIKE '%$eventSearch%')";
$get_event_filter = $conn->query($sql_event_filter) or die($conn->error);
$total_event_filter = $get_event_filter->num_rows;
$data_event = "";

$data_event .="

<table class='table table-hover' id='table-event'>
<thead>
<tr class='text-center'>
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
<tbody>";


if ($total_event_filter > 0) {
$ctr = 1;
while ($row_event_filter = $get_event_filter->fetch_assoc()) {
$originalStartTime = $row_event_filter['event_start_time']; // Original date and time string
$dateStartTime = new DateTime($originalStartTime); 	// Create a DateTime object from the original string
$formatDateStartTime = $dateStartTime->format('M d, Y / h:i A');

$originalEndTime = $row_event_filter['date_entry']; 
$dateEndTime = new DateTime($originalEndTime);
$formatDateEndTime = $dateEndTime->format('M d, Y');
$data_event .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$row_event_filter["event_title"]."</td>
<td>".$row_event_filter["event_name"]."</td>
<td>".$row_event_filter["event_description"]."</td>
<td>".$formatDateStartTime."</td>
<td>".$formatDateEndTime."</td>
<td>".$row_event_filter["remarks_event"]."</td>
<td>";
if($row_event_filter["upload"] == "") {
// nothing happens here
}else{
$data_event .="<a href='../upload/".$row_event_filter['upload']."' type='button' target='_blank' class='text-danger fw-bolder text-decoration-none'><img class='img-fluid' width='50' height='50' src='../upload/".$row_event_filter['upload']."'></a>";
}
$data_event.="
</td>
<td>
<a href='#' id='".$row_event_filter['event_id']."' class='btn btn-outline-success editEvent-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateEvent'><i class='fa-solid fa-pencil'></i></a> <a href='#' id='".$row_event_filter['event_id']."' type='button' class='btn btn-outline-danger deleteEvent-data' data-bs-toggle='modal' data-bs-target='#modalDeleteEvent'><i class='fa-solid fa-eraser'></i></a>
</td>
</tr>";
$ctr++;
}
$data_event .= "</tbody>";
}else{
$data_event .='
<tbody>
<tr>
<td class="text-center fw-bolder text-danger" colspan="10"><h3 class="">No Records</h3></td>
</tr>
</tbody>
';
}
$data_event .="</table>";
echo $data_event;
}
// update event ajax json retrieve
if (isset($_POST["update_id"])) {
$update_id = $_POST["update_id"];
$query_update_event = "SELECT * FROM tbl_event WHERE event_id = '$update_id'";
$get_update_event = $conn->query($query_update_event) or die($conn->error);
$row_update_event = $get_update_event->fetch_assoc();
echo json_encode($row_update_event);
}
// 


// delete event ajax json retrieve
if (isset($_POST["delete_id_event"])) {
$delete_id_event = $_POST["delete_id_event"];
$query_del_event = "SELECT * FROM tbl_event WHERE event_id = '$delete_id_event'";
$get_del_event = $conn->query($query_del_event) or die($conn->error);
$row_del_event = $get_del_event->fetch_assoc();
echo json_encode($row_del_event);
}


// update event query
if (isset($_POST["btnUpdateEvent"])) {
if (!empty($_POST["update_id"])) {
$update_event_id = $_POST["update_id"];
$update_event_title = $conn->escape_string(trim($_POST["update_event_title"]));
$update_event_user = $conn->escape_string(trim($_POST["update_event_user"]));
$update_start_date = $conn->escape_string(trim($_POST["update_start_date"]));
$update_end_date = $conn->escape_string(trim($_POST["update_end_date"]));
$update_event_desc = $conn->escape_string(trim($_POST["update_event_desc"]));
$update_event_remarks = $conn->escape_string(trim($_POST["update_remarks"]));
$upload_event_update = $_FILES["update_upload_files"];


if (!empty($upload_event_update["name"])) {

$originalUpdatename = $upload_event_update["name"];
$ext_update_event = pathinfo($originalUpdatename, PATHINFO_EXTENSION);
$newfile_update_event = uniqid() . "_" . $originalUpdatename;
$update_destination  = "../upload/" . $newfile_update_event;

while (file_exists($update_destination)) {
$newfile_update_event = uniqid() . "_" . $originalUpdatename;
$update_destination = "../upload/" . $newfile_update_event;
}

move_uploaded_file($upload_event_update["tmp_name"], $update_destination);

if ($update_event_id != "") {

if($givenDate < $currentDate){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Date was already passed!!!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a href=".'events'." type=".'button'." class=".'swal-success'.">Confirm</a>'
});
});
</script>";
}else{
$sql_event_update = "UPDATE tbl_event SET event_title=?, event_name=?, event_description=?, event_start_time=?, date_entry=?, remarks_event=?, upload=? WHERE event_id=?";
$stmt_event_update = $conn->prepare($sql_event_update) or die($conn->error);
$stmt_event_update->bind_param("sssssssi",$update_event_title,$update_event_user,$update_event_desc,$update_start_date,$update_end_date, $update_event_remarks,$newfile_update_event,$update_event_id);
$stmt_event_update->execute();
$stmt_event_update->close();
header("location: events");		
}
}
}else{
if ($update_event_id != "") {

if($givenDate < $currentDate){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Date was already passed!!!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a href=".'events'." type=".'button'." class=".'swal-success'.">Confirm</a>'
});
});
</script>";
}else{
$sql_event_update = "UPDATE tbl_event SET event_title=?, event_name=?, event_description=?, event_start_time=?, date_entry=?, remarks_event=? WHERE event_id=?";
$stmt_event_update = $conn->prepare($sql_event_update) or die($conn->error);
$stmt_event_update->bind_param("ssssssi",$update_event_title,$update_event_user,$update_event_desc,$update_start_date,$update_end_date, $update_event_remarks,$update_event_id);
$newfile_update_event = NULL;
$stmt_event_update->execute();
$stmt_event_update->close();
header("location: events");		
}
}	
}
} 
}

// delete event query
if (isset($_POST["btnDeleteEvent"])) {
if (!empty($_POST["delete_id_event"])) {
$delete_id_event = intval($_POST["delete_id_event"]);

if ($delete_id_event != "") {
// trigger insert query before deleting the query
$sql_insert_arch = "INSERT INTO tbl_event_archives (event_archive_title, event_archive_name, event_archive_desc, event_archive_start_time, event_archive_date_entry, event_remarks_archive, event_upload_archives, event_username_archives, deleted_user_by) SELECT event_title, event_name, event_description, event_start_time, date_entry, remarks_event, upload, username, ? FROM tbl_event WHERE event_id = ?";
$get_insert_archive = $conn->prepare($sql_insert_arch) or die($conn->error);
$get_insert_archive->bind_param("si",$_SESSION["username"],$delete_id_event);
$get_insert_archive->execute();

$sql_del_event = "DELETE FROM tbl_event WHERE event_id=?";
$get_del_event = $conn->prepare($sql_del_event) or die($conn->error);
$get_del_event->bind_param("i", $delete_id_event);
$rs_del_event = $get_del_event->execute();

if ($rs_del_event == true) {
header("location: events");		
}
} 
}
}
#++++++++++++++++++++++++++++++++++++++++++++++++++

#++++++++++++++++++++++++++++++++++++++++++++++++
// baptismal Section

// view table baptismal
if (isset($_SESSION["username"])) {
$session_user = $_SESSION["username"];
$sql_baptismal = "SELECT *, fee AS total_fee FROM tbl_baptismal WHERE username='$session_user' ORDER BY baptismal_id DESC";
$get_baptismal = $conn->query($sql_baptismal) or die($conn->error);
}

// insert baptismal page
if (isset($_POST["btnBaptistEntry"])) {
$baptist_entry_reserve_date = $conn->escape_string(trim($_POST["baptist_entry_reserve_date"]));
$baptist_entry_time = $conn->escape_string(trim($_POST["baptist_entry_time"]));
$baptist_entry_amount = $conn->escape_string(trim($_POST["baptist_entry_amount"]));
$baptist_entry_date_baptize = $conn->escape_string(trim($_POST["baptist_entry_date_baptize"]));
$baptist_entry_name = $conn->escape_string(trim($_POST["baptist_entry_name"]));
$baptist_entry_gender = $conn->escape_string(trim($_POST["baptist_entry_gender"]));
$baptist_entry_add = $conn->escape_string(trim($_POST["baptist_entry_add"]));
$baptist_entry_bday = $conn->escape_string(trim($_POST["baptist_entry_bday"]));
$baptist_entry_birthPlace = $conn->escape_string(trim($_POST["baptist_entry_birthPlace"]));
$baptist_entry_father = $conn->escape_string(trim($_POST["baptist_entry_father"]));
$baptist_entry_fatherAdd = $conn->escape_string(trim($_POST["baptist_entry_fatherAdd"]));
$baptist_entry_mother = $conn->escape_string(trim($_POST["baptist_entry_mother"]));
$baptist_entry_motherAdd = $conn->escape_string(trim($_POST["baptist_entry_motherAdd"]));
$baptist_entry_contact = $conn->escape_string(trim($_POST["baptist_entry_contact"]));
$baptist_entry_marriageType = $conn->escape_string(trim($_POST["baptist_entry_marriageType"]));
$baptist_entry_priest = $conn->escape_string(trim($_POST["baptist_entry_priest"]));
$baptist_entry_ornum = $conn->escape_string(trim($_POST["baptist_entry_ornum"]));
$remarks = $conn->escape_string(trim($_POST["remarks"]));
$username = $_SESSION["username"];
$baptistUpload = $_FILES["upload_baptist"];

$check_reserve_date = "SELECT * FROM tbl_baptismal WHERE reservation_date='$baptist_entry_reserve_date'";
$get_reserve_date = $conn->query($check_reserve_date) or die($conn->error);
$total_reserve_date = $get_reserve_date->num_rows;

if ($total_reserve_date > 0) {
	echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
	echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Schedule date was already booked select other schedule',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." href=".'baptismal'.">Confirm</a>'
});
});
</script>";
}elseif($currentDate > $baptist_entry_reserve_date){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Schedule date was passed!!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." href=".'baptismal'.">Confirm</a>'
});
});
</script>";	
}else{
		$status = 'pending';
		if (!empty($baptistUpload["name"])) {
			$origBaptistUpload = $baptistUpload["name"];
			$ext_baptistUpload = pathinfo($origBaptistUpload, PATHINFO_EXTENSION);
			$new_filebaptistUpload = uniqid() ."_". $origBaptistUpload;
			$destBaptistUpload = "../upload/" . $new_filebaptistUpload;

			while (file_exists($destBaptistUpload)) {
				$new_filebaptistUpload = uniqid() ."_". $origBaptistUpload;
				$destBaptistUpload = "../upload/" . $new_filebaptistUpload;
			}

			move_uploaded_file($baptistUpload["tmp_name"], $destBaptistUpload);

			$sql_baptismal_insert = "INSERT INTO tbl_baptismal(reservation_date, time_reservation, baptismal_name, baptismal_date, gender, date_of_birth, birth_place, father_name, father_birth_place, mother_name, mother_birth_place, baptismal_address, contact, type_of_marriage, or_number, fee, priest, username, remarks, upload, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt_baptist = $conn->prepare($sql_baptismal_insert) or die($conn->error);
			$stmt_baptist->bind_param("sssssssssssssssssssss", $baptist_entry_reserve_date, $baptist_entry_time, $baptist_entry_name, $baptist_entry_date_baptize, $baptist_entry_gender, $baptist_entry_bday, $baptist_entry_birthPlace, $baptist_entry_father, $baptist_entry_fatherAdd, $baptist_entry_mother, $baptist_entry_motherAdd, $baptist_entry_add, $baptist_entry_contact, $baptist_entry_marriageType, $baptist_entry_ornum, $baptist_entry_amount, $baptist_entry_priest, $username, $remarks, $new_filebaptistUpload, $status);
			$stmt_baptist->execute();
			$stmt_baptist->close();
			header("location: baptismal");
		}else{
			$sql_baptismal_insert = "INSERT INTO tbl_baptismal(reservation_date, time_reservation, baptismal_name, baptismal_date, gender, date_of_birth, birth_place, father_name, father_birth_place, mother_name, mother_birth_place, baptismal_address, contact, type_of_marriage, or_number, fee, priest, username, remarks, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt_baptist = $conn->prepare($sql_baptismal_insert) or die($conn->error);
			$stmt_baptist->bind_param("ssssssssssssssssssss",$baptist_entry_reserve_date, $baptist_entry_time, $baptist_entry_name, $baptist_entry_date_baptize, $baptist_entry_gender, $baptist_entry_bday, $baptist_entry_birthPlace, $baptist_entry_father, $baptist_entry_fatherAdd, $baptist_entry_mother, $baptist_entry_motherAdd, $baptist_entry_add, $baptist_entry_contact, $baptist_entry_marriageType, $baptist_entry_ornum, $baptist_entry_amount, $baptist_entry_priest, $username, $remarks, $status);
			$new_filebaptistUpload = NULL;
			$stmt_baptist->execute();
			$stmt_baptist->close();
			header("location: baptismal");
		}
 }
}


// baptismal ajax filtering
if (isset($_POST["searchBaptist"])) {
	$searchBaptist = $_POST["searchBaptist"];

	$retrieve_baptist = "SELECT *, fee as total_fees FROM tbl_baptismal WHERE (reservation_date LIKE '%$searchBaptist%' || baptismal_name LIKE '%$searchBaptist%' || baptismal_date LIKE '%$searchBaptist%' || father_name LIKE '%$searchBaptist%' || mother_name LIKE '%$searchBaptist%') AND username='".$_SESSION["username"]."'";
	$get_retBaptist = $conn->query($retrieve_baptist) or die($conn->error);
	$total_retBaptist = $get_retBaptist->num_rows;
	$total_fees = 0;
	$data_baptist = "";

	$data_baptist .="

		<table class='table table-hover' id='table-baptist'>
	<thead>
		<tr class='text-center'>
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
		<th>Actions</th>
		</tr>
	</thead>
	<tbody>";

	if ($total_retBaptist > 0) {
		$ctr = 1;
		$peso_sign = "\xE2\x82\xB1";
		$total_fees = 0;
		while ($row_retBaptist = $get_retBaptist->fetch_assoc()) {
				$origReserveDate = $row_retBaptist["reservation_date"];
			$reservDate = new DateTime($origReserveDate);
			$formatReservdate = $reservDate->format("M d, Y");

			$origBapdate = $row_retBaptist["baptismal_date"];
			$baptismaldate = new DateTime($origBapdate);
			$formatbapDate = $baptismaldate->format("M d, Y");

			$origBday = $row_retBaptist["date_of_birth"];
			$reserBday = new DateTime($origBday);
			$formatBday = $reserBday->format("M d, Y");
			$total_fees += $row_retBaptist["fee"];

			$data_baptist .="

				<tr class='text-center'>
		<td>".$ctr."</td>
		<td>".$row_retBaptist["or_number"]."</td>
		<td>".$peso_sign.number_format($row_retBaptist["fee"])."</td>
		<td>".$formatReservdate."</td>
		<td>".$row_retBaptist["time_reservation"]."</td>
		<td>".$row_retBaptist["baptismal_name"]."</td>
		<td>".$row_retBaptist["baptismal_address"]."</td>
		<td>".$formatbapDate."</td>
		<td>".$row_retBaptist["gender"]."</td>
		<td>".$formatBday."</td>
		<td>".$row_retBaptist["birth_place"]."</td>
		<td>".$row_retBaptist["father_name"]."</td>
		<td>".$row_retBaptist["father_birth_place"]."</td>
		<td>".$row_retBaptist["mother_name"]."</td>
		<td>".$row_retBaptist["mother_birth_place"]."</td>
		<td>".$row_retBaptist["contact"]."</td>
		<td>".$row_retBaptist["type_of_marriage"]."</td>
		<td>".$row_retBaptist["priest"]."</td>

		<td>
			<a href='#' id='".$row_retBaptist['baptismal_id']."' class='btn btn-outline-success editBaptist-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateBap'><i class='fa-solid fa-pencil'></i></a> <a id='".$row_retBaptist['baptismal_id']."' href='#' type='button' class='btn btn-outline-danger deleteBaptist-data' data-bs-toggle='modal' data-bs-target='#modalDelBap'><i class='fa-solid fa-eraser'></i></a>
		</td>

	</tr>
	";
		$ctr++;
		}

	$data_baptist .="
	<tr>
		<th class='border' colspan='3'>Total Fees</th>
		<td class='border fw-bolder'>".$peso_sign.number_format($total_fees)."</td>
	</tr>
	";	

	}else{
		$data_baptist .= "
<tbody>
<tr>
<td class='text-center fw-bolder text-danger' colspan='19'><h3 class=''>No Records</h3></td>
</tr>
</tbody>
		";
	}

$data_baptist .= "</table>";
echo $data_baptist;	
}

if (isset($_POST["del_baptismal_id"])) {
    $del_baptismal_id = $_POST["del_baptismal_id"];
    
    // Assuming $conn is your database connection object
    $sql_baptistDel = "DELETE FROM tbl_baptismal WHERE baptismal_id='$del_baptismal_id'";
    
    if ($conn->query($sql_baptistDel)) {
        // If the delete operation was successful
        $response = array("success" => true, "message" => "Record deleted successfully");
    } else {
        // If there was an error in the delete operation
        $response = array("success" => false, "message" => "Error deleting record: " . $conn->error);
    }

    echo json_encode($response);
}




#++++++++++++++++++++++++++++++++++++++++++++++++


#+++++++++++++++++++++++++++++++++++++++++++++++
// wedding page
// view all wedding records
if (isset($_SESSION["username"])) {
	$session_user = $_SESSION["username"];
	$view_wedding_table = "SELECT *, fees AS total_fees FROM tbl_wedding WHERE encode_by ='$session_user' ORDER BY wedding_id DESC";
	$get_wedding_list = $conn->query($view_wedding_table) or die($conn->error);
}

// insert query
if (isset($_POST["btnAddWedding"])) {
	$entry_ceremony_date = $conn->escape_string(trim($_POST["entry_ceremony_date"]));
	$entry_ceremony_time = $conn->escape_string(trim($_POST["entry_ceremony_time"]));
	$entry_fee = $conn->escape_string(trim($_POST["entry_fee"]));
	$entry_bride_name = $conn->escape_string(trim($_POST["entry_bride_name"]));
	$entry_bride_cenomar = $_FILES["entry_bride_cenomar"];
	$entry_bride_contact = $conn->escape_string(trim($_POST["entry_bride_contact"]));
	$entry_groom_name = $conn->escape_string(trim($_POST["entry_groom_name"]));
	$entry_groom_cenomar = $_FILES["entry_groom_cenomar"];
	$entry_groom_contact = $conn->escape_string(trim($_POST["entry_groom_contact"]));
	$username = $_SESSION["username"];
	$entry_file = $_FILES["entry_file"];
	
	// Files for 'Bride' (b prefix)
	$bBaptismal = $_FILES['bBaptismal'];
	$bBirth = $_FILES['bBirth'];
	$bConfirmation = $_FILES['bConfirmation'];
	$b2x2 = $_FILES['b2x2'];
	$bGov1 = $_FILES['bGov1'];
	$bGov2 = $_FILES['bGov2'];

	// Files for 'Groom' (g prefix)
	$gBaptismal = $_FILES['gBaptismal'];
	$gBirth = $_FILES['gBirth'];
	$gConfirmation = $_FILES['gConfirmation'];
	$g2x2 = $_FILES['g2x2'];
	$gGov1 = $_FILES['gGov1'];
	$gGov2 = $_FILES['gGov2'];

	// Files for general documents
	$marriageLicense = $_FILES['marriageLicense'];
	$contractMatrimony = $_FILES['contractMatrimony'];

	// Non-file input
	$sponsors = $_POST['sponsors'];
	
	$check_ceremony_date = "SELECT * FROM tbl_wedding WHERE ceremony_date='$entry_ceremony_date'";
	$check_ceremony_date_row = $conn->query($check_ceremony_date) or die($conn->error);
	$total_ceremony_date = $check_ceremony_date_row->num_rows;

	if ($total_ceremony_date > 0) {
		echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Schedule date was already booked, select other schedule',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
 footer: '<a href=\"wedding?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Confirm</a>'
});
});
</script>"; 
	}else if($entry_ceremony_date < $currentDate){
		echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'The Date was already passed!!!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a href=\"wedding?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Confirm</a>'
});
});
</script>";
	}else{

// Function to move and rename the uploaded file
// Function to move and rename the file
function moveAndRenameFile($file){
    $origFileName = $file["name"];
    $file_ext = pathinfo($origFileName, PATHINFO_EXTENSION);
    $newFileName = uniqid(). "_" . $origFileName;
    $destination = "../upload/" . $newFileName;

    while (file_exists($destination)) {
        $newFileName = uniqid() . "_" . $origFileName;
        $destination = "../upload/" . $newFileName;
    }

    move_uploaded_file($file["tmp_name"], $destination);

    return $newFileName;
}

// Create an array for uploading files
$uploaded_files = array(
    "entry_bride_cenomar" => $entry_bride_cenomar,
    "entry_groom_cenomar" => $entry_groom_cenomar,
    "entry_file" => $entry_file,
    "bBaptismal" => $bBaptismal,
    "bBirth" => $bBirth,
    "bConfirmation" => $bConfirmation,
    "b2x2" => $b2x2,
    "bGov1" => $bGov1,
    "bGov2" => $bGov2,
    "gBaptismal" => $gBaptismal,
    "gBirth" => $gBirth,
    "gConfirmation" => $gConfirmation,
    "g2x2" => $g2x2,
    "gGov1" => $gGov1,
    "gGov2" => $gGov2,
    "marriageLicense" => $marriageLicense,
    "contractMatrimony" => $contractMatrimony
);

// Process each uploaded file
foreach ($uploaded_files as $key => $file) {
    if (!empty($file["name"])) {
        $originalFileName = $file["name"];
        $newFileName = moveAndRenameFile($file);
        $uploaded_files[$key] = $newFileName;
    }
}

// Insert data into the database
// Insert data into the database
if (!empty($entry_file["name"])) {
	$status = 'pending';
    $sql_insert_wed = "INSERT INTO tbl_wedding (
        bride_full_name, bride_cenomar, bride_contact, 
        groom_full_name, groom_cenomar, groom_contact, 
        ceremony_date, ceremony_time, fees, receipt, 
        encode_by, date_encoded,
        bBaptismal, bBirth, bConfirmation, b2x2, bGov1, bGov2, 
        gBaptismal, gBirth, gConfirmation, g2x2, gGov1, gGov2, 
        marriageLicense, contractMatrimony, sponsors, status
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt_insert_wed = $conn->prepare($sql_insert_wed) or die($conn->error);
    $stmt_insert_wed->bind_param(
        "sssssssssssssssssssssssssss",
        $entry_bride_name, $uploaded_files["entry_bride_cenomar"], $entry_bride_contact, 
        $entry_groom_name, $uploaded_files["entry_groom_cenomar"], $entry_groom_contact, 
        $entry_ceremony_date, $entry_ceremony_time, $entry_fee, 
        $uploaded_files["entry_file"], $username, 
        $uploaded_files['bBaptismal'],
        $uploaded_files['bBirth'],
        $uploaded_files['bConfirmation'],
        $uploaded_files['b2x2'],
        $uploaded_files['bGov1'],
        $uploaded_files['bGov2'],
        $uploaded_files['gBaptismal'],
        $uploaded_files['gBirth'],
        $uploaded_files['gConfirmation'],
        $uploaded_files['g2x2'],
        $uploaded_files['gGov1'],
        $uploaded_files['gGov2'],
        $uploaded_files['marriageLicense'],
        $uploaded_files['contractMatrimony'],
        $sponsors,
		$status
    );

    $stmt_insert_wed->execute();
    $stmt_insert_wed->close();
	header("location: wedding");

}
}
}

if(isset($_POST['del_weddingId'])){
    $id = $_POST['wedding_id'];

    // Perform deletion
    $sql_delete_wedding = "DELETE FROM tbl_wedding WHERE wedding_id = ?";
    $stmt_delete_wedding = $conn->prepare($sql_delete_wedding) or die($conn->error);
    $stmt_delete_wedding->bind_param("i", $id);

    if ($stmt_delete_wedding->execute()) {
        // Deletion successful
        $stmt_delete_wedding->close();

        // Redirect or show success message as needed
		header("location: ../users/wedding");
        exit();
    }
}

// ajax filter wedding
if (isset($_POST["weddingFilter"])) {
	$weddingFilter = $_POST["weddingFilter"];

	$sql_weddingFilter = "SELECT *, fees AS total_fees FROM tbl_wedding WHERE (bride_full_name LIKE '%$weddingFilter%' || ceremony_date LIKE '%$weddingFilter%' || groom_full_name LIKE '%$weddingFilter%') AND username='".$_SESSION["username"]."'";
	$get_weddingFilter = $conn->query($sql_weddingFilter) or die($conn->error);
	$total_weddingFilter = $get_weddingFilter->num_rows;
	$data_wedding = "";

	$data_wedding .="
<table class='table table-hover' id='table-wedding'>
	
<thead>
	<tr class='text-center'>
		<th colspan='4' class='border border-1 border-dark'>General Information</th>
		<th colspan='4' class='border border-1 border-dark'>Bride's Information</th>
		<th colspan='5' class='border border-1 border-dark'>Groom's Information</th>
	</tr>
	<tr>
		<th>No.</th>
		<th>Ceremony Date</th>
		<th>Ceremony Time</th>
		<th>Fees</th>
		<th>Receipt</th>
		<th>Full Name</th>
		<th>Cenomar</th>
		<th>Contact</th>
		<th>Full Name</th>
		<th>Cenomar</th>
		<th>Contact</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>";

if ($total_weddingFilter > 0) {
	$ctr = 1;
	$peso_sign = "\xE2\x82\xB1";
	$total_fees = 0;

	while ($row_wedding = $get_wedding_list->fetch_assoc()) {
		$origWedDate = $row_wedding["ceremony_date"];
		$wedDate = new DateTIme($origWedDate);
		$formatWedDate = $wedDate->format("M d, Y");

		$origWedTime = $row_wedding["ceremony_time"];
		$wedTime = new DateTime($origWedTime);
		$formatWedTime = $wedTime->format("h:i a");

		$total_fees += $row_wedding["fees"];

		$data_wedding .="

<tr class='text-center'>
	
<td>".$ctr."</td>
<td>".$formatWedDate."</td>
<td>".$formatWedTime."</td>
<td>".$peso_sign.number_format($row_wedding["fees"])."</td>
<td><a target='_blank' class=' text-success fw-bolder' href='../upload/".$row_wedding['receipt']."'>".shortenLinkName($row_wedding["receipt"])."</a></td>
<td>".$row_wedding["bride_full_name"]."</td>
<td><a class='text-success fw-bolder ' href='../upload/".$row_wedding['bride_cenomar']."'>".shortenLinkName($row_wedding["bride_cenomar"])."</a></td>
<td>".$row_wedding["bride_contact"]."</td>
<td>".$row_wedding["groom_full_name"]."</td>
<td><a target='_blank' href='../upload/".$row_wedding['groom_cenomar']."' class='text-success fw-bolder ' target='_blank'>".shortenLinkName($row_wedding["groom_cenomar"])."</a></td>
<td><".$row_wedding["groom_contact"]."></td>
<td>
	<a href='#' id='".$row_wedding['wedding_id']."' type='button' class='btn btn-outline-success editWedding-data' data-bs-toggle='modal' data-bs-target='#modalWeddingUpdate'><i class='fa-solid fa-pencil'></i></a> <a href='#' id='".$row_wedding['wedding_id']."' type='button' class='btn btn-outline-danger deleteWedding-data' data-bs-toggle='modal' data-bs-target='#modalWeddingDelete'><i class='fa-solid fa-eraser'></i></a>
</td>
</tr>
		";
		$ctr++;
	 }
	$data_wedding .="
	
	<tr>
		<th>Total Fees: </th>
		<td class='border fw-bolder'><".$peso_sign.number_format($total_fees)."></td>
	</tr>
	";

 }else{
 	$data_wedding .="

 	<tbody>
 	<tr>
 		<td class='text-center fw-bolder text-danger' colspan='12'><h3 class=''>No Records</h3></td>
 	</tr>
 	</tbody>

 	";
 }
 $data_wedding .="</table>";
 echo $data_wedding;
}

#++++++++++++++++++++++++++++++++++++++++++++++++



?>


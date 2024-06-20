<?php
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

$currentDate = date('Y-m-d');
$daysToSubtract = 100; // Change this value to set the number of days to subtract
// Calculate the given date by subtracting days from the current date
$givenDate = date("Y-m-d", strtotime("-$daysToSubtract days", strtotime($currentDate)));  


if (isset($_POST['announcementBtn'])) {
    // Handling image upload
    $imageData = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        if ($imageData === false) {
            echo "<script>alert('Error uploading image');</script>";
            exit;
        }
        // You might want to perform additional checks/validation on the image here
    }

    // Prepare announcement data
    $date = $conn->real_escape_string(trim($_POST["date"]));
    $time = $conn->real_escape_string(trim($_POST["time"]));
    $announcement = $conn->real_escape_string(trim($_POST["description"]));

    // SQL to insert data into tbl_announcement using prepared statement
    $sqlInsert = "INSERT INTO tbl_announcement (date, time, announcement, image) VALUES (?, ?, ?, ?)";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("ssss", $date, $time, $announcement, $imageData);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Announcement added successfully');</script>";
    } else {
        echo "<script>alert('Error adding announcement: " . $stmt->error . "');</script>";
    }

    // Close statement
    $stmt->close();
}

#for guest users registration
if (isset($_POST["btnReg"])) {
$lname = $conn->escape_string(trim($_POST["lname"]));
$fname = $conn->escape_string(trim($_POST["fname"]));
$mname = $conn->escape_string(trim($_POST["mname"]));
$contact = $conn->escape_string(trim($_POST["contact"]));
$email = $conn->escape_string(trim($_POST["email"]));
$username = $conn->escape_string(trim($_POST["username"]));
$password = $conn->escape_string(trim($_POST["password"]));
$address = $conn->escape_string(trim($_POST["address"]));

$check_user = "SELECT * FROM tbl_user WHERE username = '$username'";
$check_email = "SELECT * FROM tbl_user WHERE email = '$email'";

$check_user_row  = $conn->query($check_user) or die($conn->error);
$check_email_row  = $conn->query($check_email) or die($conn->error);

$total_user_row = $check_user_row->num_rows;
$total_email_row  = $check_email_row->num_rows;

if ($total_user_row > 0 || $total_email_row > 0) {
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'Email or Username is already exist',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." href=".'login'.">Confirm</a>'	
});
}); 
</script>";
}else{
$hash = password_hash($password, PASSWORD_BCRYPT);
$account_type = "guest";
$sql_insert = "INSERT INTO tbl_user(last_name,first_name,middle_name,contact,email,username,password,address,account_type) VALUES(?,?,?,?,?,?,?,?,?)";
$user_reg = $conn->prepare($sql_insert) or die($conn->error);
$user_reg->bind_param("sssssssss",$lname,$fname,$mname,$contact,$email,$username,$hash,$address,$account_type);
$user_reg->execute();
$user_reg->close();

echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
title: 'Success',
text: 'Registered Successfull!',
icon: 'success',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." class=".'btn btn-success'." href=".'login'.">Confirm</a>'
});
});

</script>";
}
}
#--------------


#-- for admin users registration

if (isset($_POST["btnAdmin"])) {
$lname = $conn->escape_string(trim($_POST["lname"]));
$fname = $conn->escape_string(trim($_POST["fname"]));
$mname = $conn->escape_string(trim($_POST["mname"]));
$contact = $conn->escape_string(trim($_POST["contact"]));
$email = $conn->escape_string(trim($_POST["email"]));
$username = $conn->escape_string(trim($_POST["username"]));
$password = $conn->escape_string(trim($_POST["password"]));
$address = $conn->escape_string(trim($_POST["address"]));

$check_user = "SELECT * FROM tbl_user WHERE username = '$username'";
$check_email = "SELECT * FROM tbl_user WHERE email = '$email'";

$check_user_row  = $conn->query($check_user) or die($conn->error);
$check_email_row  = $conn->query($check_email) or die($conn->error);

$total_user_row = $check_user_row->num_rows;
$total_email_row  = $check_email_row->num_rows;

if ($total_user_row > 0 || $total_email_row > 0) {
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'oops',
text: 'Email or Username is already exist',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." href=".'login'.">Confirm</a>'	
});
}); 
</script>";
}else{
$hash = password_hash($password, PASSWORD_BCRYPT);
$account_type = "admin";
$sql_insert = "INSERT INTO tbl_user(last_name,first_name,middle_name,contact,email,username,password,address,account_type) VALUES(?,?,?,?,?,?,?,?,?)";
$user_reg = $conn->prepare($sql_insert) or die($conn->error);
$user_reg->bind_param("sssssssss",$lname,$fname,$mname,$contact,$email,$username,$hash,$address,$account_type);
$user_reg->execute();
$user_reg->close();

echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
title: 'Success',
text: 'Registered Successfull!',
icon: 'success',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." class=".'btn btn-success'." href=".'login'.">Confirm</a>'
});
});

</script>";
}
}

#----

#-- for login

if (isset($_POST["btnLogin"])) {
$userLog = $conn->escape_string(trim($_POST["userLog"]));
$passLog = $conn->escape_string(trim($_POST["passLog"]));

$log_query = "SELECT * FROM tbl_user WHERE username='$userLog'";
$query_log = $conn->query($log_query) or die($conn->error);
$total_users = $query_log->num_rows;

if ($total_users > 0) {
while ($user_log = $query_log->fetch_assoc()) {
$user_id = $user_log["user_id"];
$db_user = $user_log["username"];
$db_pass = $user_log["password"];
$db_email = $user_log["email"];
$db_fname = $user_log["first_name"];
$db_lname = $user_log["last_name"];
$db_account_type = $user_log["account_type"];
$db_status = $user_log["status"];

// to check the case sensitivity of the username from input to stored database use strcmp method
if (password_verify($passLog,$db_pass) && strcmp($userLog, $db_user) === 0) {
$_SESSION["user_id"] = $user_id;
$_SESSION["username"] = $db_user;
$_SESSION["last_name"] = $db_lname;
$_SESSION["first_name"] = $db_fname;
$_SESSION["email"] = $db_email;
$_SESSION["account_type"] = $db_account_type;
$_SESSION["status"] = $db_status;

if ($db_account_type == "admin") {
if ($db_status == "reset") {
header("location: pass_verified");
}else{
header("location: main");
}
}else if($db_account_type == "guest"){
if ($db_status == "reset") {
header("location: pass_verified");
}else{
header("location: users");
}
}else{
header("location: super_admin");
}

}else{
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Wrong Password or kindly considerate the case sensitivity of the username!',
allowOutsideClick: false,
allowEscapeKey: false
});
});
</script>";
}

}
}else{
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'No Username Found!!',
allowOutsideClick: false,
allowEscapeKey: false
});
});
</script>";
}
}
#------

#--- super admin page

#view table query
//<> <--/show if not equal in a certain condition this query is use if you want not show a specific information base on your condition
$table_view = "SELECT * FROM tbl_user WHERE account_type <> 'super admin' ORDER BY user_id DESC";
$tbl_list = $conn->query($table_view) or die();


#===================================

// certificate request archive/
$sql_cert_req_arch = "SELECT *, cert_amount_archive AS total_cert_archive FROM tbl_cert_request_archive ORDER BY cert_req_id_archive DESC";
$get_cert_req_archive = $conn->query($sql_cert_req_arch) or die($conn->error);


// certicate request archive ajax request
if (isset($_POST["reqCertArchiveId"])) {
	$reqCertArchiveId = $_POST["reqCertArchiveId"];
	$sql_certReqArchive = "SELECT * FROM tbl_cert_request_archive WHERE cert_req_id_archive = '$reqCertArchiveId'";
	$get_certReqArch = $conn->query($sql_certReqArchive) or die($conn->error);
	$row_certReqArch = $get_certReqArch->fetch_assoc();
	echo json_encode($row_certReqArch);
}

// restore certifcate archive
// for avoiding redundant codes for not using an !empty method instead using isset
if (isset($_POST["btnCertReqRestore"]) && isset($_POST["reqCertArchiveId"])) {
	$reqCertArchiveId = intval($_POST["reqCertArchiveId"]);

	$sql_CertReqArch = "INSERT INTO tbl_cert_request(person_name, date_of_birth, year_baptized, year_confirmed, mother_name, father_name, requesting_person_name, requesting_person_add, contact, relationship, date_request, request_type, certificate_purpose, cert_amount, cert_others, username) SELECT person_name_archive, date_of_birth_archive, year_baptized_archive, year_confirmed_archive, mother_name_archive, father_name_archive, requesting_person_name_archive, requesting_person_add_archive, contact_archive, relationship_archive, date_request_archive, request_type_archive, certificate_purpose_archive, cert_amount_archive, cert_others_archive, username_archive FROM tbl_cert_request_archive WHERE cert_req_id_archive=?"; 
	$get_insertCertReqArch = $conn->prepare($sql_CertReqArch) or die($conn->error);
	$get_insertCertReqArch->bind_param("i", $reqCertArchiveId);
	$get_insertCertReqArch->execute();

	$sql_del_certReqArch = "DELETE FROM tbl_cert_request_archive WHERE cert_req_id_archive=?";
	$get_del_certReqArch = $conn->prepare($sql_del_certReqArch) or die($conn->error);
	$get_del_certReqArch->bind_param("i", $reqCertArchiveId);
	$rs_del_certReqArch = $get_del_certReqArch->execute();

	if ($rs_del_certReqArch === true) {
		header("location: request-certificate-archives");
	}

}

// ajax filtering
if (isset($_POST["sreq_cert_arch"])) {
	$sreq_cert_arch = $_POST["sreq_cert_arch"];

	$searchCertReqArch = "SELECT *, cert_amount_archive AS total_cert_archive FROM tbl_cert_request_archive WHERE person_name_archive LIKE '%$sreq_cert_arch%' || contact_archive LIKE '%sreq_cert_arch%'";
	$get_CertReqArchFilter = $conn->query($searchCertReqArch) or die($conn->error);
	$total_CertReqArchFilter = $get_CertReqArchFilter->num_rows;
	$total_amount_archive = 0;
	$data_CertReqArchFilter = "";

	$data_CertReqArchFilter .= "


	<table class='table table-hover' id='table-certReqArchive'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Request</th>
<th>Person's Name(Baptized/Confirmed)</th>
<th>Birthday</th>
<th>Request Type</th>
<th>Others</th>
<th>Purpose</th>
<th>Year Baptized</th>
<th>Year Confirmed</th>
<th>Father's Name</th>
<th>Mother's Name(Maiden)</th>
<th>Requestor</th>
<th>Requestor Address</th>
<th>Contact</th>
<th>Relationship</th>
<th>Amount</th>
<th>Deleted By</th>
<th>Date Deleted</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
	";

if ($total_CertReqArchFilter > 0) {
	$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
while ($row_req_cert_archiveFilter = $get_CertReqArchFilter->fetch_assoc()) {
$origdateBirth = $row_req_cert_archiveFilter["date_of_birth_archive"];
$dateBirth = new DateTime($origdateBirth);
$formatDateBirth = $dateBirth->format("M d, Y");

$orig_req_date = $row_req_cert_archiveFilter["date_request_archive"];
$dateReq = new DateTime($orig_req_date);
$formatReqDate = $dateReq->format("M d, Y");

$total_amount_archive += $row_req_cert_archiveFilter["cert_amount_archive"];


$data_CertReqArchFilter .= "

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatReqDate."</td>
<td>".$row_req_cert_archiveFilter["person_name_archive"]."</td>
<td>".$formatDateBirth."</td>
<td>".$row_req_cert_archiveFilter["request_type_archive"]."</td>
<td>".$row_req_cert_archiveFilter["cert_others_archive"]."</td>
<td>".$row_req_cert_archiveFilter["certificate_purpose_archive"]."</td>
<td>".$row_req_cert_archiveFilter["year_baptized_archive"]."</td>
<td>".$row_req_cert_archiveFilter["year_confirmed_archive"]."</td>
<td>".$row_req_cert_archiveFilter["father_name_archive"]."</td>
<td>".$row_req_cert_archiveFilter["mother_name_archive"]."</td>
<td>".$row_req_cert_archiveFilter["requesting_person_name_archive"]."</td>
<td>".$row_req_cert_archiveFilter["requesting_person_add_archive"]."</td>
<td>".$row_req_cert_archiveFilter["contact_archive"]."</td>
<td>".$row_req_cert_archiveFilter["relationship_archive"]."</td>
<td>".$peso_sign.number_format($row_req_cert_archiveFilter["cert_amount_archive"])."</td>
<td>".$row_req_cert_archiveFilter["deleted_by"]."</td>
<td>".$row_req_cert_archiveFilter["date_deleted"]."</td>

<td>
<a href='#' id='".$row_req_cert_archiveFilter["cert_req_id_archive"]."' class='btn btn-outline-primary ret_cert_req_arch' type='button' data-bs-toggle='modal' data-bs-target='#modalCertReqArch'><i class='fa-solid fa-plus fw-bolder'></i></a>
";
$ctr++;
}

$data_CertReqArchFilter .= "
	<tr>
	<th class='border' colspan='3'>Total Amount</th>
	<td class='border fw-bolder'>".$peso_sign.number_format($total_amount_archive)."</td>
</tr>
";

 }else{
$data_CertReqArchFilter .= "
<tbody>
	<tr>
	<td class='text-center fw-bolder text-danger' colspan='19'><h3>No Records!!</h3></td>
	</tr>
</tbody>
";
 }

$data_CertReqArchFilter .= "</table>";
echo $data_CertReqArchFilter;
}

#==================================


// donate tracking records
#view table donate query
$stbl_donate_view = "SELECT *, donate_amount AS total_amount FROM tbl_donate ORDER BY donate_on DESC"; //select and adding total amount on all rows
$stbl_donate_list = $conn->query($stbl_donate_view) or die($conn->error);


if (isset($_POST["sgetDonations"])) {
$sgetDonations = $_POST["sgetDonations"];

$retrieve_donate = "SELECT *, donate_amount AS total_amount FROM tbl_donate WHERE donate_name LIKE '%$sgetDonations%' || encoded_by LIKE '%$sgetDonations%' || edited_by LIKE '%$sgetDonations%' || date_encoded LIKE '%$sgetDonations%' || donate_on LIKE'%$sgetDonations%'";
$get_donate = $conn->query($retrieve_donate) or die($conn->error);
$total_row = $get_donate->num_rows;
$data = "";

$data .="

<table class='table table-hover' id='table-donate'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Donators Name</th>
<th>Amount</th>
<th>Donated On</th>
<th>Description</th>
<th>Encoded by</th>
<th>Date Encode</th>
<th>Updated by</th>
<th>Date Updated</th>
</tr>
</thead>
<tbody>";

if ($total_row > 0) {

$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;	//initial total amount to 0

while ($row_donate = $get_donate->fetch_assoc()) {
$originalStartTime = $row_donate["donate_on"]; // Original date and time string
$dateStartTime = new DateTime($originalStartTime); 	// Create a DateTime object from the original string
$formatDateStartTime = $dateStartTime->format("M d, Y");

$origDateEncoded = $row_donate["date_encoded"];
$origDateTime = new DateTime($origDateEncoded);
$dateEncode = $origDateTime->format("M d, Y / h:i A");

$origUpdateDate = $row_donate["date_updated"];
$origUpdateDateTime = new DateTime($origUpdateDate);
$dateUpdate = $origUpdateDateTime->format("M d, Y / h:i A");

$total_amount += $row_donate["donate_amount"]; //accumulate or adding all amount on rows to get total amount


$data .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$row_donate['donate_name']."</td>
<td>".$row_donate['donate_amount']."</td>
<td>".$formatDateStartTime."</td>
<td>".$row_donate['donate_description']."</td>
<td>".$row_donate['encoded_by']."</td>
<td>".$dateEncode."</td>
<td>".$row_donate['edited_by']."</td>
<td>".$dateUpdate."</td>
</tr>
";

$ctr++;
}

$data .= "

<tr class='text-center'>
<th class='border'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>
</tbody>
";

}else{
$data .="
<tbody>
	<tr>
		<td class='text-center fw-bolder text-danger' colspan='9'><h3 class=''>No Records</h3></td>
	</tr>
	</tbody>
";
}
$data .="
</table>
";
echo $data;
}


// donation tracking search between dates
if (isset($_POST["from_donate_track_date"], $_POST["to_donate_track_date"])) {
$from_date = $_POST["from_donate_track_date"];
$to_date = $_POST["to_donate_track_date"];
$query_donate_track = "SELECT * FROM tbl_donate WHERE donate_on BETWEEN '$from_date' AND '$to_date'";
$get_query_track = $conn->query($query_donate_track) or die($conn->error);
$total_row = $get_query_track->num_rows;
$data = "";

$data .= "

<table class='table table-hover' id='table-donate'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Donators Name</th>
<th>Amount</th>
<th>Donated On</th>
<th>Description</th>
<th>Encoded by</th>
<th>Date Encode</th>
<th>Updated by</th>
<th>Date Updated</th>
</tr>
</thead>
<tbody>

";

if ($total_row > 0) {
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;	//initial total amount to 0
while ($row_donate = $get_query_track->fetch_assoc()) {
$originalStartTime = $row_donate["donate_on"]; // Original date and time string
$dateStartTime = new DateTime($originalStartTime); 	// Create a DateTime object from the original string
$formatDateStartTime = $dateStartTime->format("M d, Y");

$origDateEncoded = $row_donate["date_encoded"];
$origDateTime = new DateTime($origDateEncoded);
$dateEncode = $origDateTime->format("M d, Y / h:i A");

$origUpdateDate = $row_donate["date_updated"];
$origUpdateDateTime = new DateTime($origUpdateDate);
$dateUpdate = $origUpdateDateTime->format("M d, Y / h:i A");

$total_amount += $row_donate["donate_amount"]; //accumulate or adding all amount on rows to get total amount

$data .="
<tr class='text-center'>
<td>". $ctr."</td>
<td>".$row_donate["donate_name"]."</td>
<td>".$peso_sign.$row_donate["donate_amount"]."</td>
<td>".$formatDateStartTime."</td>
<td>".$row_donate["donate_description"]."</td>
<td>".$row_donate["encoded_by"]."</td>
<td>".$dateEncode."</td>
<td>".$row_donate["edited_by"]."</td>
<td>".$dateUpdate."</td>
</tr>
";
$ctr++;
}

$data .="

<tr class='text-center'>
<th class='border'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>
</tbody>
";

}else{
$data .="

<tbody>
<tr class='text-center'>
<td colspan='9'><h3 class='text-danger fw-bolder '>No Records!!</h3></td>
</tr>
</tbody>

";
}

$data .="</table>";
echo $data;
}

#===================================




// church expenses tracking

// view all table row
$view_churchTracking = "SELECT *, expenses AS total_amount FROM tbl_church_expenses ORDER BY expenses_id DESC";
$get_churchTracking = $conn->query($view_churchTracking) or die($conn->error);


if (isset($_POST["sgetChurchExp"])) {
$sgetChurchExp = $_POST["sgetChurchExp"];

$retrieve_churcExp = "SELECT *, expenses AS total_amount FROM tbl_church_expenses WHERE tin  LIKE '%$sgetChurchExp%' || date_receipt LIKE '%$sgetChurchExp%' ";
$get_churchExp = $conn->query($retrieve_churcExp) or die($conn->error);
$total_row = $get_churchExp->num_rows;
$data = "";

$data .="

<table class='table table-hover' id='table-expenses'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Receipt</th>
<th>Description</th>
<th>TIN</th>
<th>Expenses</th>
<th>Encode By</th>
<th>Date Encode</th>
<th>Updated by</th>
<th>Date Updated</th>
</tr>
</thead>
<tbody>";

if ($total_row > 0) {

$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;	//initial total amount to 0

while ($row_churchexp = $get_churchExp->fetch_assoc()) {
$originalStartTime = $row_churchexp["date_receipt"]; // Original date and time string
$dateStartTime = new DateTime($originalStartTime); 	// Create a DateTime object from the original string
$formatDateStartTime = $dateStartTime->format("M d, Y");

$origDateEncoded = $row_churchexp["date_encode"];
$origDateTime = new DateTime($origDateEncoded);
$dateEncode = $origDateTime->format("M d, Y / h:i A");

$origUpdateDate = $row_churchexp["date_updated"];
$origUpdateDateTime = new DateTime($origUpdateDate);
$dateUpdate = $origUpdateDateTime->format("M d, Y / h:i A");

$total_amount += $row_churchexp["expenses"]; //accumulate or adding all amount on rows to get total amount


$data .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatDateStartTime."</td>
<td>".$row_churchexp['description']."</td>
<td>".$row_church['type_of_transaction']."></td>
<td>".$row_churchexp['tin']."</td>
<td>".$row_churchexp['expenses']."</td>
<td>".$row_churchexp['encode_by']."</td>
<td>".$dateEncode."</td>
<td>".$row_churchexp['updated_by']."</td>
<td>".$dateUpdate."</td>
</tr>
";

$ctr++;
}

$data .= "

<tr class='text-center'>
<th class='border'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>
</table>
";

}else{
$data .="
<tbody>
	<tr>
		<td class='text-center fw-bolder text-danger' colspan='9'><h3 class=''>No Records</h3></td>
	</tr>
	</tbody>
";
}
$data .="
</table>
";
echo $data;
}

// filter church expenses between dates
if (isset($_POST["from_churchexp_track_date"], $_POST["to_churchexp_track_date"])) {
$from_date = $_POST["from_churchexp_track_date"];
$to_date =  $_POST["to_churchexp_track_date"];

$query_church_track = "SELECT * FROM tbl_church_expenses WHERE date_receipt BETWEEN '$from_date' AND '$to_date'";
$get_church_track = $conn->query($query_church_track) or die($conn->error);
$total_row = $get_church_track->num_rows;
$data = "";


$data .="

<table class='table table-hover' id='table-expenses'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Receipt</th>
<th>Description</th>
<th>TIN</th>
<th>Expenses</th>
<th>Encode By</th>
<th>Date Encode</th>
<th>Updated by</th>
<th>Date Updated</th>
</tr>
</thead>
<tbody>";

if ($total_row > 0) {
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_expenses = 0;	//initial total amount to 0
while ($row_expenses = $get_church_track->fetch_assoc()) {

$originalStartTime = $row_expenses["date_receipt"]; // Original date and time string
$dateStartTime = new DateTime($originalStartTime); 	// Create a DateTime object from the original string
$formatDateStartTime = $dateStartTime->format("M d, Y");

$origDateEncoded = $row_expenses["date_encode"];
$origDateTime = new DateTime($origDateEncoded);
$dateEncode = $origDateTime->format("M d, Y / h:i A");

$origUpdateDate = $row_expenses["date_updated"];
$origUpdateDateTime = new DateTime($origUpdateDate);
$dateUpdate = $origUpdateDateTime->format("M d, Y / h:i A");

$total_expenses += $row_expenses["expenses"]; //accumulate or adding all amount on rows to get total amount


$data .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatDateStartTime."</td>
<td>".$row_expenses["description"]."</td>
<td>".$row_expenses["tin"]."</td>
<td>".$peso_sign.number_format($row_expenses["expenses"])."</td>
<td>".$row_expenses["encode_by"]."</td>
<td>".$dateEncode."</td>
<td>".$row_expenses["updated_by"]."</td>
<td>".$dateUpdate."</td>
</tr>	

";
$ctr++;
}
$data .="

<tr>
<th class='border'>Total Expenses</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_expenses)."</td>
</tr>
</tbody>
";
}else{
$data .="

<tbody>
<tr class='text-center'>
<td colspan='9'><h3 class='text-danger fw-bolder '>No Records!!</h3></td>
</tr>
</tbody>

";
}

$data .="</table>";
echo $data;
}


// baptismal archive
// view all table row
$view_baptistArch = "SELECT *, fee_arch AS total_fees FROM tbl_baptismal_archive ORDER BY baptismal_id_arch DESC";
$get_baptistArch = $conn->query($view_baptistArch) or die($conn->error);

// baptismal retrieve archive
if (isset($_POST["editBaptistArch_data"])) {
	$editBaptistArch_data = $_POST["editBaptistArch_data"];
	$query_baptistArch = "SELECT * FROM tbl_baptismal_archive WHERE baptismal_id_arch='$editBaptistArch_data'";
	$get_baptistArchRetrieve = $conn->query($query_baptistArch) or die($conn->error);
	$row_baptistArchRetrieve = $get_baptistArchRetrieve->fetch_assoc();
	echo json_encode($row_baptistArchRetrieve);
}

// retrieve baptismal records from archive
if (isset($_POST["btnBaptisRestore"])) {
	if (!empty($_POST["editBaptistArch_data"])) {
		$delete_baptist_arch = intval($_POST["editBaptistArch_data"]);
		if ($delete_baptist_arch != "") {
				$sql_insert_baptist = "INSERT INTO tbl_baptismal(reservation_date, time_reservation, baptismal_name, baptismal_date, gender, date_of_birth, birth_place, father_name, father_birth_place, mother_name, mother_birth_place, baptismal_address, contact, type_of_marriage, or_number, fee, priest, username) SELECT reservation_date_arch, time_reservation_arch, baptismal_name_arch, baptismal_date_arch, gender_arch, date_of_birth_arch, birth_place_arch, father_name_arch, father_birth_place_arch, mother_name_arch, mother_birth_place_arch, baptismal_address_arch, contact_arch, type_of_marriage_arch, or_number_arch, fee_arch, priest_arch, username_arch FROM tbl_baptismal_archive WHERE baptismal_id_arch=?";
		$get_insert_baptist = $conn->prepare($sql_insert_baptist) or die($conn->error);
		$get_insert_baptist->bind_param("i",$delete_baptist_arch);
		$get_insert_baptist->execute();

		$sql_del_baptist = "DELETE FROM tbl_baptismal_archive WHERE baptismal_id_arch=?";
		$get_del_baptist = $conn->prepare($sql_del_baptist) or die($conn->error);
		$get_del_baptist->bind_param("i", $delete_baptist_arch);
		$rs_del_baptist = $get_del_baptist->execute();

		if ($rs_del_baptist == true) {
			header("location: baptismal-archives");
		}

		}
	}
}

// stop here
// next is baptismal archive live search filter

#===================================


// update user ajax retrieve
if (isset($_POST["user_name"])) {
$user_name = $_POST["user_name"];
$query_update_user = "SELECT * FROM tbl_user WHERE user_id='$user_name'";
$get_user_update = $conn->query($query_update_user) or die($conn->error);
$row_user_update = $get_user_update->fetch_assoc();
echo json_encode($row_user_update);
}
// 


// delete user ajax retrieve
if (isset($_POST["user_delete"])) {
$user_delete = $_POST["user_delete"];
$query_delete_user = "SELECT * FROM tbl_user WHERE user_id='$user_delete'";
$get_delete_user = $conn->query($query_delete_user) or die($conn->error);
$row_delete_user = $get_delete_user->fetch_assoc();

// Concatenate first_name and last_name to create a full name
$full_name = $row_delete_user["first_name"]. " " . $row_delete_user["middle_name"] . " " . $row_delete_user["last_name"];

// Add full_name to the response before sending to json response
$row_delete_user["full_name"] = $full_name;

echo json_encode($row_delete_user);
}

// udpate user name
if (isset($_POST["btnUpdateUser"])) {
$user_name = $_POST["user_name"];
if (!empty($user_name)) {
$username = $conn->escape_string(trim($_POST["username"]));
if ($user_name != "") {
$sql_update_user = "UPDATE tbl_user SET username=? WHERE user_id=?";
$stmt_update_user = $conn->prepare($sql_update_user) or die($conn->error);
$stmt_update_user->bind_param("si", $username, $user_name);
$stmt_update_user->execute();
$stmt_update_user->close();

echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
Swal.fire({
title: 'Success',
text: 'Update Successfull!',
icon: 'success',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." class=".'btn btn-success'." href=".'index'.">Confirm</a>'
});

</script>";
}
}
}

// delete user name
if (isset($_POST["btnDeleteUser"])) {
$user_delete = intval($_POST["user_delete"]);
if (!empty($user_delete)) {
if ($user_delete != "") {
$sql_del_user = "DELETE FROM tbl_user WHERE user_id=?";
$get_del_user = $conn->prepare($sql_del_user) or die($conn->error);
$get_del_user->bind_param("i", $user_delete);
$rs_del_user = $get_del_user->execute();
if ($rs_del_user == true) {
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
title: 'Success',
text: 'Delete Successfull!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." class=".'btn btn-success'." href=".'index'.">Confirm</a>'
});
});

</script>";				
}
}
}
}
#-----


// users account page
#- live search ajax
if (isset($_POST["name"])) {
$name = $_POST["name"];

// this sample query is not show the all account_type super admin users in search
$sql_live = "SELECT * FROM tbl_user WHERE (last_name LIKE '%$name%' || first_name LIKE '%$name%' || middle_name LIKE '%$name%' || account_type LIKE '%$name%' || email LIKE '%$name%' || username LIKE '%$name%') AND account_type <> 'super admin' ORDER BY user_id DESC";
$get_live = $conn->query($sql_live) or die();
$total = $get_live->num_rows;
$data = "";

$data .="

<table class='table table-hover border border-1 border-dark'>
<thead>
<tr class='text-center'>
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

";

if ($total >0) {
$ctr = 1;
while ($row_live = $get_live->fetch_assoc()) {
$data .="

<tbody>
<tr class='text-center'>
<td>".$ctr."</td>
<td>".$row_live['last_name']."</td>
<td>".$row_live['first_name']."</td>
<td>".$row_live['middle_name']."</td>
<td>".$row_live['email']."</td>
<td>".$row_live['username']."</td>
<td>".$row_live['account_type']."</td>
<td>
<a href='#' class='btn btn-outline-primary edit-data' data-bs-toggle='modal' data-bs-target='#modalUpdate' type='button' id='".$row_live['user_id']."'><i class='fa-solid fa-rotate-left'></i></a> <a href='#' type='button' class='btn btn-outline-success editUser' data-bs-toggle='modal' data-bs-target='#modalUpdateUser' id='".$row_live['user_id']."'><i class='fas fa-underline'></i></a> <a href='#' id='".$row_live['user_id']."' class='btn btn-outline-danger deleteUser' type='button' data-bs-toggle='modal' data-bs-target='#modalDeleteUser'><i class='fas fa-eraser'></i></a>
</td>
</tr>
</tbody>

";
$ctr++;
}

}else{
$data .="
<tbody>
<tr>
<td colspan='8' class='text-center fw-bolder text-danger '>No Record Found</td>
</tr>
</tbody>
";
}
$data .= "</table>";
echo $data;
}

#modal-retrieve ajax
if (isset($_POST["user_id"])) {
$user_id = $_POST["user_id"];
$query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
$get = $conn->query($query) or die($conn->error);
$row = $get->fetch_assoc();
echo json_encode($row);
}


#- reset password
if (isset($_POST["btnUpdatePassword"])) {

if (!empty($_POST["user_id"])) {
$user_id = $_POST["user_id"];
$update_pass = $conn->escape_string(trim($_POST["update_password"]));

if ($user_id != "") {
$hash_update = password_hash($update_pass, PASSWORD_BCRYPT);
$status = "reset";	 
$sql_update_pass = "UPDATE tbl_user SET password=?, status=? WHERE user_id=?";
$stmt_update_pass = $conn->prepare($sql_update_pass) or die($conn->error);
$stmt_update_pass->bind_param("ssi", $hash_update,$status,$user_id);
$stmt_update_pass->execute();
$stmt_update_pass->close();

echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
Swal.fire({
title: 'Success',
text: 'Update Password Successfull!',
icon: 'success',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." class=".'btn btn-success'." href=".'index'.">Confirm</a>'
});

</script>";
}
}
}
#--

#-password verified
if (isset($_POST["btnPassVerified"])) {
if (!empty($_POST["user_id"])) {
$verify_user_id = $_POST["user_id"];
$pass_verified = $conn->escape_string(trim($_POST["pass_verified"]));

if ($verify_user_id != "") {
$hash_verified = password_hash($pass_verified, PASSWORD_BCRYPT);
$status = "verified";
$sql_update_verified = "UPDATE tbl_user SET password=?, status=? WHERE user_id=?";
$stmt_pass_verify = $conn->prepare($sql_update_verified) or die($conn->error);
$stmt_pass_verify->bind_param("ssi", $hash_verified,$status,$verify_user_id);
$stmt_pass_verify->execute();
$stmt_pass_verify->close();

echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
Swal.fire({
title: 'Success',
text: 'Congratulations you can now proceed to login with your new personal password!',
icon: 'success',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=".'swal-success'." type=".'button'." class=".'btn btn-success'." href=".'logout'.">Confirm</a>'
});

</script>";
}
}
}
#--
// 

#view table event archive
$table_view_archive = "SELECT * FROM tbl_event_archives ORDER BY event_archive_id DESC";
$tbl_event_list_archive = $conn->query($table_view_archive) or die($conn->error);
#------------

// event archive restore
if (isset($_POST["btnEventArchiveRestore"])) {
if (!empty($_POST["eventArchiveId"])) {
$eventArchiveId = intval($_POST["eventArchiveId"]);
if ($eventArchiveId != "") {
$sql_insertEventArch = "INSERT INTO tbl_event(event_title, event_name, event_description, event_start_time, date_entry, remarks_event, upload, username) SELECT event_archive_title, event_archive_name, event_archive_desc, event_archive_start_time, event_archive_date_entry, event_remarks_archive, event_upload_archives, event_username_archives FROM tbl_event_archives WHERE event_archive_id=?";
$get_insertEventArch = $conn->prepare($sql_insertEventArch) or die($conn->error);
$get_insertEventArch->bind_param("i", $eventArchiveId);
$get_insertEventArch->execute();

$sql_delArch = "DELETE FROM tbl_event_archives WHERE event_archive_id=?";
$get_delArch = $conn->prepare($sql_delArch) or die($conn->error);
$get_delArch->bind_param("i",$eventArchiveId);
$rs_delArch = $get_delArch->execute();

if ($rs_delArch == true) {
header("location: event-archives");
}
}
}
}

// event_archive page ajax filter
if (isset($_POST["eventArchive"])) {
$eventArchive = $_POST["eventArchive"];

$retrieve_eventArch = "SELECT * FROM tbl_event_archives WHERE event_archive_name LIKE '%$eventArchive%' || event_archive_title LIKE '%$eventArchive%'";
$get_eventArch = $conn->query($retrieve_eventArch) or die($conn->error);
$total_eventArch = $get_eventArch->num_rows;
$data_eventArch = "";

$data_eventArch .="

<table class='table table-hover' id='table-event-archive'>
<thead>
<tr class='text-center'>
<th>No.</th>
<th>Title</th>
<th>Name</th>
<th>Description</th>
<th>Start Time</th>
<th>Date Book</th>
<th>Remarks</th>
<th>Usernamme</th>
<th>Deleted User By</th>
<th>Date Deleted</th>
<th>Actions</th>
</tr>
</thead>
<tbody>";		

if ($total_eventArch > 0) {
$ctr = 1;
while ($row_event_archive = $get_eventArch->fetch_assoc()) {
$origEventArchStartTime = $row_event_archive["event_archive_start_time"];
$dateEventArchStartTime = new DateTime($origEventArchStartTime);
$formatDateStartTime = $dateEventArchStartTime->format("M d, Y / h:i A");

$origEventArchEndTime = $row_event_archive["event_archive_date_entry"];
$dateEventArchEndTime = new DateTime($origEventArchEndTime);
$formatDateEndTime = $dateEventArchEndTime->format("M d, Y");

$origEventArchDeletedBy = $row_event_archive["date_deleted"];
$dateEventArchDeletedBy = new DateTime($origEventArchDeletedBy);
$formatDateDeletedBy = $dateEventArchDeletedBy->format("M d, Y / h:i A");

$data_eventArch.="
<tr class='text-center'>
<td>".$ctr."</td>
<td>".$row_event_archive["event_archive_title"]."</td>
<td>".$row_event_archive["event_archive_name"]."</td>
<td>".$row_event_archive["event_archive_desc"]."</td>
<td>".$formatDateStartTime."</td>
<td>".$formatDateEndTime."</td>
<td>".$row_event_archive["event_remarks_archive"]."</td>
<td>".$row_event_archive["event_username_archives"]."</td>
<td>".$row_event_archive["deleted_user_by"]."</td>
<td>".$formatDateDeletedBy."</td>
<td>
<a href='#' class='btn btn-outline-primary eventArchData' data-bs-toggle='modal' data-bs-target='#modalEventArchive' type='button' id='".$row_event_archive['event_archive_id']."'><i class='fa-solid fa-plus fw-bolder'></i></a>
</td>
</tr>
</form>
";
$ctr++;
}
$data_eventArch .="<tbody>";
}else{
$data_eventArch .='
<tbody>
<tr>
<td class="text-center fw-bolder text-danger" colspan="13"><h3 class="">No Records</h3></td>
</tr>
</tbody>
';
}
$data_eventArch .='</table>';
echo $data_eventArch;
}


// certicate request tracking live search
if (isset($_POST["sFilterCert"])) {
	$sFilterCert = $_POST["sFilterCert"];
	$sql_sFilterCert = "SELECT * FROM tbl_cert_request WHERE encoded_by LIKE '%$sFilterCert%' || updated_by LIKE '%$sFilterCert%' || person_name LIKE '%$sFilterCert%' || date_of_birth LIKE '%$sFilterCert%' || year_baptized LIKE '%$sFilterCert%' || mother_name LIKE '%$sFilterCert%' father_name LIKE '%$sFilterCert%' || date_request LIKE '%$sFilterCert%' || request_type LIKE '%$sFilterCert%' || certificate_purpose LIKE '%$sFilterCert%'";
$get_sFilterCert = $conn->query($sql_sFilterCert) or die($conn->error);
$total_sFilterCert = $get_sFilterCert->num_rows;
$total_amount = 0;
$data_sFilterCert = "";

$data_sFilterCert .= "

<table class='table table-hover' id='table-certReq'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Request</th>
<th>Person's Name(Baptized/Confirmed)</th>
<th>Birthday</th>
<th>Request Type</th>
<th>Others</th>
<th>Purpose</th>
<th>Year Baptized</th>
<th>Year Confirmed</th>
<th>Father's Name</th>
<th>Mother's Name(Maiden)</th>
<th>Requestor</th>
<th>Requestor Address</th>
<th>Contact</th>
<th>Relationship</th>
<th>Amount</th>
<th>Encoded By</th>
<th>Date Encoded</th>
<th>Updated By</th>
<th>Date Updated</th>
</tr>
</thead>
<tbody>
";

if ($total_sFilterCert > 0) {
	$ctr = 1;
	$peso_sign = "\xE2\x82\xB1";
	$total_amount = 0;
	while ($row_sFilterCert = $get_sFilterCert->fetch_assoc()) {
$origdateBirth = $row_sFilterCert["date_of_birth"];
$dateBirth = new DateTime($origdateBirth);
$formatDateBirth = $dateBirth->format("M d, Y");

$orig_req_date = $row_sFilterCert["date_request"];
$dateReq = new DateTime($orig_req_date);
$formatReqDate = $dateReq->format("M d, Y");

$total_amount += $row_sFilterCert["cert_amount"];

$data_sFilterCert .="

<tr class='text-center'>
<td>'".$ctr."'</td>
<td>'".$formatReqDate."'</td>
<td>'".$row_sFilterCert["person_name"]."'</td>
<td>'".$formatDateBirth."'</td>
<td>'".$row_sFilterCert["request_type"]."'</td>
<td>'".$row_sFilterCert["cert_others"]."'</td>
<td>'".$row_sFilterCert["certificate_purpose"]."'</td>
<td>'".$row_sFilterCert["year_baptized"]."'</td>
<td>'".$row_sFilterCert["year_confirmed"]."'</td>
<td>'".$row_sFilterCert["father_name"]."'</td>
<td>'".$row_sFilterCert["mother_name"]."'</td>
<td>'".$row_sFilterCert["requesting_person_name"]."'</td>
<td>'".$row_sFilterCert["requesting_person_add"]."'</td>
<td>'".$row_sFilterCert["contact"]."'</td>
<td>'".$row_sFilterCert["relationship"]."'</td>
<td>'".$peso_sign.number_format($row_sFilterCert["cert_amount"])."'</td>
<td>'".$row_sFilterCert["encoded_by"]."'</td>
<td>'".$row_sFilterCert["date_encoded"]."'</td>
<td>'".$row_sFilterCert["updated_by"]."'</td>
<td>'".$row_sFilterCert["date_updated"]."'</td>
</tr>
";
$ctr++;
 }

$data_sFilterCert .="

<tr>
	<th class='border' colspan='3'>Total Amount</th>
	<td class='border fw-bolder'>'". $peso_sign.number_format($total_amount)."'</td>
</tr>

"; 

}else{
	$data_sFilterCert .= "
<tbody>
<tr>
<td class='text-center fw-bolder text-danger' colspan='20'><h3 class=''>No Records</h3></td>
</tr>
</tbody>
	";
}

$data_sFilterCert .="</table>";
echo $data_sFilterCert;

}

// event retrieve archive
if (isset($_POST["eventArchiveId"])) {
	$eventArchiveId = $_POST["eventArchiveId"];
	$query_eventArch = "SELECT * FROM tbl_event_archives WHERE event_archive_id ='$eventArchiveId'";
	$get_eventArchRet = $conn->query($query_eventArch) or die($conn->error);
	$row_eventArchRet = $get_eventArchRet->fetch_assoc();
	echo json_encode($row_eventArchRet);
}


#--------------------------------------------------

#home page
if (isset($_POST["btnAddEvent"])) {
$event_title = $conn->escape_string(trim($_POST["event_title"]));
$event_name = $conn->escape_string(trim($_POST["event_name"]));
$description = $conn->escape_string(trim($_POST["description"]));
$start_date = $conn->escape_string(trim($_POST["start_date"]));
$end_date = $conn->escape_string(trim($_POST["end_date"]));
$username = $_SESSION["username"];
$remarks = $conn->escape_string(trim($_POST["remarks"]));
$upload_file = $_FILES["upload_files"];

$check_end_date = "SELECT * FROM tbl_event WHERE date_entry='$end_date'";
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

}else if($givenDate < $start_date){
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
#--------

// event page

// add event modal query
if (isset($_POST["btnEventAdd"])) {
$event_user = $conn->escape_string(trim($_POST["event_user"]));
$event_title = $conn->escape_string(trim($_POST["event_title"]));
$start_date = $conn->escape_string(trim($_POST["start_date"]));
$end_date = $conn->escape_string(trim($_POST["end_date"]));
$username = $_SESSION["username"];
$event_description = $conn->escape_string(trim($_POST["event_description"]));
$remarks = $conn->escape_string(trim($_POST["remarks"]));
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
 footer: '<a href=\"events?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Confirm</a>'
});
});
</script>"; 

}else{
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

$sql_insert_event = "INSERT INTO tbl_event(event_title,event_name,event_description,event_start_time,date_entry,remarks_event,upload,username,encoded_by,date_encoded) VALUES(?,?,?,?,?,?,?,?,NOW())";
$stmt_event = $conn->prepare($sql_insert_event) or die($conn->error);
$stmt_event->bind_param("sssssssss",$event_title,$event_user,$event_description,$start_date,$end_date,$remarks,$newFile_add_event,$username,$_SESSION["username"]);
$stmt_event->execute();
$stmt_event->close();
header("location: events");

}else{
$sql_insert_event = "INSERT INTO tbl_event(event_title,event_name,event_description,event_start_time,date_entry,remarks_event,username,encoded_by,date_encoded) VALUES(?,?,?,?,?,?,?,NOW())";
$stmt_event = $conn->prepare($sql_insert_event) or die($conn->error);
$stmt_event->bind_param("ssssssss",$event_title,$event_user,$event_description,$start_date,$end_date,$remarks,$username,$_SESSION["username"]);
$newFile_add_event = NULL;
$stmt_event->execute();
$stmt_event->close();
header("location: events");
  }
 }
}

//

#view table event query
$tbl_event_view = "SELECT * FROM tbl_event ORDER BY event_id DESC";
$tbl_event_list = $conn->query($tbl_event_view) or die();
#----- 

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

// ajax event filter
if (isset($_POST["eventSearch"])) {
$eventSearch = $_POST["eventSearch"];

$sql_event_filter = "SELECT * FROM tbl_event WHERE event_title LIKE '%$eventSearch%' || event_name LIKE '%$eventSearch%'";
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
<th>Username</th>
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

$data_event.="</td>
<td>".$row_event_filter["username"]."</td>
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

// update event query
if (isset($_POST["btnUpdateEvent"])) {
if (!empty($_POST["update_id"])) {
$update_event_id = $_POST["update_id"];
$update_event_title = $conn->escape_string(trim($_POST["update_event_title"]));
$update_event_user = $conn->escape_string(trim($_POST["update_event_user"]));
$update_start_date = $conn->escape_string(trim($_POST["update_start_date"]));
$update_end_date = $conn->escape_string(trim($_POST["update_end_date"]));
$user_update = $_SESSION["username"];
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
footer: '<a href=\"index?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Confirm</a>'
});
});
</script>";
	}else{
$sql_event_update = "UPDATE tbl_event SET event_title=?, event_name=?, event_description=?, event_start_time=?, date_entry=?, remarks_event=?, upload=?, username=?, edited_by=?, date_updated=NOW() WHERE event_id=?";
$stmt_event_update = $conn->prepare($sql_event_update) or die($conn->error);
$stmt_event_update->bind_param("ssssssssi",$update_event_title,$update_event_user,$update_event_desc,$update_start_date,$update_end_date, $update_event_remarks,$newfile_update_event,$user_update,$_SESSION["username"],$update_event_id);
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
footer: '<a href=\"index?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Confirm</a>'
});
});
</script>";
}else{
$sql_event_update = "UPDATE tbl_event SET event_title=?, event_name=?, event_description=?, event_start_time=?, date_entry=?, remarks_event=?, username=?, edited_by=?, date_updated=NOW() WHERE event_id=?";
$stmt_event_update = $conn->prepare($sql_event_update) or die($conn->error);
$stmt_event_update->bind_param("sssssssi",$update_event_title,$update_event_user,$update_event_desc,$update_start_date,$update_end_date, $update_event_remarks,$user_update,$_SESSION["username"],$update_event_id);
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

#--------------//
// Donation archive page
$tbl_donate_arch_view = "SELECT *, donate_archive_amount AS total_archive_amount FROM tbl_donate_archives ORDER BY donate_archive_id DESC";
$tbl_donate_arch_list = $conn->query($tbl_donate_arch_view) or die($conn->error);

// delete query archives
if (isset($_POST["btnDonateRestore"])) {
if (!empty($_POST["donaterestoredelete"])) {
$donate_archive_id = intval($_POST["donaterestoredelete"]);

if ($donate_archive_id != "") {
$sql_insert_donate_from_arch = "INSERT INTO tbl_donate(donate_name, donate_amount, donate_on, donate_description) SELECT donate_archive_name, donate_archive_amount, donate_archive_on, donate_archive_desc FROM tbl_donate_archives WHERE donate_archive_id=?";
$get_insert_donate_from_arch = $conn->prepare($sql_insert_donate_from_arch) or die($conn->error);
$get_insert_donate_from_arch->bind_param("i", $donate_archive_id);	
$get_insert_donate_from_arch->execute();

$sql_del_donate_arch = "DELETE FROM tbl_donate_archives WHERE donate_archive_id=?";
$get_del_donate_arch = $conn->prepare($sql_del_donate_arch) or die($conn->error);
$get_del_donate_arch->bind_param("i", $donate_archive_id);
$rs_dele_donate_arch = $get_del_donate_arch->execute();

if ($rs_dele_donate_arch == true) {
header("location: donate-archives");
}
}
} 
}

// ajax retrieve JSON
if (isset($_POST["donate_archive"])) {
$donate_archive = $_POST["donate_archive"];
$query_donate_tbl = "SELECT * FROM tbl_donate_archives WHERE donate_archive_id='$donate_archive'";
$get_donate_arch_tbl = $conn->query($query_donate_tbl) or die($conn->error);
$get_donate_arch_row = $get_donate_arch_tbl->fetch_assoc();
echo json_encode($get_donate_arch_row);
}

// ajax filter donate archive
if (isset($_POST["donateArchive"])) {
$searchdonateArchive = $_POST["donateArchive"];

$retrieve_donate_arch = "SELECT *, donate_archive_amount AS total_archive_amount FROM tbl_donate_archives WHERE donate_archive_name LIKE '%$searchdonateArchive%' || donate_archive_amount LIKE '%$searchdonateArchive%'";
$get_donate_arch = $conn->query($retrieve_donate_arch) or die($conn->error);
$total_donate_arch = $get_donate_arch->num_rows;
$data_donateArch = "";

$data_donateArch .= "
<table class='table table-hover' id='table-donation-archive'>
<thead>
<tr class='text-center'>
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
<tbody>";

if ($total_donate_arch > 0) {
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_archive_amount = 0;

while ($row_donateArch = $get_donate_arch->fetch_assoc()) {
$origDateTime = $row_donateArch["donate_archive_on"];
$dateStart = new DateTime($origDateTime);
$formatDate = $dateStart->format("M d, Y");

$origDateDeleted = $row_donateArch["date_deleted"];
$dateDeleted = new DateTime($origDateDeleted);
$formatDateDeleted = $dateDeleted->format("M d, Y");    
$total_archive_amount += $row_donateArch["donate_archive_amount"];

$data_donateArch .= "
<tr class='text-center'>
     <td class='d-none'><input type='hidden' name='donate_archive_id' value='".$row_donateArch["donate_archive_id"]."'></td>
     <td>".$ctr."</td>
     <td>".$row_donateArch["donate_archive_name"]."</td>
     <td>".$peso_sign.number_format($row_donateArch["donate_archive_amount"])."</td>
     <td>".$formatDate."</td>
     <td>".$row_donateArch["donate_archive_desc"]."</td>
     <td>".$row_donateArch["deleted_by"]."</td>
     <td>".$formatDateDeleted."</td>
     <td>
         <button  data-bs-toggle='modal' id='".$row_donateArch['donate_archive_id']."' data-bs-target='#modaldeleterestore' class='btn btn-outline-primary delete_donate_archive' class='btn btn-outline-primary' type='button'><i class='fa-solid fa-plus fw-bolder'></i></button>
     </td>
 
</tr>";
$ctr++;
}

$data_donateArch .= "
<tr>
<th class='border'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_archive_amount)."</td>
</tr>
</tbody>";
} else {
$data_donateArch .= "
<tbody>
<tr>
 <td class='text-center fw-bolder text-danger' colspan='8'><h3 class=''>No Records</h3></td>
</tr>
</tbody>";
}

$data_donateArch .= "</table>";
echo $data_donateArch;
}

#-----------

#-Donation page 
#view table donate query
$tbl_donate_view = "SELECT *, donate_amount AS total_amount FROM tbl_donate ORDER BY donate_on DESC"; //select and adding total amount on all rows
$tbl_donate_list = $conn->query($tbl_donate_view) or die($conn->error);
#----- 

// modal add donation
if (isset($_POST["btnAddDonation"])) {
$add_donation_name = $conn->escape_string(trim($_POST["add_donation_name"]));
$add_currency = $conn->escape_string(trim($_POST["add_currency"]));
$add_donated_on = $conn->escape_string(trim($_POST["add_donated_on"]));
$add_donate_desc = $conn->escape_string(trim($_POST["add_description"]));

$sql_insert_donate = "INSERT INTO tbl_donate(donate_name, donate_amount, donate_on, donate_description,encoded_by,date_encoded) VALUES(?,?,?,?,?,NOW())";
$stmt_donate_query = $conn->prepare($sql_insert_donate) or die($conn->error);
$stmt_donate_query->bind_param("sssss",$add_donation_name,$add_currency,$add_donated_on,$add_donate_desc,$_SESSION["username"]);
$stmt_donate_query->execute();
$stmt_donate_query->close();
header("location: donations");
}
// 

// ajax update retrieve donation json
if (isset($_POST["update_donate"])) {
$update_donate = $_POST["update_donate"];
$query_update_donate = "SELECT * FROM tbl_donate WHERE donate_id = '$update_donate'";
$get_update_donate = $conn->query($query_update_donate) or die($conn->error);
$row_update_donate = $get_update_donate->fetch_assoc();
echo json_encode($row_update_donate);
}

// ajax delete retrieve donation json
if (isset($_POST["delete_id_donate"])) {
$delete_id_donate = $_POST["delete_id_donate"];
$query_donate_del = "SELECT * FROM tbl_donate WHERE donate_id = '$delete_id_donate'";
$get_delete_donate = $conn->query($query_donate_del) or die($conn->error);
$row_del_donate = $get_delete_donate->fetch_assoc();
echo json_encode($row_del_donate);
}

// ajax donate filter
if (isset($_POST["searchDonations"])) {
$searchDonations = $_POST["searchDonations"];

$retrieve_donations = "SELECT *, donate_amount AS total_amount FROM tbl_donate WHERE donate_name LIKE '%$searchDonations%'";
$get_donate_filter = $conn->query($retrieve_donations) or die($conn->error);
$total_donate_filter = $get_donate_filter->num_rows;
$total_amount = 0; 
$data_donate = "";

$data_donate.="

<table class='table table-hover' id='table-donate'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Donators Name</th>
<th>Amount</th>
<th>Donated On</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>";

if ($total_donate_filter > 0) {
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0; //initial total amount to 0
while ($donate_row = $get_donate_filter->fetch_assoc()) {
$origDonateTime = $donate_row["donate_on"]; // Original date and time string
$dateDonateStartTime = new DateTime($origDonateTime); 	// Create a DateTime object from the original string
$formatdateDonateStartTime = $dateDonateStartTime->format("M d, Y");
$total_amount += $donate_row["donate_amount"];
$data_donate .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$donate_row['donate_name']."</td>
<td>".$peso_sign.$donate_row['donate_amount']."</td>
<td>".$formatdateDonateStartTime."</td>
<td>".$donate_row['donate_description']."</td>
<td>
<a href='#' id='".$donate_row['donate_id']."' class='btn btn-outline-success editDonate-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateDonate'><i class='fa-solid fa-pencil'></i></a> <a id='".$donate_row['donate_id']."' href='#' type='button' class='btn btn-outline-danger deleteDonate-data' data-bs-toggle='modal' data-bs-target='#modalDeleteDonate'><i class='fa-solid fa-eraser'></i></a>
</td>
</tr>

";
$ctr++;
}

//<!-- Place this outside the loop to show the total after all donation records -->
$data_donate .="
<tr> 
<th class='border'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>
</tbody>";

}else{
$data_donate .='
<tbody>
<tr>
<td class="text-center fw-bolder text-danger" colspan="6"><h3 class="">No Records</h3></td>
</tr>
</tbody>
';
}

$data_donate .="</table>";
echo $data_donate;
}

// update modal donate
if (isset($_POST["btnUpdateDonation"])) {
if (!empty($_POST["update_donate"])) {
$update_donate = $_POST["update_donate"];

$update_donation_name = $conn->escape_string(trim($_POST["update_donation_name"]));
$update_currency = $conn->escape_string(trim($_POST["update_currency"]));
$update_donated_on = $conn->escape_string(trim($_POST["update_donated_on"]));
$update_description = $conn->escape_string(trim($_POST["update_description"]));

if ($update_donate != "") {
$sql_update_donate = "UPDATE tbl_donate SET donate_name=?, donate_amount=?, donate_on=?, donate_description=?, edited_by=?, date_updated=NOW() WHERE donate_id=?";
$stmt_donate_update = $conn->prepare($sql_update_donate) or die($conn->error);
$stmt_donate_update->bind_param("sssssi", $update_donation_name,$update_currency,$update_donated_on,$update_description,$_SESSION["username"],$update_donate);
$stmt_donate_update->execute();
$stmt_donate_update->close();
header("location: donations");
}
}
}

// delete donate
if (isset($_POST["btnDeleteEvent"])) {
if (!empty($_POST["delete_id_donate"])) {
$delete_id_donate = intval($_POST["delete_id_donate"]);

if ($delete_id_donate != "") {
// trigger insert query before deleting the query
$sql_insert_donate_arch = "INSERT INTO tbl_donate_archives(donate_archive_name, donate_archive_amount, donate_archive_on, donate_archive_desc, deleted_by) SELECT donate_name, donate_amount, donate_on, donate_description, ? FROM tbl_donate WHERE donate_id=?";
$get_insert_donate_arch = $conn->prepare($sql_insert_donate_arch) or die($conn->error);
$get_insert_donate_arch->bind_param("si", $_SESSION["username"], $delete_id_donate);
$get_insert_donate_arch->execute();

$sql_del_donate = "DELETE FROM tbl_donate WHERE donate_id=?";
$get_del_donate = $conn->prepare($sql_del_donate) or die($conn->error);
$get_del_donate->bind_param("i", $delete_id_donate);
$rs_del_donate = $get_del_donate->execute();

if ($rs_del_donate == true) {
header("location: donations");
}
}
}
}

// for filter date
if (isset($_POST["from_donate_date"], $_POST["to_donate_date"])) {
$from_donate_date = $_POST["from_donate_date"];
$to_donate_date = $_POST["to_donate_date"];

$query_filter_table = "SELECT * FROM tbl_donate WHERE donate_on BETWEEN '$from_donate_date' AND '$to_donate_date'";
$get_donate_filter_table = $conn->query($query_filter_table) or die($conn->error);
$total_donate_filter_tbl = $get_donate_filter_table->num_rows;
$output = "";
$output .="

<table class='table table-hover' id='table-donate'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Donators Name</th>
<th>Amount</th>
<th>Donated On</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead> 
";

if ($total_donate_filter_tbl > 0) {
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;
while ($row_donate_filter_tbl = $get_donate_filter_table->fetch_assoc()) {
$originalStartTime = $row_donate_filter_tbl["donate_on"];
$dateStartTime = new DateTime($originalStartTime);
$formatDateStartTime = $dateStartTime->format("M d, Y");
$total_amount += $row_donate_filter_tbl["donate_amount"];

	$output .="

	<tbody>
	<tr class='text-center'>
		<td>".$ctr."</td>
		<td>".$row_donate_filter_tbl['donate_name']."</td>
		<td>".$row_donate_filter_tbl['donate_amount']."</td>
		<td>".$formatDateStartTime."</td>
		<td>".$row_donate_filter_tbl['donate_description']."</td>
		<td>
				<a href='#' id='".$row_donate_filter_tbl['donate_id']."' class='btn btn-outline-success editDonate-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateDonate'><i class='fa-solid fa-pencil'></i></a> <a id='".$row_donate_filter_tbl['donate_id']."' href='#' type='button' class='btn btn-outline-danger deleteDonate-data' data-bs-toggle='modal' data-bs-target='#modalDeleteDonate'><i class='fa-solid fa-eraser'></i></a>
		</td>
	</tr>
	";
	$ctr++;
}

$output .="

	<tr>
		<th class='border'>Total Donations</th>
		<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
	</tr>

	</tbody>
";
}else{
$output .="

<tbody>
			<tr>
				<td colspan='6'><center><h3 class=' text-danger fw-bolder'>No Record Found</h3></center></td>
			</tr>
		</tbody>

";
}
$output .= "</table>";

echo $output;
}
// 

#--------------------

#--church expenses page
$view_church_tbl_expenses = "SELECT *, expenses AS total_church_expenses  FROM tbl_church_expenses ORDER BY expenses_id DESC";
$church_tbl_list = $conn->query($view_church_tbl_expenses) or die($conn->error);

// insert query add expenses

if (isset($_POST["btnChurchAddExpense"])) {
$church_add_date = $conn->escape_string(trim($_POST["church_add_date"]));
$church_add_currency = $conn->escape_string(trim($_POST["church_add_currency"]));
$church_add_tin = $conn->escape_string(trim($_POST["church_add_tin"]));
$church_add_trans_type  = $conn->escape_string(trim($_POST["church_add_type_of_transaction"])); // transaction type
$church_add_desc = $conn->escape_string(trim($_POST["church_add_desc"]) ? $_POST["church_add_desc"] : '');

// NOW() function in sql directly add date now without parameters

$sql_add_church = "INSERT INTO tbl_church_expenses(date_receipt, description, type_of_transaction, tin, expenses, encode_by, date_encode) VALUES (?, ?, ?, ?, ?, ?, NOW())";
$stmt_add_church = $conn->prepare($sql_add_church) or die($conn->error);
$stmt_add_church->bind_param("ssssss", $church_add_date, $church_add_desc, $church_add_trans_type, $church_add_tin, $church_add_currency, $_SESSION["username"]);
$stmt_add_church->execute();
$stmt_add_church->close();
header("location: church-expenses");
}


// update church expenses
if (isset($_POST["btnUpdateChurch"])) {
$church_edit = $_POST["church_edit"];
if (!empty($church_edit)) {
$church_update_date = $conn->escape_string(trim($_POST["church_update_date"]));
$church_update_expense = $conn->escape_string(trim($_POST["church_update_expense"]));
$church_update_tin = $conn->escape_string(trim($_POST["church_update_tin"]));
$church_update_desc = $conn->escape_string(trim($_POST["church_update_desc"]));
$church_update_trans_type = $conn->escape_string(trim($_POST["church_update_type_of_transaction"])); // update transaction type

if ($church_edit != "") {
	$sql_update_churchexp = "UPDATE tbl_church_expenses SET date_receipt=?, description=?, tin=?, expenses=?, type_of_transaction=?, updated_by=?, date_updated=NOW() WHERE expenses_id=?";
	$stmt_update_churchexp = $conn->prepare($sql_update_churchexp) or die($conn->error);
	$stmt_update_churchexp->bind_param("ssssssi", $church_update_date, $church_update_desc, $church_update_tin, $church_update_expense, $church_update_trans_type, $_SESSION["username"], $church_edit);
	$stmt_update_churchexp->execute();
	$stmt_update_churchexp->close();
	header("location: church-expenses");		
}

}
}


// ajax retrieve data
if (isset($_POST["church_edit"])) {
$church_edit = $_POST["church_edit"];
$query_tbl_expense = "SELECT * FROM tbl_church_expenses WHERE expenses_id='$church_edit'";
$get_tbl_church_exp = $conn->query($query_tbl_expense) or die($conn->error);
$get_row_exp = $get_tbl_church_exp->fetch_assoc();
echo json_encode($get_row_exp);
}

// ajax delete retrieve data
if (isset($_POST["delete_id_church_exp"])) {
$delete_id_church_exp = $_POST["delete_id_church_exp"];
$query_del_churchexp = "SELECT * FROM tbl_church_expenses WHERE expenses_id='$delete_id_church_exp'";
$get_tbl_del_church_exp = $conn->query($query_del_churchexp) or die($conn->error);
$row_del_exp = $get_tbl_del_church_exp->fetch_assoc();
echo json_encode($row_del_exp);
}

// ajax live filtering
if (isset($_POST["churchExpSearch"])) {
$churchExpSearch = $_POST["churchExpSearch"];

$sql_live_church = "SELECT * FROM tbl_church_expenses WHERE date_receipt LIKE '%$churchExpSearch%' || tin LIKE '%$churchExpSearch%' ORDER BY expenses_id DESC";
$get_live_church = $conn->query($sql_live_church) or die($conn->error);
$total = $get_live_church->num_rows;
$data = "";

$data .="

<table class='table table-hover' id='table-church-expenses'>
<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Receipt</th>
<th>Type of Transaction</th>
<th>Description</th>
<th>Amount</th>
<th>TIN #</th>
<th>Action</th>
</tr>
</thead>
<tbody>
";

if ($total > 0) {

$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;
while ($row_church = $get_live_church->fetch_assoc()) {
$originalDate = $row_church["date_receipt"];
$datechurch = new DateTime($originalDate);
$formatDate = $datechurch->format("M d, Y");
$total_amount += $row_church["expenses"];
	
$data .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatDate."</td>
<td>".$row_church['type_of_transaction']."</td>
<td>".$row_church['description']."</td>
<td>".$row_church['expenses']."</td>
<td>".$row_church['tin']."</td>
<td>
<a href='#' id='".$row_church['expenses_id']."' class='btn btn-outline-success editChurch-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateChurch'><i class='fa-solid fa-pencil'></i></a> <a id='".$row_church['expenses_id']."' href='#' type='button' class='btn btn-outline-danger deleteChurch-data' data-bs-toggle='modal' data-bs-target='#modalDeleteChurchExp'><i class='fa-solid fa-eraser'></i></a>
</td>
</tr>

";

$ctr++;
}

$data .="

<tr>
<th class='border'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>

";

}else{
$data .="

<tbody>
<tr>
 <td class='text-center fw-bolder text-danger' colspan='6'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
</tr>
</tbody>";

}

$data .= "</table>";
echo $data;

}

// date filtering
if (isset($_POST["from_churchExp_date"], $_POST["to_churchExp_date"])) {
$from_churchExp_date = $_POST["from_churchExp_date"];
$to_churchExp_date = $_POST["to_churchExp_date"];

$query_tblExp_date = "SELECT * FROM tbl_church_expenses WHERE date_receipt BETWEEN '$from_churchExp_date' AND '$to_churchExp_date'";
$get_tblExp_date = $conn->query($query_tblExp_date) or die($conn->error);
$total_tblExp_date = $get_tblExp_date->num_rows;
$output = "";

$output .="

<table class='table table-hover' id='table-church-expenses'>
<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Receipt</th>
<th>Type of Transaction</th>
<th>Description</th>
<th>Amount</th>
<th>TIN #</th>
<th>Action</th>
</tr>
</thead>
<tbody>
";	

if ($total_tblExp_date > 0) {
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;
while ($row_church = $get_tblExp_date->fetch_assoc()) {
$originalDate = $row_church["date_receipt"];
$datechurch = new DateTime($originalDate);
$formatDate = $datechurch->format("M d, Y");
$total_amount += $row_church["expenses"];
	
$output .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatDate."</td>
<td>".$row_church['type_of_transaction']."</td>
<td>".$row_church['description']."</td>
<td>".$row_church['expenses']."</td>
<td>".$row_church['tin']."</td>
<td>
<a href='#' id='".$row_church['expenses_id']."' class='btn btn-outline-success editChurch-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateChurch'><i class='fa-solid fa-pencil'></i></a> <a id='".$row_church['expenses_id']."' href='#' type='button' class='btn btn-outline-danger deleteChurch-data' data-bs-toggle='modal' data-bs-target='#modalDeleteChurchExp'><i class='fa-solid fa-eraser'></i></a>
</td>
</tr>

";

$ctr++;
}

$output .="

<tr>
<th class='border'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>

";		
}else{
$output .="
<tbody>
<tr>
 <td class='text-center fw-bolder text-danger' colspan='6'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
</tr>
</tbody>";	
}
$output .="</table>";
echo $output;
}

// next is church delete query
if (isset($_POST["btnDeleteChurchExp"])) {
$delete_id_church_exp = intval($_POST["delete_id_church_exp"]);
if (!empty($delete_id_church_exp) && $delete_id_church_exp != "") {
$sql_insert_tbl_exp_arch = "INSERT INTO tbl_church_expense_archive(date_receipt_arch, description_arch, tin_arch, expenses_arch, deleted_by) SELECT date_receipt, description, tin, expenses, ? FROM tbl_church_expenses WHERE expenses_id=?";
$get_insert_tblExp_arch = $conn->prepare($sql_insert_tbl_exp_arch) or die($conn->error);
$get_insert_tblExp_arch->bind_param("si",$_SESSION["username"], $delete_id_church_exp);
$get_insert_tblExp_arch->execute();


$sql_delete_exp = "DELETE FROM tbl_church_expenses WHERE expenses_id=?";
$get_delete_exp = $conn->prepare($sql_delete_exp) or die($conn->error);
$get_delete_exp->bind_param("i", $delete_id_church_exp);
$rs_delete_exp = $get_delete_exp->execute();

if ($rs_delete_exp == true) {
		header("location: church-expenses");
}
}

}
#------

#church expenses archive page

#view church expenses archive
$view_church_tblepx_arch = "SELECT *, expenses_arch AS total_expenses_arch FROM tbl_church_expense_archive ORDER BY expenses_id_arch DESC";
$tbl_list_churhcexp_arch = $conn->query($view_church_tblepx_arch) or die($conn->error);

// retrieve ajax 
if (isset($_POST["church_exp_restore"])) {
$church_exp_restore = $_POST["church_exp_restore"];
$query_churchArch = "SELECT * FROM tbl_church_expense_archive WHERE expenses_id_arch='$church_exp_restore'";
$get_churchArch = $conn->query($query_churchArch) or die($conn->error);
$row_expArch = $get_churchArch->fetch_assoc();
echo json_encode($row_expArch);
}

// church-expenses archive restore
if (isset($_POST["btnChurchArchRestore"])) {
if (!empty($_POST["church_exp_restore"])) {
$church_exp_restore = intval($_POST["church_exp_restore"]);
if ($church_exp_restore != "") {
	$sql_insert_church = "INSERT INTO tbl_church_expenses(date_receipt, description, tin, expenses) SELECT date_receipt_arch, description_arch, tin_arch, expenses_arch FROM tbl_church_expense_archive WHERE expenses_id_arch=?";
$get_insertChurchexpArch = $conn->prepare($sql_insert_church) or die($conn->error);
$get_insertChurchexpArch->bind_param("i", $church_exp_restore);
$get_insertChurchexpArch->execute();

$sql_del_churchArch = "DELETE FROM tbl_church_expense_archive WHERE expenses_id_arch=?";
$get_del_churchArch = $conn->prepare($sql_del_churchArch) or die($conn->error);
$get_del_churchArch->bind_param("i", $church_exp_restore);
$rs_churchArch = $get_del_churchArch->execute();

if ($rs_churchArch == true) {
		header("location: church-expenses-archives");
 }
}
}
}

#---------------------

#==========================================
// certication request page

// view all tables
$view_req_cert = "SELECT * FROM tbl_cert_request ORDER BY cert_req_id DESC";
$get_req_cert = $conn->query($view_req_cert) or die($conn->error);


// insert query
if (isset($_POST["btnAddCertReq"])) {
$cert_entry_date = $conn->escape_string(trim($_POST["cert_entry_date"]));
$cert_entry_name = $conn->escape_string(trim($_POST["cert_entry_name"]));
$cert_entry_bday = $conn->escape_string(trim($_POST["cert_entry_bday"]));
$cert_entry_req_type = $conn->escape_string(trim($_POST["cert_entry_req_type"]));
$cert_entry_yr_confirmed = $conn->escape_string(trim($_POST["cert_entry_yr_confirmed"]));
$cert_entry_yr_baptized = $conn->escape_string(trim($_POST["cert_entry_yr_baptized"]));
$cert_entry_papa_name = $conn->escape_string(trim($_POST["cert_entry_papa_name"]));
$cert_entry_mama_name = $conn->escape_string(trim($_POST["cert_entry_mama_name"]));
$cert_entry_requisitor = $conn->escape_string(trim($_POST["cert_entry_requisitor"]));
$cert_entry_purpose = $conn->escape_string(trim($_POST["cert_entry_purpose"]));
$cert_entry_others = $conn->escape_string(trim($_POST["cert_entry_others"]));
$cert_entry_requisitor_add = $conn->escape_string(trim($_POST["cert_entry_requisitor_add"]));
$cert_entry_relationship = $conn->escape_string(trim($_POST["cert_entry_relationship"]));
$cert_entry_contact = $conn->escape_string(trim($_POST["cert_entry_contact"]));
$cert_entry_amount = $conn->escape_string(trim($_POST["cert_entry_amount"]));

$sql_inser_cert_req = "INSERT INTO tbl_cert_request(person_name, date_of_birth, year_baptized, year_confirmed, mother_name, father_name, requesting_person_name, requesting_person_add, contact, relationship, date_request, request_type, certificate_purpose, cert_amount, cert_others, encoded_by, date_encoded) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
$stmt_insert_req = $conn->prepare($sql_inser_cert_req) or die($conn->error);
$stmt_insert_req->bind_param("ssssssssssssssss",$cert_entry_name, $cert_entry_bday, $cert_entry_yr_baptized, $cert_entry_yr_confirmed, $cert_entry_mama_name, $cert_entry_papa_name, $cert_entry_requisitor, $cert_entry_requisitor_add, $cert_entry_contact, $cert_entry_relationship, $cert_entry_date, $cert_entry_req_type, $cert_entry_purpose, $cert_entry_amount, $cert_entry_others, $_SESSION["username"]);
$stmt_insert_req->execute();
$stmt_insert_req->close();
header("location: certification-request");
}

// ajax update retrieve
if (isset($_POST["cert_req_update_id"])) {
$id = $_POST["cert_req_update_id"];
$sql_cert_req = "SELECT * FROM tbl_cert_request WHERE cert_req_id='$id'";
$get_cert_req = $conn->query($sql_cert_req) or die($conn->error);
$row_cert_req = $get_cert_req->fetch_assoc();
echo json_encode($row_cert_req);
}

// update certificate request
if (isset($_POST["btnUpdateReq"])) {
$cert_req_update_id = $_POST["cert_req_update_id"];

if (!empty($cert_req_update_id)) {
$cert_update_req_type = $conn->escape_string(trim($_POST["cert_update_req_type"]));
$cert_update_date = $conn->escape_string(trim($_POST["cert_update_date"]));
$cert_update_name = $conn->escape_string(trim($_POST["cert_update_name"]));
$cert_update_bday = $conn->escape_string(trim($_POST["cert_update_bday"]));
$cert_update_req_type = $conn->escape_string(trim($_POST["cert_update_req_type"]));
$cert_update_yr_confirmed = $conn->escape_string(trim($_POST["cert_update_yr_confirmed"]));
$cert_update_yr_baptized = $conn->escape_string(trim($_POST["cert_update_yr_baptized"]));
$cert_update_papa_name = $conn->escape_string(trim($_POST["cert_update_papa_name"]));
$cert_update_mama_name = $conn->escape_string(trim($_POST["cert_update_mama_name"]));
$cert_update_requisitor = $conn->escape_string(trim($_POST["cert_update_requisitor"]));
$cert_update_purpose = $conn->escape_string(trim($_POST["cert_update_purpose"]));
$cert_update_others = $conn->escape_string(trim($_POST["cert_update_others"]));
$cert_update_requisitor_add = $conn->escape_string(trim($_POST["cert_update_requisitor_add"]));
$cert_update_relationship = $conn->escape_string(trim($_POST["cert_update_relationship"]));
$cert_update_contact = $conn->escape_string(trim($_POST["cert_update_contact"]));
$cert_update_amount = $conn->escape_string(trim($_POST["cert_update_amount"]));

if ($cert_req_update_id != "") {
	$sql_update = "UPDATE tbl_cert_request SET person_name=?, date_of_birth=?, year_baptized=?, year_confirmed=?, mother_name=?, father_name=?, requesting_person_name=?, requesting_person_add=?, contact=?, relationship=?, date_request=?, request_type=?, certificate_purpose=?, cert_amount=?, cert_others=?, updated_by=?, date_updated=NOW() WHERE cert_req_id=?";
	$stmt_update_req = $conn->prepare($sql_update) or die($conn->error);
	$stmt_update_req->bind_param("ssssssssssssssssi", $cert_update_name, $cert_update_bday, $cert_update_yr_baptized, $cert_update_yr_confirmed, $cert_update_mama_name, $cert_update_papa_name, $cert_update_requisitor, $cert_update_requisitor_add, $cert_update_contact, $cert_update_relationship, $cert_update_date, $cert_update_req_type, $cert_update_purpose, $cert_update_amount, $cert_update_others, $_SESSION["username"], $cert_req_update_id);
	$stmt_update_req->execute();
	$stmt_update_req->close();
	header("location: certification-request");
}
}
}

#ajax retrieve delete query
if (isset($_POST["del_cert_req_id"])) {
$del_id = $_POST["del_cert_req_id"];
$query_cert_del = "SELECT * FROM tbl_cert_request WHERE cert_req_id='$del_id'";
$get_cert = $conn->query($query_cert_del) or die($conn->error);
$row_cert_del = $get_cert->fetch_assoc();
echo json_encode($row_cert_del);
}

// delete certifiate request query
if (isset($_POST["btnDelCertReq"])) {
$del_cert_req_id = intval($_POST["del_cert_req_id"]);

if (!empty($del_cert_req_id) AND $del_cert_req_id != "") {
// trigger insert query before deleting the query
$sql_cert_arch = "INSERT INTO tbl_cert_request_archive (person_name_archive, date_of_birth_archive, year_baptized_archive, year_confirmed_archive, mother_name_archive, father_name_archive, requesting_person_name_archive, requesting_person_add_archive, contact_archive, relationship_archive, date_request_archive, request_type_archive, certificate_purpose_archive, cert_amount_archive, cert_others_archive, username_archive, deleted_by) SELECT person_name, date_of_birth, year_baptized, year_confirmed, mother_name, father_name, requesting_person_name, requesting_person_add, contact, relationship, date_request, request_type, certificate_purpose, cert_amount, cert_others, username, ? FROM tbl_cert_request WHERE cert_req_id=?";
$get_cert_arch = $conn->prepare($sql_cert_arch) or die($conn->error);
$get_cert_arch->bind_param("si", $_SESSION["username"], $del_cert_req_id);
$get_cert_arch->execute();

$sql_del_cert = "DELETE FROM tbl_cert_request WHERE cert_req_id=?";
$get_del_cert = $conn->prepare($sql_del_cert) or die($conn->error);
$get_del_cert->bind_param("i", $del_cert_req_id);
$rs_del_cert = $get_del_cert->execute();
if ($rs_del_cert == true) {
		header("location: certification-request");
  }
 }
}


// live certification request
if (isset($_POST["filterCert"])) {
	$filterCert = $_POST["filterCert"];

	$sqlFilterCertReq = "SELECT * FROM tbl_cert_request WHERE person_name LIKE '%$filterCert%' || year_baptized LIKE '%$filterCert%' || year_confirmed LIKE '%$filterCert%' || request_type LIKE '%$filterCert%' || date_of_birth LIKE '%$filterCert%' || date_request LIKE '%$filterCert%'";
	$getFilterCert = $conn->query($sqlFilterCertReq) or die($conn->error);
	$total_rows = $getFilterCert->num_rows;
	$data = "";

	$data .="

	<table class='table table-hover' id='table-cert-request'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Request</th>
<th>Person's Name(Baptized/Confirmed)</th>
<th>Birthday</th>
<th>Request Type</th>
<th>Others</th>
<th>Purpose</th>
<th>Year Baptized</th>
<th>Year Confirmed</th>
<th>Father's Name</th>
<th>Mother's Name(Maiden)</th>
<th>Requestor</th>
<th>Requestor Address</th>
<th>Contact</th>
<th>Relationship</th>
<th>Amount</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
	";

if ($total_rows > 0) {
	$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;
while ($rowReq_cert = $getFilterCert->fetch_assoc()) {
$origdateBirth = $rowReq_cert["date_of_birth"];
$dateBirth = new DateTime($origdateBirth);
$formatDateBirth = $dateBirth->format("M d, Y");

$orig_req_date = $rowReq_cert["date_request"];
$dateReq = new DateTime($orig_req_date);
$formatReqDate = $dateReq->format("M d, Y");

$total_amount += $rowReq_cert["cert_amount"];

$data .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatReqDate."</td>
<td>".$rowReq_cert["person_name"]."</td>
<td>".$formatDateBirth."</td>
<td>".$rowReq_cert["request_type"]."</td>
<td>".$rowReq_cert["cert_others"]."</td>
<td>".$rowReq_cert["certificate_purpose"]."</td>
<td>".$rowReq_cert["year_baptized"]."</td>
<td>".$rowReq_cert["year_confirmed"]."</td>
<td>".$rowReq_cert["father_name"]."</td>
<td>".$rowReq_cert["mother_name"]."</td>
<td>".$rowReq_cert["requesting_person_name"]."</td>
<td>".$rowReq_cert["requesting_person_add"]."</td>
<td>".$rowReq_cert["contact"]."</td>
<td>".$rowReq_cert["relationship"]."</td>
<td>".$peso_sign.number_format($rowReq_cert["cert_amount"])."</td>

<td>
<a href='#' id='".$rowReq_cert['cert_req_id']."' class='btn btn-outline-success editCertReq-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateCertReq'><i class='fa-solid fa-pencil'></i></a> <a id='".$rowReq_cert['cert_req_id']."' href='#' type='button' class='btn btn-outline-danger deleteCertReq-data' data-bs-toggle='modal' data-bs-target='#modalDelCertReq'><i class='fa-solid fa-eraser'></i></a>
</td>

</tr>

";

$ctr++;
}

$data .= "

<tr>
<th class='border' colspan='3'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>

"; 
}else{
	$data .="

<tbody>
<tr>
 <td class='text-center fw-bolder text-danger' colspan='17'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
</tr>
</tbody>";
}
$data .="</table>";
echo $data;
}
#==========================================


// certificate request search between two dates
if (isset($_POST["from_cert_date"], $_POST["to_cert_date"])) {
	$from_date = $_POST["from_cert_date"];
	$to_date = $_POST["to_cert_date"];

	$queryFilterDateCertReq = "SELECT * FROM tbl_cert_request WHERE date_request BETWEEN '$from_date' AND '$to_date'";
	$getDateFilter = $conn->query($queryFilterDateCertReq) or die($conn->error);
	$total_row = $getDateFilter->num_rows;
	$data = "";

	$data .="
	<table class='table table-hover' id='table-cert-request'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Request</th>
<th>Person's Name(Baptized/Confirmed)</th>
<th>Birthday</th>
<th>Request Type</th>
<th>Others</th>
<th>Purpose</th>
<th>Year Baptized</th>
<th>Year Confirmed</th>
<th>Father's Name</th>
<th>Mother's Name(Maiden)</th>
<th>Requestor</th>
<th>Requestor Address</th>
<th>Contact</th>
<th>Relationship</th>
<th>Amount</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
	";

if ($total_row > 0) {
$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;

while ($rowDateFilter = $getDateFilter->fetch_assoc()) {
$origdateBirth = $rowDateFilter["date_of_birth"];
$dateBirth = new DateTime($origdateBirth);
$formatDateBirth = $dateBirth->format("M d, Y");

$orig_req_date = $rowDateFilter["date_request"];
$dateReq = new DateTime($orig_req_date);
$formatReqDate = $dateReq->format("M d, Y");

$total_amount += $rowDateFilter["cert_amount"];

$data .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatReqDate."</td>
<td>".$rowDateFilter["person_name"]."</td>
<td>".$formatDateBirth."</td>
<td>".$rowDateFilter["request_type"]."</td>
<td>".$rowDateFilter["cert_others"]."</td>
<td>".$rowDateFilter["certificate_purpose"]."</td>
<td>".$rowDateFilter["year_baptized"]."</td>
<td>".$rowDateFilter["year_confirmed"]."</td>
<td>".$rowDateFilter["father_name"]."</td>
<td>".$rowDateFilter["mother_name"]."</td>
<td>".$rowDateFilter["requesting_person_name"]."</td>
<td>".$rowDateFilter["requesting_person_add"]."</td>
<td>".$rowDateFilter["contact"]."</td>
<td>".$rowDateFilter["relationship"]."</td>
<td>".$peso_sign.number_format($rowDateFilter["cert_amount"])."</td>

<td>
<a href='#' id='".$rowDateFilter['cert_req_id']."' class='btn btn-outline-success editCertReq-data' type='button' data-bs-toggle='modal' data-bs-target='#modalUpdateCertReq'><i class='fa-solid fa-pencil'></i></a> <a id='".$rowDateFilter['cert_req_id']."' href='#' type='button' class='btn btn-outline-danger deleteCertReq-data' data-bs-toggle='modal' data-bs-target='#modalDelCertReq'><i class='fa-solid fa-eraser'></i></a>
</td>

</tr>

";
$ctr++;
}
	
$data .="

<tr>
	<th class='border' colspan='3'>Total Amount</th>
	<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>

";

}else{
		$data .="

		<tbody>
<tr>
 <td class='text-center fw-bolder text-danger' colspan='17'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
</tr>
</tbody>";
	}	

	$data .="</table>";
	echo $data;
}


// certificate request super admin page live search
if (isset($_POST["cert_track"])) {
	$cert_track = $_POST["cert_track"];

	$sql_certLive = "SELECT * FROM tbl_cert_request WHERE person_name LIKE '%$cert_track%' || year_baptized LIKE '%$cert_track%' || year_confirmed LIKE '%$cert_track%' || request_type LIKE '%$cert_track%' || date_of_birth LIKE '%$cert_track%' || date_request LIKE '%$cert_track%'";
	$get_certLive = $conn->query($sql_certLive) or die($conn->error);
	$total_cert_row = $get_certLive->num_rows;
	$data_row = "";


	$data_row .="

	<table class='table table-hover' id='table-cert-request'>

<thead>
<tr class='text-center'>
<th>No.</th>
<th>Date Request</th>
<th>Person's Name(Baptized/Confirmed)</th>
<th>Birthday</th>
<th>Request Type</th>
<th>Others</th>
<th>Purpose</th>
<th>Year Baptized</th>
<th>Year Confirmed</th>
<th>Father's Name</th>
<th>Mother's Name(Maiden)</th>
<th>Requestor</th>
<th>Requestor Address</th>
<th>Contact</th>
<th>Relationship</th>
<th>Amount</th>
<th>Encoded By</th>
<th>Date Encoded</th>
<th>Updated By</th>
<th>Date Updated</th>
</tr>
</thead>
<tbody>
	";

if ($total_cert_row > 0) {
	$ctr = 1;
$peso_sign = "\xE2\x82\xB1";
$total_amount = 0;
while ($row_certTrack = $get_certLive->fetch_assoc()) {
$origdateBirth = $row_certTrack["date_of_birth"];
$dateBirth = new DateTime($origdateBirth);
$formatDateBirth = $dateBirth->format("M d, Y");

$orig_req_date = $row_certTrack["date_request"];
$dateReq = new DateTime($orig_req_date);
$formatReqDate = $dateReq->format("M d, Y");

$total_amount += $row_certTrack["cert_amount"];

$data_row .="

<tr class='text-center'>
<td>".$ctr."</td>
<td>".$formatReqDate."</td>
<td>".$row_certTrack["person_name"]."</td>
<td>".$formatDateBirth."</td>
<td>".$row_certTrack["request_type"]."</td>
<td>".$row_certTrack["cert_others"]."</td>
<td>".$row_certTrack["certificate_purpose"]."</td>
<td>".$row_certTrack["year_baptized"]."</td>
<td>".$row_certTrack["year_confirmed"]."</td>
<td>".$row_certTrack["father_name"]."</td>
<td>".$row_certTrack["mother_name"]."</td>
<td>".$row_certTrack["requesting_person_name"]."</td>
<td>".$row_certTrack["requesting_person_add"]."</td>
<td>".$row_certTrack["contact"]."</td>
<td>".$row_certTrack["relationship"]."</td>
<td>".$peso_sign.number_format($row_certTrack["cert_amount"])."</td>
<td>".$row_certTrack["encoded_by"]."</td>
<td>".$row_certTrack["date_encoded"]."</td>
<td>".$row_certTrack["updated_by"]."</td>
<td>".$row_certTrack["date_updated"]."</td>
</tr>

";

$ctr++;
}

$data_row .= "

<tr>
<th class='border' colspan='3'>Total Amount</th>
<td class='border fw-bolder'>".$peso_sign.number_format($total_amount)."</td>
</tr>

"; 
}else{
	$data_row .="

<tbody>
<tr>
 <td class='text-center fw-bolder text-danger' colspan='17'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
</tr>
</tbody>";
}
$data_row .="</table>";
echo $data_row;

}
#==================================

# baptismal page
$sql_baptismal = "SELECT *, fee AS total_fee FROM tbl_baptismal ORDER BY baptismal_id DESC";
$get_baptismal = $conn->query($sql_baptismal) or die($conn->error);



// entry baptismal value
if (isset($_POST["btnBaptisEntry"])) {
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
	$status = 'pending';

	$sql_baptismalInsert = "INSERT INTO tbl_baptismal(reservation_date, time_reservation, baptismal_name, baptismal_date, gender, date_of_birth, birth_place, father_name, father_birth_place, mother_name, mother_birth_place, baptismal_address, contact, type_of_marriage, or_number, fee, priest, encode_by, status, date_encode) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
	$stmt_baptistInsert = $conn->prepare($sql_baptismalInsert) or die($conn->error);
	$stmt_baptistInsert->bind_param("sssssssssssssssssss", $baptist_entry_reserve_date, $baptist_entry_time, $baptist_entry_name, $baptist_entry_date_baptize, $baptist_entry_gender, $baptist_entry_bday, $baptist_entry_birthPlace, $baptist_entry_father, $baptist_entry_fatherAdd, $baptist_entry_mother, $baptist_entry_motherAdd, $baptist_entry_add, $baptist_entry_contact, $baptist_entry_marriageType, $baptist_entry_ornum, $baptist_entry_amount, $baptist_entry_priest, $_SESSION["username"], $status);
	$stmt_baptistInsert->execute();
	$stmt_baptistInsert->close();
	header("location: ../main/baptismal");
}

// update baptismal data
if (isset($_POST["btnUpdateBaptist"])) {
	$update_baptist_id = $_POST["update_baptist_id"];

	if (!empty($update_baptist_id)) {
		$baptist_update_ornum = $conn->escape_string(trim($_POST["baptist_update_ornum"]));
		$baptist_update_reserve_date = $conn->escape_string(trim($_POST["baptist_update_reserve_date"]));
		$baptist_update_time = $conn->escape_string(trim($_POST["baptist_update_time"]));
		$baptist_update_amount = $conn->escape_string(trim($_POST["baptist_update_amount"]));
		$baptist_update_date_baptize = $conn->escape_string(trim($_POST["baptist_update_date_baptize"]));
		$baptist_update_name = $conn->escape_string(trim($_POST["baptist_update_name"]));
		$baptist_update_gender = $conn->escape_string(trim($_POST["baptist_update_gender"]));
		$baptist_update_add = $conn->escape_string(trim($_POST["baptist_update_add"]));
		$baptist_update_bday = $conn->escape_string(trim($_POST["baptist_update_bday"]));
		$baptist_update_birthPlace = $conn->escape_string(trim($_POST["baptist_update_birthPlace"]));
		$baptist_update_father = $conn->escape_string(trim($_POST["baptist_update_father"]));
		$baptist_update_fatherAdd = $conn->escape_string(trim($_POST["baptist_update_fatherAdd"]));
		$baptist_update_mother = $conn->escape_string(trim($_POST["baptist_update_mother"]));
		$baptist_update_motherAdd = $conn->escape_string(trim($_POST["baptist_update_motherAdd"]));
		$baptist_update_contact = $conn->escape_string(trim($_POST["baptist_update_contact"]));
		$baptist_update_marriageType = $conn->escape_string(trim($_POST["baptist_update_marriageType"]));
		$baptist_update_priest = $conn->escape_string(trim($_POST["baptist_update_priest"]));

		if ($update_baptist_id != "") {
			$sql_update_baptist = "UPDATE tbl_baptismal SET or_number=?, reservation_date=?, time_reservation=?, fee=?, baptismal_date=?, baptismal_name=?, gender=?, baptismal_address=?, date_of_birth=?, birth_place=?, father_name=?, father_birth_place=?, mother_name=?, mother_birth_place=?, contact=?, type_of_marriage=?, priest=?, update_by=?, date_updated=NOW() where baptismal_id=?";
			$stmt_update_baptist = $conn->prepare($sql_update_baptist) or die($conn->error);
			$stmt_update_baptist->bind_param("ssssssssssssssssssi", $baptist_update_ornum, $baptist_update_date, $baptist_update_time, $baptist_update_amount, $baptist_update_date_baptize, $baptist_update_name, $baptist_update_gender, $baptist_update_add, $baptist_update_bday, $baptist_update_birthPlace, $baptist_update_father, $baptist_update_fatherAdd, $baptist_update_mother, $baptist_update_motherAdd, $baptist_update_contact, $baptist_update_marriageType, $baptist_update_priest, $_SESSION["username"], $update_baptist_id);
			$stmt_update_baptist->execute();
			$stmt_update_baptist->close();
			header("location: baptismal");
		}

	}
}



// retrieve data using json encode
if (isset($_POST["update_baptist_id"])) {
	$update_baptist_id = $_POST["update_baptist_id"];

	$sql_baptistRetrieve = "SELECT * FROM tbl_baptismal WHERE baptismal_id='$update_baptist_id'";
	$get_baptistRetrieve = $conn->query($sql_baptistRetrieve) or die($conn->error);
	$row_baptistRetrieve = $get_baptistRetrieve->fetch_assoc();
	echo json_encode($row_baptistRetrieve);
}

// =================

// retrieve delete data
if (isset($_POST["del_baptismal_idSuper"])) {
    $del_baptismal_id = $_POST["del_baptismal_idSuper"];
    
    // Assuming $conn is your database connection object
    $sql_baptistDel = "DELETE FROM tbl_baptismal WHERE baptismal_id='$del_baptismal_id'";
    
    if ($conn->query($sql_baptistDel)) {
        // If the delete operation was successful
        $response = array("success" => true, "message" => "Record deleted successfully");
		header('Location: ../super_admin/baptismal');
    } else {
        // If there was an error in the delete operation
        $response = array("success" => false, "message" => "Error deleting record: " . $conn->error);
    }
}

if (isset($_POST["approve_baptismal_id"])) {
    $approve_baptismal_id = $_POST["approve_baptismal_id"];

    // Assuming $conn is your database connection object
    $sql_approve_baptismal = "UPDATE tbl_baptismal SET status = 'approved' WHERE baptismal_id = '$approve_baptismal_id'";
    
    if ($conn->query($sql_approve_baptismal)) {
        // If the update operation was successful
        $response = array("success" => true, "message" => "Record approved successfully");
        header('Location: ../main/baptismal');
    } else {
        // If there was an error in the update operation
        $response = array("success" => false, "message" => "Error approving record: " . $conn->error);
    }
}

#----------------------------------

// delete baptismal query


if (isset($_POST["del_baptismal_idMain"])) {
    $del_baptismal_id = $_POST["del_baptismal_idMain"];
    
    // Assuming $conn is your database connection object	
    $sql_baptistDel = "DELETE FROM tbl_baptismal WHERE baptismal_id='$del_baptismal_id'";
    
    if ($conn->query($sql_baptistDel)) {
        // If the delete operation was successful
		header('Location: ../main/baptismal');
    } else {
        // If there was an error in the delete operation
        $response = array("success" => false, "message" => "Error deleting record: " . $conn->error);
    }
}

if (isset($_POST["del_baptismal_idUser"])) {
	$del_baptismal_id = intval($_POST["del_baptismal_idUser"]);
	if (!empty($del_baptismal_id) AND $del_baptismal_id != "") {
		// trigger insert query before delete
		$sql_insert_baptist_arch = "INSERT INTO tbl_baptismal_archive(reservation_date_arch, time_reservation_arch, baptismal_name_arch, baptismal_date_arch, gender_arch, date_of_birth_arch, birth_place_arch, father_name_arch, father_birth_place_arch, mother_name_arch, mother_birth_place_arch, baptismal_address_arch, contact_arch, type_of_marriage_arch, or_number_arch, fee_arch, priest_arch,deleted_by) SELECT reservation_date, time_reservation, baptismal_name, baptismal_date, gender, date_of_birth, birth_place, father_name, father_birth_place, mother_name, mother_birth_place, baptismal_address, contact, type_of_marriage, or_number, fee, priest, ? FROM tbl_baptismal WHERE baptismal_id=?";
		$get_insert_baptistArch = $conn->prepare($sql_insert_baptist_arch) or die($conn->error);
		$get_insert_baptistArch->bind_param("si",$_SESSION["username"], $del_baptismal_id);
		$get_insert_baptistArch->execute();

		$sql_delBaptist = "DELETE FROM tbl_baptismal WHERE baptismal_id=?";
		$get_delBaptist = $conn->prepare($sql_delBaptist) or die($conn->error);
		$get_delBaptist->bind_param("i", $del_baptismal_id);
		$rs_delBaptist = $get_delBaptist->execute();

		if ($rs_delBaptist == true) {
			header("location: ../users/baptismal");
		}
	}
}

// baptismal ajax filtering
if (isset($_POST["searchBaptist"])) {
	$searchBaptist = $_POST["searchBaptist"];

	$retrieve_baptist = "SELECT *, fee as total_fees FROM tbl_baptismal WHERE reservation_date LIKE '%$searchBaptist%' || baptismal_name LIKE '%$searchBaptist%' || baptismal_date LIKE '%searchBaptist%' || father_name LIKE '%searchBaptist%' || mother_name LIKE '%searchBaptist%'";
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
<td class='text-center fw-bolder text-danger' colspan='19'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
</tr>
</tbody>
		";
	}

$data_baptist .= "</table>";
echo $data_baptist;	
}

#======================================

// baptismal filter date
if (isset($_POST["from_baptist_date"], $_POST["to_baptist_date"])) {
	$from_baptist_date = $_POST["from_baptist_date"];
	$to_baptist_date = $_POST["to_baptist_date"];

	$query_filter_date = "SELECT *, fee as total_fees FROM tbl_baptismal WHERE reservation_date BETWEEN '$from_baptist_date' AND '$to_baptist_date'";
	$get_table = $conn->query($query_filter_date) or die($conn->error);
	$total_filter = $get_table->num_rows;
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

	if ($total_filter > 0) {
		$ctr = 1;
		$peso_sign = "\xE2\x82\xB1";
		$total_fees = 0;
		while ($row_retBaptist = $get_table->fetch_assoc()) {
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
<td class='text-center fw-bolder text-danger' colspan='19'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
</tr>
</tbody>
		";
	}

$data_baptist .= "</table>";
echo $data_baptist;	
}


#++++++++++++++++++++++++++++++++++
// Mass intention page
$view_mass_table = "SELECT * FROM tbl_mass_intent ORDER BY mass_id DESC";
$tbl_mass_list = $conn->query($view_mass_table) or die($conn->error);


if (isset($_POST["btnAddMassIntent"])) {
	$entry_transact_date = $conn->escape_string(trim($_POST["entry_transact_date"]));
	$entry_intentRequest = $conn->escape_string(trim($_POST["entry_intentRequest"]));
	$entry_others = $conn->escape_string(trim($_POST["entry_others"]));
	$entry_mass_time = $conn->escape_string(trim($_POST["entry_mass_time"]));
	$entry_mass_date = $conn->escape_string(trim($_POST["entry_mass_date"]));
	$entry_person_prayed = $conn->escape_string(trim($_POST["entry_person_prayed"]));
	$entry_person_making = $conn->escape_string(trim($_POST["entry_person_making"]));

	$sql_insert = "INSERT INTO tbl_mass_intent(mass_intention_request, specify, transacts_date, mass_time, mass_date, person_to_prayed_for, person_making_offering, encoded_by, date_encoded) VALUES(?,?,?,?,?,?,?,NOW())";
	$stmt_mass_intent = $conn->prepare($sql_insert) or die($conn->error);
	$stmt_mass_intent->bind_param("ssssssss", $entry_intentRequest, $entry_others, $entry_transact_date, $entry_mass_time, $entry_mass_date, $entry_person_prayed, $entry_person_making, $_SESSION["username"]);
	$stmt_mass_intent->execute();
	$stmt_mass_intent->close();
	header("location: mass-intention");
}

// retrieve update ajax
if (isset($_POST["editMassIntentId"])) {
	$editMassIntentId = $_POST["editMassIntentId"];
	$sql_mass_intent = "SELECT * FROM tbl_mass_intent WHERE mass_id='$editMassIntentId'";
	$get_mass_intent = $conn->query($sql_mass_intent) or die($conn->error);
	$row_mass_intent = $get_mass_intent->fetch_assoc();
	echo json_encode($row_mass_intent);
}

if (isset($_POST["del_massIntentId"])) {
	$del_massIntentId = $_POST["del_massIntentId"];
	$sql_massDelIntent = "SELECT * FROM tbl_mass_intent WHERE mass_id='$del_massIntentId'";
	$get_delMassIntent = $conn->query($sql_massDelIntent) or die($conn->error);
	$row_delMassIntent = $get_delMassIntent->fetch_assoc();
	echo json_encode($row_delMassIntent);
}


if (isset($_POST["btnUpdateMassIntent"])) {
	$editMassIntentId = $_POST["editMassIntentId"];
	if (!empty($editMassIntentId) && $editMassIntentId != "") {
		$update_transact_date = $conn->escape_string(trim($_POST["update_transact_date"]));
		$update_intentRequest = $conn->escape_string(trim($_POST["update_intentRequest"]));
		$update_others = $conn->escape_string(trim($_POST["update_others"]));
		$update_mass_date = $conn->escape_string(trim($_POST["update_mass_date"]));
		$update_mass_time = $conn->escape_string(trim($_POST["update_mass_time"]));
		$update_person_prayed = $conn->escape_string(trim($_POST["update_person_prayed"]));
		$update_person_making = $conn->escape_string(trim($_POST["update_person_making"]));

		$sql_update_mass_intent = "UPDATE tbl_mass_intent SET mass_intention_request=?, specify=?, transacts_date=?, mass_time=?, mass_date=?, person_to_prayed_for=?, person_making_offering=?, update_by=?, date_updated=NOW() WHERE mass_id=?";
		$stmtupdate_mass_intent = $conn->prepare($sql_update_mass_intent) or die($conn->error);
		$stmtupdate_mass_intent->bind_param("ssssssssi", $update_intentRequest, $update_others, $update_transact_date, $update_mass_time, $update_mass_date, $update_person_prayed, $update_person_making,$_SESSION["username"], $editMassIntentId);
		$stmtupdate_mass_intent->execute();
		$stmtupdate_mass_intent->close();
		header("location: mass-intention");
	}
}

// delete button for mass intent
if (isset($_POST["btnDeleteMassIntent"]) && isset($_POST["del_massIntentId"])) {
	$del_massIntentId = intval($_POST["del_massIntentId"]);
	$sql_mass_intent = "INSERT INTO tbl_mass_intent_archive(mass_intention_request_arch, specify_arch, transacts_date_arch, mass_time_arch, mass_date_arch, person_to_prayed_for_arch, person_making_offering, username_arch, deleted_by) SELECT mass_intention_request, specify, transacts_date, mass_time, mass_date, person_to_prayed_for, person_making_offering, username, ? FROM tbl_mass_intent WHERE mass_id=?";
	$get_insert_arch = $conn->prepare($sql_mass_intent) or die($conn->error);
	$get_insert_arch->bind_param("si", $_SESSION["username"], $del_massIntentId);
	$get_insert_arch->execute();

	$sql_del_massIntent = "DELETE FROM tbl_mass_intent WHERE mass_id=?";
	$get_del_massIntent = $conn->prepare($sql_del_massIntent) or die($conn->error);
	$get_del_massIntent->bind_param("i", $del_massIntentId);
	$rs_del_massIntent = $get_del_massIntent->execute();

	if ($rs_del_massIntent == true) {
		header("location: mass-intention");
	}
}


// mass intention ajax table filtering
if (isset($_POST["massIntentSearch"])) {
	$massIntentSearch = $_POST["massIntentSearch"];

	$sql_massIntentFilter = "SELECT * FROM tbl_mass_intent WHERE mass_intention_request LIKE '%$massIntentSearch%' || transacts_date LIKE '%$massIntentSearch%' || username LIKE '%$massIntentSearch%'";
	$get_massFilter = $conn->query($sql_massIntentFilter) or die($conn->error);
	$total_massFilter = $get_massFilter->num_rows;
	$data_mass_intent = "";
	
	$data_mass_intent .="

		<table class='table table-hover' id='table-mass-intent'>
		<thead>
			<tr class='text-center'>
				<th>No.</th>
				<th>Requested</th>
				<th>Specific</th>
				<th>Transacts Date</th>
				<th>Time</th>
				<th>Date</th>
				<th>Person to be pray</th>
				<th>Person making offering</th>
				<th>Username</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	";

	if ($total_massFilter > 0) {
		while ($row = $tbl_mass_list->fetch_assoc()) {
			$origTransdate = $row["transacts_date"];
			$dateTrans = new DateTime($origTransdate);
			$format_transdate = $dateTrans->format("M d, Y");

			$origMassdate = $row["mass_date"];
			$dateMass = new DateTime($origMassdate);
			$format_massdate = $dateMass->format("M d, Y");

			$origMasstime = $row["mass_time"];
			$timeMass = new DateTime($origMasstime);
			$format_masstime = $timeMass->format("h:i A");
			
			$data_mass_intent .="

			<tr class='text-center'>
				<td>".$ctr."</td>
				<td>".$row['mass_intention_request']."</td>
				<td>".$row['specify']."</td>
				<td>".$format_transdate."</td>
				<td>".$format_masstime."</td>
				<td>".$format_massdate."</td>
				<td>".$row['person_to_prayed_for']."</td>
				<td>".$row['person_making_offering']."</td>
				<td>".$row['username']."</td>
				<td>
					<a href='#' id='".$row['mass_id']."' type='button' class='btn btn-outline-success editMassIntent-data' data-bs-toggle='modal' data-bs-target='#modalUpdateMassIntent'><i class='fa-solid fa-pencil'></i></a> <a href='#' id='".$row['mass_id']."' type='button' class='btn btn-outline-danger deleteMassIntent-data' data-bs-toggle='modal' data-bs-target='#modalDeleteMassIntent'><i class='fa-solid fa-eraser'></i></a>
				</td>
			</tr>

			";	
			$ctr++;
		}
		$data_mass_intent .="</tbody>";
	}else{
		$data_mass_intent .="
		<tbody>
			<tr>
				<td class='text-center fw-bolder' colspan='10'><h3 class='text-danger animated fadeIn slow infinite'>No Records Found</h3><td>
			</tr>
		</tbody>
		";
	}
	$data_mass_intent .="</table>";
	echo $data_mass_intent;
}
#+++++++++++++++++++++++++++++++++++

#++++++++++++++++++++++++++++++++++
// Wedding page

// view all wedding records



$view_wedding_table = "SELECT *, fees AS total_fees FROM tbl_wedding ORDER BY wedding_id DESC";
$get_wedding_list = $conn->query($view_wedding_table) or die($conn->error);



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

if(isset($_POST['del_weddingIdMain'])){
    $id = $_POST['del_weddingIdMain'];

    // Perform deletion
    $sql_delete_wedding = "DELETE FROM tbl_wedding WHERE wedding_id = ?";
    $stmt_delete_wedding = $conn->prepare($sql_delete_wedding) or die($conn->error);
    $stmt_delete_wedding->bind_param("i", $id);

    if ($stmt_delete_wedding->execute()) {
        // Deletion successful
        $stmt_delete_wedding->close();

        // Redirect or show success message as needed
		header("location: ../main/wedding");
        exit();
    }
}

if(isset($_POST['del_weddingIdSuper'])){
    $id = $_POST['del_weddingIdSuper'];

    // Perform deletion
    $sql_delete_wedding = "DELETE FROM tbl_wedding WHERE wedding_id = ?";
    $stmt_delete_wedding = $conn->prepare($sql_delete_wedding) or die($conn->error);
    $stmt_delete_wedding->bind_param("i", $id);

    if ($stmt_delete_wedding->execute()) {
        // Deletion successful
        $stmt_delete_wedding->close();

        // Redirect or show success message as needed
		header("location: ../super_admin/wedding-request");
        exit();
    }
}


if(isset($_POST['approveWedMain'])){
    $id = $_POST['approveWedMain'];

    // Perform update
    $sql_approve_wedding = "UPDATE tbl_wedding SET status = 'approved' WHERE wedding_id = ?";
    $stmt_approve_wedding = $conn->prepare($sql_approve_wedding) or die($conn->error);
    $stmt_approve_wedding->bind_param("i", $id);

    if ($stmt_approve_wedding->execute()) {
        // Update successful
        $stmt_approve_wedding->close();

        // Redirect or show success message as needed
		header("location: ../main/wedding");
        exit();
    }
}

if(isset($_POST['approveWedSuper'])){
    $id = $_POST['approveWedSuper'];

    // Perform update
    $sql_approve_wedding = "UPDATE tbl_wedding SET status = 'approved' WHERE wedding_id = ?";
    $stmt_approve_wedding = $conn->prepare($sql_approve_wedding) or die($conn->error);
    $stmt_approve_wedding->bind_param("i", $id);

    if ($stmt_approve_wedding->execute()) {
        // Update successful
        $stmt_approve_wedding->close();

        // Redirect or show success message as needed
		header("location: ../super_admin/wedding-request");
        exit();
    }
}


// ajax retrieve update wedding
if (isset($_POST["update_weddingId"])) {
	$update_weddingId = $_POST["update_weddingId"];
	$sql_updateWeddingId = "SELECT * FROM tbl_wedding WHERE wedding_id='$update_weddingId'";
	$get_updateWeddingList = $conn->query($sql_updateWeddingId) or die($conn->error);
	$row_updateWedding = $get_updateWeddingList->fetch_assoc();
	echo json_encode($row_updateWedding);
}

// ajax retrieve delete wedding
if (isset($_POST["del_weddingId"])) {
	$del_weddingId = $_POST["del_weddingId"];
	$sql_delWeddingId = "SELECT * FROM tbl_wedding WHERE wedding_id='$del_weddingId'";
	$get_delWeddingList = $conn->query($sql_delWeddingId) or die($conn->error);
	$row_delWedding = $get_delWeddingList->fetch_assoc();
	echo json_encode($row_delWedding);
}

// delete wedding records
if (isset($_POST["btnDelWed"]) && isset($_POST["del_weddingId"])) {
	$del_weddingId = intval($_POST["del_weddingId"]);
	$sql_wedding = "INSERT INTO tbl_wedding_archive(bride_full_name_arch, bride_cenomar_arch, bride_contact_arch, groom_full_name_arch, groom_cenomar_arch, groom_contact_arch, ceremony_date_arch, ceremony_time_arch, fees_arch, receipt_arch, username_arch, deleted_by) SELECT bride_full_name, bride_cenomar, bride_contact, groom_full_name, groom_cenomar, groom_contact, ceremony_date, ceremony_time, fees, receipt, username, ? FROM tbl_wedding WHERE wedding_id = ?";
	$get_insert_wed = $conn->prepare($sql_wedding) or die($conn->error);
	$get_insert_wed->bind_param("si", $_SESSION["username"], $del_weddingId);
	$get_insert_wed->execute();

	$sql_del_wedding = "DELETE FROM tbl_wedding WHERE wedding_id = ?";
	$get_del_wedding = $conn->prepare($sql_del_wedding) or die($conn->error);
	$get_del_wedding->bind_param("i", $del_weddingId);
	$rs_delWedding = $get_del_wedding->execute();

	if ($rs_delWedding == true) {
		header("location: wedding");
	}
}

// update wedding records
if (isset($_POST["btnUpdateWedding"])) {
	$update_weddingId = $_POST["update_weddingId"];
	if (!empty($update_weddingId) && $update_weddingId != "") {
		$update_ceremony_date = $conn->escape_string(trim($_POST["update_ceremony_date"]));
		$update_ceremony_time = $conn->escape_string(trim($_POST["update_ceremony_time"]));
		$update_fee = $conn->escape_string(trim($_POST["update_fee"]));
		$update_file = $_FILES["update_file"];
		$update_bride_name = $conn->escape_string(trim($_POST["update_bride_name"]));
		$update_bride_contact = $conn->escape_string(trim($_POST["update_bride_contact"]));
		$update_bride_cenomar = $_FILES["update_bride_cenomar"];
		$update_groom_name = $conn->escape_string(trim($_POST["update_groom_name"]));
		$update_groom_contact = $conn->escape_string(trim($_POST["update_groom_contact"]));
		$update_groom_cenomar = $_FILES["update_groom_cenomar"];

		function moveAndRenameFile($file){
			$origFileName = $file["name"];
		$file_ext = pathinfo($origFileName, PATHINFO_EXTENSION);
		$newFileName = uniqid(). "_" . $origFileName;
		$destination = "../upload/" .$newFileName;

		while (file_exists($destination)) {
			 $newFileName = uniqid() . "_" . $origFileName;
   	$destination = "../upload/" . $newFileName;
		}

		 move_uploaded_file($file["tmp_name"], $destination);

    return $newFileName;
		}

		// create an array for uploading files
		$uploaded_files = array(
			"update_bride_cenomar" => $update_bride_cenomar,
			"update_groom_cenomar" => $update_groom_cenomar,
			"update_file" => $update_file
	);

	foreach ($uploaded_files as $key => $file) {
		if (!empty($file["name"])) {
			$originalFileName = $file["name"];
			$newFileName = moveAndRenameFile($file);
			$uploaded_files[$key] = $newFileName;
		}
	}

	
	if (!empty($update_file["name"])) {
				$sql_update_wedding = "UPDATE tbl_wedding SET bride_full_name=?, bride_cenomar=?, bride_contact=?, groom_full_name=?, groom_cenomar=?, groom_contact=?, ceremony_date=?, ceremony_time=?, fees=?, receipt=?, update_by=?, date_updated=NOW() WHERE wedding_id=?";
				$stmt_update_wedding = $conn->prepare($sql_update_wedding) or ($conn->error);
				$stmt_update_wedding->bind_param("sssssssssssi", $update_bride_name, $uploaded_files["update_bride_cenomar"], $update_bride_contact, $update_groom_name, $uploaded_files["update_groom_cenomar"], $update_groom_contact, $update_ceremony_date, $update_ceremony_time, $update_fee, $uploaded_files["update_file"], $_SESSION["username"], $update_weddingId);
				$stmt_update_wedding->execute();
				$stmt_update_wedding->close();
				header("location: wedding");
			}		
	}
}

// ajax filter wedding
if (isset($_POST["weddingFilter"])) {
	$weddingFilter = $_POST["weddingFilter"];

	$sql_weddingFilter = "SELECT *, fees AS total_fees FROM tbl_wedding WHERE bride_full_name LIKE '%$weddingFilter%' || ceremony_date LIKE '%$weddingFilter%' || groom_full_name LIKE '%$weddingFilter%'";
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
<td><a target='_blank' class='animated fadeIn infinite text-success fw-bolder' href='../upload/".$row_wedding['receipt']."'>".shortenLinkName($row_wedding["receipt"])."</a></td>
<td>".$row_wedding["bride_full_name"]."</td>
<td><a class='text-success fw-bolder animated fadeIn infinite' href='../upload/".$row_wedding['bride_cenomar']."'>".shortenLinkName($row_wedding["bride_cenomar"])."</a></td>
<td>".$row_wedding["bride_contact"]."</td>
<td>".$row_wedding["groom_full_name"]."</td>
<td><a target='_blank' href='../upload/".$row_wedding['groom_cenomar']."' class='text-success fw-bolder animated fadeIn infinite' target='_blank'>".shortenLinkName($row_wedding["groom_cenomar"])."</a></td>
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
 		<td class='text-center fw-bolder text-danger' colspan='12'><h3 class='animated fadeIn slow infinite'>No Records</h3></td>
 	</tr>
 	</tbody>

 	";
 }
 $data_wedding .="</table>";
 echo $data_wedding;
}

#++++++++++++++++++++++++++++++++++++++

#+++++++++++++++++++++++++++
// certificate generate
$view_table_cert = "SELECT * FROM tbl_certificate ORDER BY cert_id DESC";
$get_cert = $conn->query($view_table_cert) or die($conn->error);

// certificate area
// certificate area
if (isset($_POST["btnCert"])) {
    include("../tcpdf/tcpdf.php");

    $entry_cert_name = $conn->escape_string(trim($_POST["entry_cert_name"]));
    $entry_cert_date = $conn->escape_string(trim($_POST["entry_cert_date"]));
    $entry_cert_title = $conn->escape_string(trim($_POST["entry_cert_title"]));
    $entry_cert_subTitle = $conn->escape_string(trim($_POST["entry_cert_subTitle"]));
    $entry_cert_desc = $conn->escape_string(trim($_POST["entry_cert_desc"]));
    $entry_cert_subDesc = $conn->escape_string(trim($_POST["entry_cert_subDesc"]));

    // Create PDF
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

    $pdf->SetTitle("Certificate of $entry_cert_title");

    $pdf->AddPage();

    $pdf->SetFont('helvetica', '', 18);
    $pdf->writeHTML("
        <style>
            * {
                text-align: center;
            }
        </style>
        <h1> Certificate of $entry_cert_title</h1>
        <p> This certifies that </p>
        <h2> $entry_cert_name </h2>
        <h4>$entry_cert_subTitle</h4>
        <p> $entry_cert_desc</p>
        <p>$entry_cert_subDesc</p>
        <h2>Sacred Heart Parish-Shrine</h2>
        <p> on $entry_cert_date </p>
    ");

    // Output PDF to a variable
    $pdfData = $pdf->Output('', 'S');

    // Convert binary data to Base64
    $base64EncodedPDF = base64_encode($pdfData);

    $sql_insert_cert = "INSERT INTO tbl_certificate(full_name, cert_date, title, sub_title, description, sub_description, pdf_data) VALUES(?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql_insert_cert) or die($conn->error);
    $stmt->bind_param("sssssss", $entry_cert_name, $entry_cert_date, $entry_cert_title, $entry_cert_subTitle, $entry_cert_desc, $entry_cert_subDesc, $base64EncodedPDF);

    // Provide PDF for download immediately after inserting into the database
    // header('Content-Type: application/pdf');
    // header('Content-Disposition: attachment; filename="' . $entry_cert_name . '-' . $entry_cert_title . '-certificate.pdf"');
    // echo $pdfData;

    $stmt->execute();
    $stmt->close();

    header("location: certificates");  
}


// Download certificate
if (isset($_POST["download_cert"])) {
    $download_cert_id = $conn->escape_string(trim($_POST["download_cert"]));

    // Fetch PDF data from the database
    $sql_select_pdf = "SELECT pdf_data FROM tbl_certificate WHERE cert_id = ?";
    $stmt_select_pdf = $conn->prepare($sql_select_pdf) or die($conn->error);
    $stmt_select_pdf->bind_param("i", $download_cert_id);

    $stmt_select_pdf->execute();
    $stmt_select_pdf->store_result();

    if ($stmt_select_pdf->num_rows > 0) {
        $stmt_select_pdf->bind_result($base64EncodedPDF);
        $stmt_select_pdf->fetch();

        // Decode base64 to get the binary PDF data
        $pdfData = base64_decode($base64EncodedPDF);

        // Provide PDF for download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="certificate.pdf"');

        // Output error if there are issues with PDF data
        if ($pdfData === false) {
            echo "Error decoding PDF data.";
        } else {
            echo $pdfData;

             // Add JavaScript to reload the page after a delay (e.g., 3 seconds)
            echo '<script>
                    setTimeout(function(){
                        window.location.reload();
                    }, 3000);
                  </script>';
        }
        exit;
    } else {
        echo "PDF not found.";
    }

    $stmt_select_pdf->close();
}

#++++++++++++++++++++++++++++++++

// certicate ajax request
if (isset($_POST["searchCert"])) {
	$searchCert = $_POST["searchCert"];
	$sql_cert = "SELECT * FROM tbl_certificate WHERE full_name LIKE '%$searchCert%' || cert_date LIKE '%$searchCert%' || title LIKE '%$searchCert%'";
	$get_filterCert = $conn->query($sql_cert) or die($conn->error);
	$total_filterCert = $get_filterCert->num_rows;
	$data_cert = "";

	$data_cert .="

	<table class='table table-hover' id='table-cert-request'>
<thead>
	<tr class='text-center'>	
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
<tbody>";

if ($total_filterCert > 0) {
	$ctr = 1;
while ($row = $get_cert->fetch_assoc()) {
$origDate = $row["cert_date"];
$date = new DateTime($origDate);
$format = $date->format("M d, Y");	
$data_cert .="

<tr class='text-center'>
		<td>".$ctr++."</td>
		<td>".$row['full_name']."</td>
		<td>".$format."</td>
		<td>".$row['title']."</td>
		<td>".$row['sub_title']."</td>
		<td>".$row['description']."</td>
		<td>".$row['sub_description']."</td>
		<td>
    <form method='POST'>
        <input type='hidden' name='download_cert' value='".$row['cert_id']."'>
        <button type='submit' class='btn btn-outline-primary'>Download</button>
    </form>
</td>
	</tr>";
$ctr++;
  }
 $data_cert .= "</tbody>";
 }else{
 	$data_cert .= "
 	<tbody>
 		<tr class='text-center'>
 			<td colspan='8'><h3 class='text-danger fw-bolder animated fadeIn slow infinite'>No Records</h3></td>
 		</tr>
 	</tbody>
 	";
 }

 $data_cert .="</table>";
 echo $data_cert;
}
?>


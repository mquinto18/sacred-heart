<?php
ob_start();
session_start();

$newScript = md5(rand(1,9));
$newPage = md5(rand(1,9));

$user_id = $_SESSION["user_id"];
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$account_type = $_SESSION["account_type"];
$full_name = $_SESSION["first_name"] . $_SESSION["last_name"];

if (!isset($user_id)) {
	header("location: ../logout");
}

if (!isset($user_id)) {
	header("location: logout");
}


if (!isset($first_name) AND !isset($last_name)) {
header("location: ../logout");	
}

if (!isset($first_name) AND !isset($last_name)) {
header("location: logout");	
}

// check if the session username is set if not automatic logout
	if (isset($user_id)) {
		// $message =  $_SESSION["first_name"] . " " . $_SESSION["last_name"];
		
		$first_initials = substr($first_name, 0,1);
		$last_initials = substr($last_name, 0,1);
		$initials = $first_initials . $last_initials;
	
	}else{
		header("location: ../logout");
	}

	if (isset($user_id)) {
		// $message =  $_SESSION["first_name"] . " " . $_SESSION["last_name"];
		
		$first_initials = substr($first_name, 0,1);
		$last_initials = substr($last_name, 0,1);
		$initials = $first_initials . $last_initials;
	}else{
		header("location: logout");
	}

?>
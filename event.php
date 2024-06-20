<!DOCTYPE html>
<html lang="en">

<?php 
	require_once "template-parts/head.php"; 
	require_once "inc/calendar.php";
?>

<body>
<?php 
	require_once "template-parts/sub-nav.php"; 
?>


<section id="event-schedule">
	<div class="container-fluid mt-3">
		<div class="row">
			<div class="col-md-12">
				<?php
$dateComponents = getdate();
if (isset($_GET["month"]) && isset($_GET["year"])) {
	$month = (int)$_GET["month"];
	$year = (int)$_GET["year"];
}else{
echo "<script type='text/javascript' src='js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>

document.addEventListener('DOMContentLoaded', function(){
Swal.fire({
title: 'Info',
text: 'to view the available bookings just click the buttons',
icon: 'info',
allowOutsideClick: false,
allowEscapeKey: false,
showConfirmButton: false,
footer: '<a href=\"event?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">Okay</a>'
});
}); 
</script>";
$month = (int)$dateComponents["month"];
$year = (int)$dateComponents["year"];
}
echo build_calendar($month,$year);
?>
			</div>
		</div>
	</div>
</section>
  

<?php
	require_once "template-parts/footer.php";
	require_once "template-parts/bottom.php"; 
?>
</body>
</html>
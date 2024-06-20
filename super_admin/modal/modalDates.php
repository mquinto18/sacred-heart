<!-- baptismal modal calendar -->

<div class="modal fade" id="modalBaptismalDates" aria-hidden="true" tabindex="-1">
	
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
	
		<div class="modal-content">
			
		<div class="modal-header">
			<h3 class="text-success ">Event Schedules</h3>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<!-- end of modal header -->

		<div class="modal-body">
			<?php
// baptismal date modal
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
footer: '<a href=\"baptismal?month=" . date('m') . "&year=" . date('Y') . "\" type=\"button\" id=\"swal-success\">info</a>'
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
		<!-- end of modal content -->

	</div> <!-- end of modal dialog -->

</div>


<!-- -->



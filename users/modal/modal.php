<!-- add entry level -->
<div class="modal fade" id="modalAddEvents" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<!-- modal header -->
<div class="modal-header"> 
<h3 class="text-success ">Add Events</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->

<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" enctype="multipart/form-data" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-6 mb-3">
<label>Event Title</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-heading"></i></span>
<input type="text" name="event_title" class="form-control" required="" pattern="[A-Za-z ]+" title="Please input letters only">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Full Name:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="event_user" class="form-control" required="" pattern="[A-Za-z ]+" title="Please input letters only">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Start Time:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="time" name="start_date" class="form-control" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Date Book:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="text" id="event-insert" name="end_date" class="form-control" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Remarks</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-flag"></i></span>
<select class="form-control" id="testchange" name="remarks" class="form-control" required="">
<option name="remarks"></option>
<option name="remarks" value="Walk-in Registration">Walk-in Registration</option>
<option name="remarks" value="Online Registration">Online Registration</option>
</select> 
</div>
</div>



<div class="col-md-12 mb-3">
<label>Description</label>
<textarea class="form-control" name="event_description" rows="6" placeholder="Optional"></textarea>
</div>

<div class="col-md-12 mb-3 text-end">
<input type="submit" class="btn btn-outline-primary" name="btnEventAdd" value="Add Event"> <a href="events" type="button" class="btn btn-outline-danger">Cancel</a>
</div>

</form>
</div>
<!--  -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div> <!-- end of modal add entry -->

<!-- update entry level -->
<div class="modal fade" id="modalUpdateEvent" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<!-- modal header -->
<div class="modal-header"> 
<h3 class="text-success ">Update Events</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->

<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" enctype="multipart/form-data" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="update_id" id="update_id">

<div class="col-md-6 mb-3">
<label>Event Title</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-heading"></i></span>
<input type="text" name="update_event_title" class="form-control" required="" id="update-event-title" pattern="[A-Za-z ]+" title="Please input letters only">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Full Name:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="update_event_user" class="form-control" required="" pattern="[A-Za-z ]+" title="Please input letters only" id="update-event-user">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Start Time:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="time" name="update_start_date" class="form-control" required="" id="update-start-date-event">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Date Book:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="text" id="update-end-date-event" placeholder="YYYY-MM-DD" readonly="" name="update_end_date" class="form-control" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Remarks:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-flag"></i></span>
<select class="form-control" required="" id="updatetestchange" name="update_remarks" id="update_remarks">
<option></option>
<option name="update_remarks" value="Walk-in Registration">Walk-in Registration</option>
<option name="update_remarks" value="Online Registration">Online Registration</option>	
</select>
</div>
</div>



<div class="col-md-12 mb-3">
<label>Description</label>
<textarea class="form-control" name="update_event_desc" id="update-event-desc" rows="6" placeholder="Optional"></textarea>
</div>

<div class="col-md-12 mb-3 text-end">
<input type="submit" class="btn btn-outline-primary" name="btnUpdateEvent" value="Update Event"> <a href="events" type="button" class="btn btn-outline-danger">Cancel</a>
</div>

</form>
</div> <!-- end of modal body -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div>
<!-- end of modal update -->

<!-- delete entry level -->
<div class="modal fade" id="modalDeleteEvent" aria-hidden="true" aria-labelledby="exampleToggle" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">

<div class="modal-content">
<!-- modal header -->
<div class="modal-header">
<h3 class="text-danger ">Delete Events</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!-- -->

<!-- modal body -->
<div class="modal-body">
<h4>You will delete the event title <u class="text-danger"><em><span class="text-danger fw-bolder" id="delete-title-event"></span></em></u> of <u class="text-danger"><em><span id="delete-sub-event" class="text-danger fw-bolder"></span></em></u> Records?</h4>

<form id="formUpdate" name="frmUpdate" class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="delete_id_event" id="delete_id_event">

<div class="col-md-12 text-end mt-md-0 mt-2">
<input type="submit" name="btnDeleteEvent" class="btn btn-outline-danger" id="btn-delete-event">
</div>

</form>
</div>
<!-- end of modal body -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div>

<!-- end of delete entry level -->

<!-- event modal -->

<!-- -->

<!--Entry certifications request -->
<div id="modalCertRequest" class="modal fade bg-transparent" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">

<div class="modal-content">

<div class="modal-header">
<h3 class="text-danger ">Entry Certfication Request</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div> <!-- end of modal header -->

<div class="modal-body">

<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-4 mb-3">
<label>Date Request</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<input type="date" name="cert_entry_date" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-8 mb-3">
<label>Person's name (Baptized/Confirmed)</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" pattern="[A-Za-z ]+" title="Please input letters only" name="cert_entry_name" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-3 mb-3">
<label>Birthday</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<input type="date" name="cert_entry_bday" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-3 mb-3">
<label>Request Type</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-code-pull-request"></i></span>
<select class="form-control" name="cert_entry_req_type" required=""> 
<option name="cert_entry_req_type" value=""></option>
<option name="cert_entry_req_type" value="Baptismal">Baptismal</option>
<option name="cert_entry_req_type" value="Confirmation">Cofirmation</option>
</select>
</div>
</div> <!-- end column -->

<div class="col-md-3 mb-3">
<label>Year Confirmed</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<select name="cert_entry_yr_confirmed" class="form-control">
<option name="cert_entry_yr_confirmed" value=""></option>
	<?php
		$currentYearConfirmed = date("Y");
		for ($yearConfirmed = $currentYearConfirmed; $yearConfirmed >= 1900; $yearConfirmed--) { 
		?>
		<option name="cert_entry_yr_confirmed" value="<?= $yearConfirmed; ?>"><?= $yearConfirmed; ?></option>
	<?php
		}
	?>
</select>
</div>
</div> <!-- end of column -->

<div class="col-md-3 mb-3">
<label>Year Baptized</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<select name="cert_entry_yr_baptized" class="form-control">
	<option name="cert_entry_yr_baptized" value=""></option>
	<?php
	$current_year_baptized = date("Y");
	for ($year_baptized = $current_year_baptized; $year_baptized >= 1900; $year_baptized--) { 
	?>
	<option name="cert_entry_yr_baptized" value="<?= $year_baptized; ?>"><?= $year_baptized; ?></option>
	<?php	
	}
	?>
</select>
</div>
</div> <!-- end column -->


<div class="col-md-6 mb-3">
<label>Father's Name</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-users"></i></span>
<input type="text" name="cert_entry_papa_name" required="" pattern="[A-Za-z ]+" class="form-control" title="letters only">
</div>
</div> <!-- end of column -->

<div class="col-md-6 mb-3">
<label>Mother's Maiden Name</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-users"></i></span>
<input type="text" name="cert_entry_mama_name" required="" pattern="[A-Za-z ]+" class="form-control" title="letters only">
</div>
</div> <!-- end of column -->

<div class="col-md-8 mb-3">
<label>Requisitor</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-users"></i></span>
<input type="text" name="cert_entry_requisitor" required="" pattern="[A-Za-z ]+" class="form-control" title="letters only">
</div>
</div> <!-- end of column -->


<div class="col-md-4 mb-3">
<label>Purpose</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-regular fa-comments"></i></span>
<select class="form-control" name="cert_entry_purpose" id="purpose" required="">
	<option name="cert_entry_purpose" value=""></option>
	<option name="cert_entry_purpose" value="Records">Records</option>
	<option name="cert_entry_purpose" value="Marriage">Marriage</option>
	<option name="cert_entry_purose" value="Others">Others</option>
</select>
</div>
</div> <!-- end column -->

<div class="col-md-12 mb-3" id="cert_others" style="display: none;">
<label>Others</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-regular fa-comment"></i></span>
<input type="text" name="cert_entry_others" class="form-control">
</div>
</div> <!-- end of column -->

<div class="col-md-12 mb-3">
<label>Requistor's Address</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-house"></i></span>
<textarea name="cert_entry_requisitor_add" class="form-control" required="" rows="2"></textarea>
</div>
</div>

<div class="col-md-4 mb-3">
<label>Relationship</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-hands-holding-child"></i></span>
<input type="text" name="cert_entry_relationship" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-4 mb-3">
<label>Contact</label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
	<input type="number" class="number form-control" step="1" name="cert_entry_contact" maxlength="11" min="0" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-4 mb-3">
<label>Amount</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" name="cert_entry_amount" pattern="^\d+(\.\d{1,9})?$" title="format of 000.00 only" min="0" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-12 mb-3 text-end">
<input type="submit" name="btnAddCertReq" class="btn btn-outline-primary">
</div>

</form>

</div> <!-- end of modal body -->

</div> <!-- end of modal content -->

</div> <!-- end of entry request certificate modal dialog -->

</div>
<!--  -->

<!-- Update Request Certifcate modal -->

<!-- update entry level -->
<div class="modal fade" id="modalUpdateCertReq" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<!-- modal header -->
<div class="modal-header"> 
<h3 class="text-success ">Update Certificate Request</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->

<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="cert_req_update_id" id="cert_req_update_id">


<div class="col-md-4 mb-3">
<label>Date Request</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<input type="date" name="cert_update_date" id="cert_update_date" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-8 mb-3">
<label>Person's name (Baptized/Confirmed)</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" pattern="[A-Za-z ]+" title="Please input letters only" name="cert_update_name" id="cert_update_name" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-3 mb-3">
<label>Birthday</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<input type="date" name="cert_update_bday" id="cert_update_bday" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-3 mb-3">
<label>Request Type</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-code-pull-request"></i></span>
<select class="form-control" name="cert_update_req_type" required="" id="cert_update_req_type"> 
<option name="cert_update_req_type" value=""></option>
<option name="cert_update_req_type" value="Baptismal">Baptismal</option>
<option name="cert_update_req_type" value="Confirmation">Cofirmation</option>
</select>
</div>
</div> <!-- end column -->

<div class="col-md-3 mb-3">
<label>Year Confirmed</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<select name="cert_update_yr_confirmed" class="form-control" id="cert_update_yr_confirmed">
<option name="cert_update_yr_confirmed" value=""></option>
	<?php
		$currentYearConfirmed = date("Y");
		for ($yearConfirmed = $currentYearConfirmed; $yearConfirmed >= 1900; $yearConfirmed--) { 
		?>
		<option name="cert_update_yr_confirmed" value="<?= $yearConfirmed; ?>"><?= $yearConfirmed; ?></option>
	<?php
		}
	?>
</select>
</div>
</div> <!-- end of column -->

<div class="col-md-3 mb-3">
<label>Year Baptized</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
<select name="cert_update_yr_baptized" class="form-control" id="cert_update_yr_baptized">
	<option name="cert_update_yr_baptized" value=""></option>
	<?php
	$current_year_baptized = date("Y");
	for ($year_baptized = $current_year_baptized; $year_baptized >= 1900; $year_baptized--) { 
	?>
	<option name="cert_update_yr_baptized" value="<?= $year_baptized; ?>"><?= $year_baptized; ?></option>
	<?php	
	}
	?>
</select>
</div>
</div> <!-- end column -->


<div class="col-md-6 mb-3">
<label>Father's Name</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-users"></i></span>
<input type="text" name="cert_update_papa_name" id="cert_update_papa_name" required="" pattern="[A-Za-z ]+" class="form-control" title="letters only">
</div>
</div> <!-- end of column -->

<div class="col-md-6 mb-3">
<label>Mother's Maiden Name</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-users"></i></span>
<input type="text" name="cert_update_mama_name" id="cert_update_mama_name" required="" pattern="[A-Za-z ]+" class="form-control" title="letters only">
</div>
</div> <!-- end of column -->

<div class="col-md-8 mb-3">
<label>Requisitor</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-users"></i></span>
<input type="text" name="cert_update_requisitor" id="cert_update_requisitor" required="" pattern="[A-Za-z ]+" class="form-control" title="letters only">
</div>
</div> <!-- end of column -->


<div class="col-md-4 mb-3">
<label>Purpose</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-regular fa-comments"></i></span>
<select class="form-control cert_update_purpose" name="cert_update_purpose" id="purpose" required="">
	<option name="cert_update_purpose" value=""></option>
	<option name="cert_update_purpose" value="Records">Records</option>
	<option name="cert_update_purpose" value="Marriage">Marriage</option>
	<option name="cert_update_purose" value="Others">Others</option>
</select>
</div>
</div> <!-- end column -->

<div class="col-md-12 mb-3" id="cert_others" style="display: none;">
<label>Others</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-regular fa-comment"></i></span>
<input type="text" name="cert_update_others" id="cert_update_others" class="form-control">
</div>
</div> <!-- end of column -->

<div class="col-md-12 mb-3">
<label>Requistor's Address</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-house"></i></span>
<textarea name="cert_update_requisitor_add" id="cert_update_requisitor_add" class="form-control" required="" rows="2"></textarea>
</div>
</div>

<div class="col-md-4 mb-3">
<label>Relationship</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-hands-holding-child"></i></span>
<input type="text" name="cert_update_relationship" id="cert_update_relationship" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-4 mb-3">
<label>Contact</label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
	<input type="number" class="number form-control" step="1" id="cert_update_contact" name="cert_update_contact" maxlength="11" min="0" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-4 mb-3">
<label>Amount</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" name="cert_update_amount" id="cert_update_amount" pattern="^\d+(\.\d{1,9})?$" title="format of 000.00 only" min="0" class="form-control" required="">
</div>
</div> <!-- end of column -->

<div class="col-md-12 mb-3 text-end">
<input type="submit" name="btnUpdateReq" class="btn btn-outline-primary">
</div>

</form>
</div> <!-- end of modal body -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div>
<!-- end of modal update -->


<!-- end of update request certificate modal -->

<!-- modal request certificate delete -->
<div class="modal fade" id="modalDelCertReq" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">

<div class="modal-content">
<!-- modal header -->
<div class="modal-header">
<h3 class="text-danger ">Delete Certifications</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!-- -->

<!-- modal body -->
<div class="modal-body">
<h4>You will delete the request certificate of <u class="text-danger"><em><span class="text-danger fw-bolder" id="delete_cert_req"></span></em></u> request type <u class="text-danger"><em><span id="delete-cert-request" class="text-danger fw-bolder"></span></em></u> Records?</h4>

<form id="formUpdate" name="frmUpdate" class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="del_cert_req_id" id="del_cert_req_id">

<div class="col-md-12 text-end mt-md-0 mt-2">
<input type="submit" name="btnDelCertReq" class="btn btn-outline-danger" id="btn-delete-event">
</div>

</form>
</div>
<!-- end of modal body -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div>
<!-- end of modal request certificate delete -->



<!-- entry baptismal value -->

<div class="modal fade" id="modalBaptisEntry" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
<div class="modal-content">

<!-- modal header -->
<div class="modal-header"> 
<h3 class="text-success ">Add Baptismal</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->


<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" enctype="multipart/form-data" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-4 mb-3">
<label>OR Number: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
<input type="number" min="0" class="form-control" name="baptist_entry_ornum" required="" pattern="^\d+(\d{1,9})?$">
</div>
</div>
<div class="col-md-4"></div>
<div class="col-md-4"></div>

<div class="col-md-4 mb-3">
<label>Reservation Date:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="text" name="baptist_entry_reserve_date" id="baptist_entry_reserve_date" class="form-control" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Reservation Time: </label>
<div class="input-group">
<span class="input-group-text"><i class="far fa-clock"></i></span>
<input type="time" class="form-control" name="baptist_entry_time" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Fees:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" name="baptist_entry_amount" pattern="^\d+(\.\d{1,9})?$" title="format of 000.00 only" min="0" class="form-control" required="">
</div>
</div>

<div class="col-md-5 mb-3">
<label>Date Baptismal:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="date" name="baptist_entry_date_baptize" class="form-control" required="">
</div>
</div>

<div class="col-md-7 mb-3">
<label>Baptismal Name:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-user"></i></span>
<input type="text" pattern="[A-Za-z ]+" name="baptist_entry_name" title="letters only" class="form-control" required="">
</div>
</div>

<div class="col-md-3 mb-3">
<label>Gender: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
<select class="form-control" name="baptist_entry_gender" required="">
	<option name="baptist_entry_gender" value=""></option>
	<option name="baptist_entry_gender" value="Male">Male</option>
	<option name="baptist_entry_gender" value="Female">Female</option>
</select>
</div>
</div>

<div class="col-md-9 mb-3">
<label>Address:</label>
<div class="input-group"> 
<span class="input-group-text"><i class="fas fa-house-user"></i></span>
<input class="form-control" name="baptist_entry_add" pattern="[A-Za-z ]+" required="" title="letters only">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Birthday: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="date" name="baptist_entry_bday" class="form-control" required="">
</div>
</div>

<div class="col-md-8 mb-3">
<label>Birth Place: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="text" pattern="[A-Za-z ]+" name="baptist_entry_birthPlace" class="form-control" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Father's Name: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-user"></i></span>
<input type="text" name="baptist_entry_father" class="form-control" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Birth Place: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-house"></i></span>
<input type="text" name="baptist_entry_fatherAdd" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Mother's Name: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="baptist_entry_mother" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Birth Place: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-house"></i></span>
<input type="text" name="baptist_entry_motherAdd" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Contact: </label>
<div class="input-group">
	<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
	<input type="number" class="number form-control" step="1" name="baptist_entry_contact" maxlength="11" min="0" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Marriage Type:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-ring"></i></span>
<select class="form-control" name="baptist_entry_marriageType" required="">
	<option name="baptist_entry_marriageType" value=""></option>
	<option name="baptist_entry_marriageType" value="Catholic Wedding">Catholic Wedding</option>
	<option name="baptist_entry_marriageType" value="Other Religion">Other Religion</option>
	<option name="baptist_entry_marriageType" value="Civil Wedding">Civil Wedding</option>
	<option name="baptist_entry_marriageType" value="Not Married">Not Married</option>
</select>
</div>
</div>

<div class="col-md-4 mb-3">
<label>Priest:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-regular fa-user"></i></span>
<input type="text" name="baptist_entry_priest" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-6 mb-3">
	<label>Online / Walk-in Payment</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fas fa-flag"></i></span>
		<select class="form-control" id="entryBaptist" name="remarks" required="">
			<option name="remarks"></option>
			<option name="remarks" value="Walk-in Payment">Walk-in Payment</option>
			<option name="remarks" value="Online Payment">Online Payment</option>
		</select>
	</div>
</div>



<div class="col-md-12 mt-3 text-end">
<input type="submit" name="btnBaptistEntry" class="btn btn-outline-success">
</div>

</form>
</div>
<!--  -->

</div>	<!-- end of modal content -->
</div> <!-- end of modal dialog -->
</div> <!-- end of baptismal modal -->

<!-- -->

<!-- update baptismal entry -->

<div class="modal fade" id="modalUpdateBap" aria-hidden="true" tabindex="-1">
<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<!-- modal header -->
<div class="modal-header"> 
<h3 class="text-success ">Update Baptismal</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->


<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="update_baptist_id" id="update_baptist_id">
<div class="col-md-4 mb-3">
<label>OR Number: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
<input type="number" min="0" class="form-control" name="baptist_update_ornum" id="baptist_update_ornum" required="" pattern="^\d+(\d{1,9})?$">
</div>
</div>
<div class="col-md-4"></div>
<div class="col-md-4"></div>

<div class="col-md-4 mb-3">
<label>Reservation Date:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="date" name="baptist_update_reserve_date" id="baptist_update_reserve_date" class="form-control" required="">
</div>
</div>


<div class="col-md-4 mb-3">
<label>Reservation Time: </label>
<div class="input-group">
<span class="input-group-text"><i class="far fa-clock"></i></span>
<input type="time" class="form-control" name="baptist_update_time" id="baptist_update_time" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Fees:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" name="baptist_update_amount" id="baptist_update_amount" pattern="^\d+(\.\d{1,9})?$" title="format of 000.00 only" min="0" class="form-control" required="">
</div>
</div>

<div class="col-md-5 mb-3">
<label>Date Baptismal:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="date" name="baptist_update_date_baptize" id="baptist_update_date_baptize" class="form-control" required="">
</div>
</div>

<div class="col-md-7 mb-3">
<label>Baptismal Name:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-user"></i></span>
<input type="text" pattern="[A-Za-z ]+" name="baptist_update_name" id="baptist_update_name" title="letters only" class="form-control" required="">
</div>
</div>

<div class="col-md-3 mb-3">
<label>Gender: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
<select class="form-control" name="baptist_update_gender" id="baptist_update_gender" required="">
	<option name="baptist_update_gender" value=""></option>
	<option name="baptist_update_gender" value="Male">Male</option>
	<option name="baptist_update_gender" value="Female">Female</option>
</select>
</div>
</div>

<div class="col-md-9 mb-3">
<label>Address:</label>
<div class="input-group"> 
<span class="input-group-text"><i class="fas fa-house-user"></i></span>
<input class="form-control" name="baptist_update_add" id="baptist_update_add" pattern="[A-Za-z ]+" required="" title="letters only">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Birthday: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="date" name="baptist_update_bday" id="baptist_update_bday" class="form-control" required="">
</div>
</div>

<div class="col-md-8 mb-3">
<label>Birth Place: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-calendar"></i></span>
<input type="text" pattern="[A-Za-z ]+" name="baptist_update_birthPlace" id="baptist_update_birthPlace" class="form-control" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Father's Name: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-user"></i></span>
<input type="text" name="baptist_update_father" id="baptist_update_father" class="form-control" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Birth Place: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-house"></i></span>
<input type="text" name="baptist_update_fatherAdd" id="baptist_update_fatherAdd" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Mother's Name: </label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="baptist_update_mother" id="baptist_update_mother" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-6 mb-3">
<label>Birth Place: </label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-house"></i></span>
<input type="text" name="baptist_update_motherAdd" id="baptist_update_motherAdd" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Contact: </label>
<div class="input-group">
	<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
	<input type="number" class="number form-control" step="1" name="baptist_update_contact" id="baptist_update_contact" maxlength="11" min="0" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Marriage Type:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-ring"></i></span>
<select class="form-control" name="baptist_update_marriageType" id="baptist_update_marriageType" required="">
	<option name="baptist_update_marriageType" value=""></option>
	<option name="baptist_update_marriageType" value="Catholic Wedding">Catholic Wedding</option>
	<option name="baptist_update_marriageType" value="Other Religion">Other Religion</option>
	<option name="baptist_update_marriageType" value="Civil Wedding">Civil Wedding</option>
	<option name="baptist_update_marriageType" value="Not Married">Not Married</option>
</select>
</div>
</div>

<div class="col-md-4 mb-3">
<label>Priest:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-regular fa-user"></i></span>
<input type="text" name="baptist_update_priest" id="baptist_update_priest" class="form-control" pattern="[A-Za-z ]+" required="">
</div>
</div>

<div class="col-md-12 mt-3 text-end">
<input type="submit" name="btnUpdateBaptist" class="btn btn-outline-success">
</div>

</form>
</div>
<!--  -->

</div>	<!-- end of modal content -->
</div> <!-- end of modal dialog -->
</div> <!-- end of baptismal modal -->


<!--  -->


<!-- delete baptismal modal -->

<div class="modal fade" id="modalDelBap" aria-hidden="true" aria-labelledby="exampleToggle" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">

<div class="modal-content">
<!-- modal header -->
<div class="modal-header">
<h3 class="text-danger ">Delete Baptismal</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!-- -->

<!-- modal body -->
<div class="modal-body">
<h4>You will delete the records of <u class="text-danger"><em><span class="text-danger fw-bolder" id="delete-baptismal"></span></em></u> Baptismal?</h4>

<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="del_baptismal_id" id="del_baptismal_id">

<div class="col-md-12 text-end mt-md-0 mt-2">
<input type="submit" name="btnDelBaptismal" class="btn btn-outline-danger" id="btn-delete-event">
</div>

</form>
</div>
<!-- end of modal body -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div>


<!--  -->

<!-- ADD WEDDING START -->

<!-- modal wedding entry -->
<div class="modal fade" id="modalWeddingEntry" aria-hidden="true" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<!-- modal header -->
<div class="modal-header"> 
<h3 class="text-success ">Add Wedding</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->


<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>" enctype="multipart/form-data">

<div class="col-md-12">
	<h6>General Information</h6>
</div>
	
<div class="col-md-3 mb-3">
	<label>Ceremony Date</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-calendar-alt"></i></span>
		<input type="text" name="entry_ceremony_date" id="dtPickerWeddingDate" class="form-control" required="">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Ceremony Time</label>
	<div class="input-group">
		<span class="input-group-text"><i class="far fa-clock"></i></span>
		<input type="time" name="entry_ceremony_time"class="form-control" required="">
	</div>
</div>

<div class="col-md-3 mb-3">
	<label>Fee:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
		<input type="text" name="entry_fee" class="form-control" required="" min="0" pattern="^\d+(\.\d{1,9})?$">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Receipt</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file"></i></span>
		<input type="file" name="entry_file" class="form-control" accept="image/*" required="">
	</div>
</div>
<hr>

<div class="col-md-12">
	<h6>Bride's Information</h6>
</div>

<div class="col-md-5 mb-3">
	<label>Full Name</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa fa-user"></i></span>
		<input type="text" name="entry_bride_name" class="form-control" pattern="[A-Za-z ]+" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>Contact</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
		<input type="number" class="number form-control" step="1" name="entry_bride_contact" maxlength="11" min="0" required="">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Baptismal Certifcate</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="bBaptismal" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Cenomar</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="entry_bride_cenomar" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Birth Certifcate</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="bBirth" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Confirmation Certifcate / Kumpil</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="bConfirmation" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>2x2 ID Picture</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="b2x2" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Government ID 1</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="bGov1" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Government ID 2</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="bGov2" class="form-control" required="" accept="image/*">
	</div>
</div><hr>

<div class="col-md-12">
	<h6>Groom's Information</h6>
</div>

<div class="col-md-5 mb-3">
	<label>Full Name</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa fa-user"></i></span>
		<input type="text" name="entry_groom_name" class="form-control" pattern="[A-Za-z ]+" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>Contact</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
		<input type="number" class="number form-control" step="1" name="entry_groom_contact" maxlength="11" min="0" required="">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Baptismal Certifcate</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="gBaptismal" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Cenomar</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="entry_groom_cenomar" class="form-control" required="" accept="image/*">
	</div>
</div>


<div class="col-md-5 mb-3">
	<label>Birth Certifcate</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="gBirth" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Confirmation Certifcate / Kumpil</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="gConfirmation" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>2x2 ID Picture</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="g2x2" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Government ID 1</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="gGov1" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-5 mb-3">
	<label>Government ID 2</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="gGov2" class="form-control" required="" accept="image/*">
	</div>
</div><hr>

<div class="col-md-12">
	<h6>Marriage Documents</h6>
</div>

<div class="col-md-5 mb-3">
	<label>Marriage License</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="marriageLicense" class="form-control" required="" accept="image/*">
	</div>
</div>
<div class="col-md-5 mb-3">
	<label>Permission to Contract Matrimony</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="contractMatrimony" class="form-control" required="" accept="image/*">
	</div>
</div>

<div class="col-md-6 mb-3">
	<label class="fw-bold">Complete List of Sponsors</label>
		<div class="input-group">
		<textarea clas="form-control" name="sponsors" id="" cols="30" rows="20" placeholder="e.g. Juan A. Dela Cruz &#10;e.g. Juanna A. Dela Cruz" required></textarea>
	</div>
</div>

<hr>

<div class="col-md-12 text-end mb-3">
	<input type="submit" class="btn btn-outline-success" name="btnAddWedding">
</div>

</form>
</div>
<!--  -->

</div> <!-- end of modal content -->

<!-- ADD WEDDING END -->

</div> <!-- end of modal dialog -->
</div>
<!--  -->

<!-- modal update wedding page -->
<div class="modal fade" id="modalWeddingUpdate" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			
			<!-- modal header -->
			<div class="modal-header">
				<h3 class="text-success ">Update Wedding</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<!-- end of modal header -->

			<!-- modal body -->
			<div class="modal-body">
				
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>" enctype="multipart/form-data">
<input type="hidden" name="update_weddingId" id="update_weddingId">
<div class="col-md-12">
	<h6>General Information</h6>
</div>
	
<div class="col-md-3 mb-3">
	<label>Ceremony Date</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-calendar-alt"></i></span>
		<input type="text" name="update_ceremony_date" id="dtPickerupdateWeddingUDate" class="form-control" required="">
	</div>
</div>

<div class="col-md-3 mb-3">
	<label>Ceremony Time</label>
	<div class="input-group">
		<span class="input-group-text"><i class="far fa-clock"></i></span>
		<input type="time" name="update_ceremony_time" class="form-control" id="update_ceremony_time" required="">
	</div>
</div>

<div class="col-md-3 mb-3">
	<label>Fee:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
		<input type="text" name="update_fee" id="update_fee" class="form-control" required="" min="0" pattern="^\d+(\.\d{1,9})?$">
	</div>
</div>

<div class="col-md-3 mb-3">
	<label>Receipt</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file"></i></span>
		<input type="file" name="update_file" id="update_file" class="form-control" accept="image/*" required="">
	</div>
</div>
<hr>

<div class="col-md-12">
	<h6>Bride's Information</h6>
</div>

<div class="col-md-5 mb-3">
	<label>Full Name</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa fa-user"></i></span>
		<input type="text" name="update_bride_name" id="update_bride_name" class="form-control" pattern="[A-Za-z ]+" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>Contact</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
		<input type="number" class="number form-control" step="1" id="update_bride_contact" name="update_bride_contact" maxlength="11" min="0" required="">
	</div>
</div>

<div class="col-md-3 mb-3">
	<label>Cenomar</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="update_bride_cenomar" id="update_bride_cenomar" class="form-control" required="" accept="image/*">
	</div>
</div><hr>

<div class="col-md-12">
	<h6>Groom's Information</h6>
</div>

<div class="col-md-5 mb-3">
	<label>Full Name</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa fa-user"></i></span>
		<input type="text" name="update_groom_name" id="update_groom_name" class="form-control" pattern="[A-Za-z ]+" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>Contact</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
		<input type="number" class="number form-control" step="1" id="update_groom_contact" name="update_groom_contact" maxlength="11" min="0" required="">
	</div>
</div>

<div class="col-md-3 mb-3">
	<label>Cenomar</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="update_groom_cenomar" id="update_groom_cenomar" class="form-control" required="" accept="image/*">
	</div>
</div><hr>

<div class="col-md-12 text-end mb-3">
	<input type="submit" class="btn btn-outline-success" name="btnUpdateWedding">
</div>
</form>

			</div>
			<!-- end of modal body -->

		</div> <!-- end of modal content -->
	</div> <!--end of modal dialog -->
</div>
<!--  -->

<!--  -->
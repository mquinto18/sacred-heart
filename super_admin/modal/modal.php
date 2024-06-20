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

<!-- Donation Modal-->

<!-- add donation modal -->
<div class="modal fade" id="modalAddDonations" aria-hidden="true" tabindex="-1">

<!-- modal dialog -->
<div class="modal-dialog modal-dialog-scrollable modal-lg">

<!-- modal content -->
<div class="modal-content">

<!-- modal header -->
<div class="modal-header">
<h3 class="text-success ">Add Donation</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>	
</div> <!-- end of modal header -->

<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-5 mb-3">
<label>Donators Name:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="add_donation_name" class="form-control" pattern="[A-Za-z ]+" title="Please input letters only" required="">
</div>
</div>

<div class="col-md-3 mb-3">
<label>Amount</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" pattern="^\d+(\.\d{1,9})?$" class="form-control" title="format of 000.00 only" name="add_currency" min="0" required="">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Donated On:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-calendar"></i></span>
<input type="date" name="add_donated_on" class="form-control" required="">
</div>
</div>

<div class="col-md-12 mb-3">
<label>Description:</label>
<textarea class="form-control" name="add_description" rows="6" placeholder="OPtional"></textarea>
</div>

<div class="col-md-12 mb-3 text-end">
<input type="submit" name="btnAddDonation" class="btn btn-outline-primary" value="Add Donation">
</div>

</form>
</div> <!-- end of modal body -->

</div><!-- end of modal content -->

</div> <!-- end of modal dialog -->

</div> <!-- end of add donation modal -->


<!-- update donation modal -->
<div class="modal fade" id="modalUpdateDonate" aria-hidden="true" tabindex="-1">

<!-- modal dialog -->	
<div class="modal-dialog modal-dialog-scrollable modal-lg">

<!-- modal content -->	
<div class="modal-content">

<!-- modal header -->
<div class="modal-header">
<h3 class="text-success ">Update Donation</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>		
</div> <!-- end of modal header -->

<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="update_donate" id="update_donate">
<div class="col-md-5 mb-3">
<label>Donators Name:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="update_donation_name" class="form-control" pattern="[A-Za-z ]+" title="Please input letters only" required="" id="update_donation_name">
</div>
</div>

<div class="col-md-3 mb-3">
<label>Amount</label>
<div class="input-group">
<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" pattern="^\d+(\.\d{1,9})?$" class="form-control" title="format of 000.00 only" name="update_currency" min="0" required="" id="update_donate_amount">
</div>
</div>

<div class="col-md-4 mb-3">
<label>Donated On:</label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-calendar"></i></span>
<input type="date" id="update_donate_on" name="update_donated_on" class="form-control" required="">
</div>
</div>

<div class="col-md-12 mb-3">
<label>Description:</label>
<textarea class="form-control" id="update_donate_desc" name="update_description" rows="6" placeholder="OPtional"></textarea>
</div>

<div class="col-md-12 mb-3 text-end">
<input type="submit" name="btnUpdateDonation" class="btn btn-outline-primary" value="Update Donation">
</div>

</form>
</div> <!-- end of modal body -->

</div> <!-- end of modal content -->

</div> <!-- end of modal dialog -->

</div> <!-- end of modal update -->

<!-- delete entry level -->
<div class="modal fade" id="modalDeleteDonate" aria-hidden="true" aria-labelledby="exampleToggle" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">

<div class="modal-content">
<!-- modal header -->
<div class="modal-header">
<h3 class="text-danger ">Delete Donations</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!-- -->

<!-- modal body -->
<div class="modal-body">
<?php
$peso_sign = "\xE2\x82\xB1";
?>
<h4>You will delete the Donation amount of <u class="text-danger"><em><?= $peso_sign; ?><span class="text-danger fw-bolder" id="delete_title_donate"></span></em></u> from <u class="text-danger"><em><span id="delete_sub_donate" class="text-danger fw-bolder"></span></em></u> Records?</h4>

<form id="formUpdate" name="frmUpdate" class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="delete_id_donate" id="delete_id_donate">

<div class="col-md-12 text-end mt-md-0 mt-2">
<input type="submit" name="btnDeleteEvent" class="btn btn-outline-danger" id="btn-delete-donate">
</div>

</form>
</div>
<!-- end of modal body -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div>

<!-- end of delete entry level -->

<!-- -->


<!-- modal add church expenses -->
<div class="modal fade" id="modaladdchurchExpenses" aria-hidden="true" tabindex="-1">

<!-- modal dialog -->	
<div class="modal-dialog modal-dialog-scrollable modal-lg">

<!-- modal content -->	
<div class="modal-content">

<!-- modal header -->
<div class="modal-header">
<h3 class="text-success ">Add Church Expenses</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>		
</div> <!-- end of modal header -->

<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-4 mb-3">
	<label>Date:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fas fa-calendar"></i></span>
	<input type="date" name="church_add_date" class="form-control" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>Expenses:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" pattern="^\d+(\.\d{1,9})?$" class="form-control" title="format of 000.00 only" name="church_add_currency" min="0" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>TIN #:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
		<input type="number" min="0" name="church_add_tin" class="form-control" pattern="^\d+(\d{1,9})?$" required="">
	</div>
</div>

<div class="col-md-12 mb-3">
	<label>Description</label>
	<textarea class="form-control" name="church_add_desc" rows="6" placeholder="Optional"></textarea>
</div>

<div class="col-md-12 text-end">
	<input type="submit" name="btnChurchAddExpense" class="btn btn-outline-primary">
</div>

</form>
</div> <!-- end of modal body -->

</div> <!-- end of modal content -->

</div> <!-- end of modal dialog -->

</div> <!-- end of modal -->
<!-- -->


<!-- update church modal -->
<div class="modal fade" id="modalUpdateChurch" aria-hidden="true" tabindex="-1">

<!-- modal dialog -->	
<div class="modal-dialog modal-dialog-scrollable modal-lg">

<!-- modal content -->	
<div class="modal-content">

<!-- modal header -->
<div class="modal-header">
<h3 class="text-success ">Add Church Expenses</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>		
</div> <!-- end of modal header -->

<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="church_edit" id="church_edit">
<div class="col-md-4 mb-3">
	<label>Date:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fas fa-calendar"></i></span>
	<input type="date" name="church_update_date" id="church_update_date" class="form-control" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>Expenses:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-peso-sign"></i></span>
<input type="text" id="church_update_expense" pattern="^\d+(\.\d{1,9})?$" class="form-control" title="format of 000.00 only" name="church_update_expense" min="0" required="">
	</div>
</div>

<div class="col-md-4 mb-3">
	<label>TIN #:</label>
	<div class="input-group">
		<span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
		<input type="number" min="0" id="church_update_tin" name="church_update_tin" class="form-control" pattern="^\d+(\d{1,9})?$" required="">
	</div>
</div>

<div class="col-md-12 mb-3">
	<label>Description</label>
	<textarea class="form-control" id="church_update_desc" name="church_update_desc" rows="6" placeholder="Optional"></textarea>
</div>

<div class="col-md-12 text-end">
	<input type="submit" name="btnUpdateChurch" class="btn btn-outline-primary">
</div>

</form>
</div> <!-- end of modal body -->

</div> <!-- end of modal content -->

</div> <!-- end of modal dialog -->

</div> <!-- end of modal -->


<!--  -->

<!-- modal delete church expenses -->
<div class="modal fade" id="modalDeleteChurchExp" aria-hidden="true" aria-labelledby="exampleToggle" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">

<div class="modal-content">
<!-- modal header -->
<div class="modal-header">
<h3 class="text-danger ">Delete Church Expenses</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!-- -->

<!-- modal body -->
<div class="modal-body">
<h4>You will delete the church expenses TIN # of <u class="text-danger"><em><span class="text-danger fw-bolder" id="delete-church-expenses"></span></em></u> Records?</h4>

<form id="formUpdate" name="frmUpdate" class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<input type="hidden" name="delete_id_church_exp" id="delete_id_church_exp">

<div class="col-md-12 text-end mt-md-0 mt-2">
<input type="submit" name="btnDeleteChurchExp" class="btn btn-outline-danger" id="btn-delete-event">
</div>

</form>
</div>
<!-- end of modal body -->

</div> <!-- end of modal content -->
</div> <!-- end of modal dialog -->

</div>

<!--  -->


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
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
	<div class="modal-content">

	<!-- modal header -->
<div class="modal-header"> 
	<h3 class="text-success ">Add Baptismal</h3>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<!--  -->


<!-- modal body -->
<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

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
		<input type="date" name="baptist_entry_reserve_date" class="form-control" required="">
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

<div class="col-md-12 mt-3 text-end">
	<input type="submit" name="btnBaptisEntry" class="btn btn-outline-success">
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



<!-- modal add mass intention -->
<div class="modal fade" id="modalMassIntention" aria-hidden="true" tabindex="-1">
	
<div class="modal-dialog modal-dialog-scrollable modal-lg">
	<!-- modal content -->
	<div class="modal-content">
		
	<!-- modal header -->
		<div class="modal-header">
			<h3 class="text-success ">Add Mass Intention</h3>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
	<!-- -->

	<!-- modal body -->
	<div class="modal-body">
		<form class="row needs-validation" method="POST" novalidate="" action="<?php htmlspecialchars("PHP_SELF"); ?>">
			
		<div class="col-md-4 mb-3">
			<label>Transaction Date</label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-calendar"></i></span>
				<input type="date" class="form-control" name="entry_transact_date" required="">
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<label>Request</label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				<select class="form-control" id="entryMassIntentChangeTrigger" name="entry_intentRequest" required="">
					<option name="entry_intentRequest" value=""></option>
					<option name="entry_intentRequest" value="Thanksgiving">Thanksgiving</option>
					<option name="entry_intentRequest" value="Special intentions">Special Intentions</option>
					<option name="entry_intentRequest" value="For the dead">For the dead</option>
					<option name="entry_intentRequest" value="Others">Others</option>
				</select>
			</div>
		</div>

		<div class="col-md-4 mb-3" id="entryMassIntentChange" style="display: none;">
			<label>Specify: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-file"></i></span>
				<input type="text" name="entry_others" class="form-control">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Date: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
				<input type="date" name="entry_mass_date" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Time: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
				<input type="time" name="entry_mass_time" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Person to be prayed for: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				<input type="text" name="entry_person_prayed" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Person making offering: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				<input type="text" name="entry_person_making" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-12 text-end">
			<input type="submit" name="btnAddMassIntent" class="btn btn-outline-success">
		</div>

		</form>
	</div>
	<!---->

	</div>
	<!-- modal content -->
</div> <!-- end of modal dialog -->

</div>
<!-- -->


<!-- update mass intention modal -->
<div class="modal fade" id="modalUpdateMassIntent" aria-hidden="true" tabindex="-1">
	
<div class="modal-dialog modal-dialog-scrollable modal-lg">
	<!-- modal content -->
	<div class="modal-content">
		
	<!-- modal header -->
		<div class="modal-header">
			<h3 class="text-success ">Update Mass Intention</h3>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
	<!-- -->

	<!-- modal body -->
	<div class="modal-body">
		<form class="row needs-validation" method="POST" novalidate="" action="<?php htmlspecialchars("PHP_SELF"); ?>">
			<input type="hidden" name="editMassIntentId" id="editMassIntentId">
		<div class="col-md-4 mb-3">
			<label>Transaction Date</label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-calendar"></i></span>
				<input type="date" class="form-control" id="update_transact_date" name="update_transact_date" required="">
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<label>Request</label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				<select class="form-control" id="updateMassIntentChangeTrigger" name="update_intentRequest" required="">
					<option name="update_intentRequest" value=""></option>
					<option name="update_intentRequest" value="Thanksgiving">Thanksgiving</option>
					<option name="update_intentRequest" value="Special intentions">Special Intentions</option>
					<option name="update_intentRequest" value="For the dead">For the dead</option>
					<option name="update_intentRequest" value="Others">Others</option>
				</select>
			</div>
		</div>

		<div class="col-md-4 mb-3" id="updateMassIntentChange" style="display: none;">
			<label>Specify: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-file"></i></span>
				<input type="text" name="update_others" id="update_others" class="form-control">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Date: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
				<input type="date" name="update_mass_date" id="update_mass_date" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Time: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
				<input type="time" name="update_mass_time" id="update_mass_time" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Person to be prayed for: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				<input type="text" name="update_person_prayed" id="update_person_prayed" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-6 mb-3">
			<label>Person making offering: </label>
			<div class="input-group">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
				<input type="text" name="update_person_making" id="update_person_making" class="form-control" required="">
			</div>
		</div>

		<div class="col-md-12 text-end">
			<input type="submit" name="btnUpdateMassIntent" class="btn btn-outline-success">
		</div>

		</form>
	</div>
	<!---->

	</div>
	<!-- modal content -->
</div> <!-- end of modal dialog -->

</div>

<!--  -->

<!-- modal delete for mass intention -->
<div class="modal fade" id="modalDeleteMassIntent" aria-hidden="true" tabindex="-1">
	
<!-- modal dialog -->
<div class="modal-dialog modal-dialog-scrollable modal-lg">
	
<!-- modal content -->
<div class="modal-content">
	
	<div class="modal-header">
		<h3 class="text-danger ">Delete Mass Intention</h3>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>

	<div class="modal-body">
		<h4 class="text-danger">You will delete the <u><em><span id="del_mass_intent_title" class="text-danger"></span></em></u> Records?</h4>
		<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
			<input type="hidden" name="del_massIntentId" id="del_massIntentId">
			<div class="col-md-12 text-end mt-md-0 mt-2">
				<input type="submit" name="btnDeleteMassIntent" class="btn btn-outline-danger">
			</div>
		</form>
	</div>

</div>
<!---->

</div>
<!-- -->

</div>
<!--  -->



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

<div class="col-md-3 mb-3">
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

<div class="col-md-3 mb-3">
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

<div class="col-md-3 mb-3">
	<label>Cenomar</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="entry_bride_cenomar" class="form-control" required="" accept="image/*">
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

<div class="col-md-3 mb-3">
	<label>Cenomar</label>
		<div class="input-group">
		<span class="input-group-text"><i class="fa fa-file-alt"></i></span>
		<input type="file" name="entry_groom_cenomar" class="form-control" required="" accept="image/*">
	</div>
</div><hr>

<div class="col-md-12 text-end mb-3">
	<input type="submit" class="btn btn-outline-success" name="btnAddWedding">
</div>

</form>
</div>
<!--  -->

</div> <!-- end of modal content -->
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

<!-- modal delete wedding  -->
<div class="modal fade" id="modalWeddingDelete" aria-hidden="true" tabindex="-1">

<!-- Modal dialog -->
<div class="modal-dialog modal-dialog-scrollable modal-lg">
	
<!-- Modal Content -->
<div class="modal-content">
	
	<!-- modal header -->
	<div class="modal-header">
		<h3 class="text-danger">Delete Wedding Page</h3>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<!-- end of modal header -->

	<div class="modal-body">
		<h4>You will delete the wedding records of <u class="text-danger"><em><span id="bride-fullname"></span></em></u> and <u class="text-danger"><em><span id="groom-fullname"></span></em></u>?</h4>
		
		<form class="row" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
			<input type="hidden" name="del_weddingId" id="del_weddingId">

			<div class="col-md-12 text-end">
				<input type="submit" name="btnDelWed" class="btn btn-outline-danger">
			</div>
		
		</form>
	</div>

</div>
<!-- end of modal content -->
</div>
<!-- end of modal dialog -->

</div><!-- end of modal delete wedding -->

<!--  -->

<!-- add cert modal -->

<div class="modal fade" id="modalcert" aria-hidden="true" tabindex="-1">

<!-- Modal dialog -->
<div class="modal-dialog modal-dialog-scrollable modal-lg">
	
<!-- Modal Content -->
<div class="modal-content">
	
	<!-- modal header -->
	<div class="modal-header">
		<h3 class="text-danger ">Add Certificate</h3>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<!-- end of modal header -->

	<div class="modal-body">
		<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
		
		<div class="col-md-4 mb-3">
			 <label>Full Name</label>
			 <div class="input-group">
			 	<span class="input-group-text"><i class="fa fa-user"></i></span>
			 	<input type="text" name="entry_cert_name" class="form-control" required="">
			 </div>
		</div>

		<div class="col-md-4 mb-3">
			 <label>Date</label>
			 <div class="input-group">
			 	<span class="input-group-text"><i class="fa fa-user"></i></span>
			 	<input type="date" name="entry_cert_date" class="form-control" required="">
			 </div>
		</div>

		<div class="col-md-4 mb-3">
			 <label>Title</label>
			 <div class="input-group">
			 	<span class="input-group-text"><i class="fa fa-user"></i></span>
			 	<input type="text" name="entry_cert_title" class="form-control" required="">
			 </div>
		</div>

		<div class="col-md-12 mb-3">
			<label>Sub Title</label>
			<div class="input-group">
				<span class="input-group-text"><i class="fa fa-heading"></i></span>
				<input type="text" name="entry_cert_subTitle" class="form-control" placeholder="Optional">
			</div>
		</div>

		<div class="col-md-12 mb-3">
			<label>Description</label>
			<textarea class="form-control" name="entry_cert_desc" placeholder="optional"></textarea>
		</div>

		<div class="col-md-12 mb-3">
			<label>Sub Description</label>
			<textarea class="form-control" name="entry_cert_subDesc"></textarea>
		</div>

		<div class="col-md-12">
			<input type="submit" class="btn btn-outline-primary" name="btnCert">
		</div>

		</form>
	</div>

</div>
<!-- end of modal content -->
</div>
<!-- end of modal dialog -->

</div><!-- end of modal delete wedding -->

<!--  -->
<!--  -->
<div class="modal fade" id="modalUpdate" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Reset Password</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<input type="hidden" name="user_id" id="user_id">

<div class="col-md-6 mb-3 mb-md-0">
<label>Username:</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" readonly="" class="form-control" id="username">
</div>
</div>

<div class="col-md-6">
<label>Update Password</label>
<div class="input-group">
<span class="input-group-text"><i class="fa fa-lock"></i></span>
<input type="password" class="form-control togglePassword" name="update_password" id="password" required="">
<span class="input-group-text toggleIcon">
<i class="fa fa-eye-slash d-none hide_eyes"></i>
<i class="fa fa-eye show_eyes"></i>
</span>
</div>
</div>

<div class="col-md-d text-end mt-3">
<input type="submit" name="btnUpdatePassword" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>


<!-- update Username information -->
<div class="modal fade" id="modalUpdateUser" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Update Username</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<input type="hidden" name="user_name" id="user_name">

<div class="col-md-12 mb-3 mb-md-0">
<label>Username:</label>
<div class="input-group">
	<span class="input-group-text"><i class="fas fa-user"></i></span>
	<input type="text" name="username" class="form-control" id="user_update">
</div>
</div>

<div class="col-md-d text-end mt-3">
	<input type="submit" name="btnUpdateUser" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>


<!-- delete Username information -->
<div class="modal fade" id="modalDeleteUser" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Delete Username</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-12">
	<h5 class="text-danger">You're going to delete the user details of <span class="fw-bolder" id="user_name_info"></span>? once deleted you cannot be undone it</h5>
</div>

<div class="col-md-d text-end mt-3">
	<input type="hidden" name="user_delete" id="user_delete">
	<input type="submit" name="btnDeleteUser" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>

<!-- modal donate Archive Delete Restore -->
<div class="modal fade" id="modaldeleterestore" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Restore Information</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<div class="col-md-12">
	<h5 class="text-danger">You're going to Restore the details of <span class="fw-bolder" id="donate_archive"></span></h5>
</div>

<div class="col-md-d text-end mt-3">
	<input type="hidden" name="donaterestoredelete" id="donaterestoredelete">
	<input type="submit" name="btnDonateRestore" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>

<!-- modal church expenses archive delete restore -->
<div class="modal fade" id="modalChurchDelRestore" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Restore Information</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<div class="col-md-12">
	<h5 class="text-danger">You're going to Restore the details of <span class="fw-bolder" id="church_modal_expense"></span></h5>
</div>

<form class="row needs-validation" novalidate="" method="POST">
<div class="col-md-12 text-end mt-3">
	<input type="hidden" name="church_exp_restore" id="church_exp_restore">
	<input type="submit" name="btnChurchArchRestore" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>

<!--  -->

<!-- modal baptismal expenses archive delete restore -->
<div class="modal fade" id="modalBaptistRestore" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Restore Information</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<div class="col-md-12">
	<h5 class="text-danger">You're going to Restore the details of <span class="fw-bolder" id="baptist_modal_arch"></span></h5>
</div>

<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<div class="col-md-12 text-end mt-3">
	<input type="hidden" name="editBaptistArch_data" id="editBaptistArch_data">
	<input type="submit" name="btnBaptisRestore" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>

<!--  -->

<!-- modal event archive delete restore -->
<div class="modal fade" id="modalEventArchive" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Restore Information</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<div class="col-md-12">
	<h5 class="text-danger">You're going to Restore the details of <span class="fw-bolder" id="event_modal_arch"></span></h5>
</div>

<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<div class="col-md-12 text-end mt-3">
	<input type="hidden" name="eventArchiveId" id="eventArchiveId">
	<input type="submit" name="btnEventArchiveRestore" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>

<!--  -->



<!-- modal request Certificate archive -->

<div class="modal fade" id="modalCertReqArch" aria-hidden="true" aria-labelledby="exampleModalToggleLable" tabindex="-1">

<div class="modal-dialog modal-dialog-scrollable modal-lg">
<div class="modal-content">

<div class="modal-header">
<h3 class="text-success">Restore Information</h3>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
<div class="col-md-12">
	<h5 class="text-danger">You're going to Restore the details of <span class="fw-bolder" id="reqCertArchive"></span></h5>
</div>

<form class="row needs-validation" novalidate="" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
<div class="col-md-12 text-end mt-3">
	<input type="hidden" name="reqCertArchiveId" id="reqCertArchiveId">
	<input type="submit" name="btnCertReqRestore" class="btn btn-outline-primary">
</div>
</form>
</div>
</div>	
</div>
</div>


<!--  -->
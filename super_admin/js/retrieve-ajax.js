// retrieve Password
$(document).on("click", ".edit-data", function(e){
	e.preventDefault();
	let id = $(this).attr("id");
	
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			user_id: id
		},
		dataType: "json",
		success: function(data){
			$("#user_id").val(data.user_id);
			$("#username").val(data.username);
			$("#btnUpdate").val("Reset Password");
		}
	});
});

// delete and restore the donate archive
$(document).on("click", ".delete_donate_archive", function(e){
e.preventDefault();
let delete_donate_archive = $(this).attr("id");
$.ajax({
	url: "../inc/functions.php",
	method: "POST",
	data:{
		donate_archive: delete_donate_archive
	},
	dataType: "json",
	success: function(data){
		$("#donaterestoredelete").val(data.donate_archive_id);
		$("#donate_archive").html(data.donate_archive_name);
	}
});
});


// retrieve user for update
$(document).on("click", ".editUser", function(e){
	e.preventDefault();
	let editUser = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			user_name: editUser
		},
		dataType: "json",
		success: function(data){
			$("#user_name").val(data.user_id);
			$("#user_update").val(data.username);
		}
	});
});

// retrieve user for deletion
$(document).on("click", ".deleteUser", function(e){
	e.preventDefault();
	let deleteUser = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			user_delete: deleteUser
		},
		dataType: "json",
		success: function(data){
			$("#user_delete").val(data.user_id);
			$("#user_name_info").html(data.full_name); //<-callback or access the full_name property in php
		}
	});
});

// retrieve ajax church archive restore
$(document).on("click", ".delChurchExpArch", function(e){
	e.preventDefault();
	let delChurchExpArch = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			church_exp_restore: delChurchExpArch
		},
		dataType: "json",
		success: function(data){
			$("#church_modal_expense").html(data.tin_arch);
			$("#church_exp_restore").val(data.expenses_id_arch);
		}
	});
});

// retrieve baptismal archive
$(document).on("click", ".editBaptistArch-data", function(e){
	e.preventDefault();
	let editBaptistArch_data = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			editBaptistArch_data: editBaptistArch_data
		},
		dataType: "json",
		success: function(data){
			$("#editBaptistArch_data").val(data.baptismal_id_arch);
			$("#baptist_modal_arch").html(data.baptismal_name_arch);
		}
	});
});

// retrieve event archive
$(document).on("click", ".eventArchData", function(e){
	e.preventDefault();
	let eventArchData = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			eventArchiveId: eventArchData
		},
		dataType: "json",
		success: function(data){
			$("#eventArchiveId").val(data.event_archive_id);
			$("#event_modal_arch").html(data.event_archive_title);
		}
	});
});

// retrieve certificate archive
$(document).on("click", ".ret_cert_req_arch", function(e){
	e.preventDefault();
	let ret_cert_req_arch = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			reqCertArchiveId: ret_cert_req_arch
		},
		dataType: "json",
		success: function(data){
			$("#reqCertArchiveId").val(data.cert_req_id_archive);
			$("#reqCertArchive").html(data.person_name_archive);
		}
	});
});
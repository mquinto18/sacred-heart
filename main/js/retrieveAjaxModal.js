// event update retrieve
$(document).on("click", ".editEvent-data", function(e){
e.preventDefault();
let id = $(this).attr("id");
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
update_id: id
},
dataType: "json",
success: function(data){
$("#update-event-desc").val(data.event_description);
$("#update_remarks").val(data.remarks_event);
$("#update_id").val(data.event_id);
$("#update-event-title").val(data.event_title);
$("#update-event-user").val(data.event_name);
$("#update-start-date-event").val(data.event_start_time);
$("#update-end-date-event").val(data.date_entry);
$("#update_remarks").val(data.remarks_event);
}
});
});
// 

// event delete retrieve
$(document).on("click", ".deleteEvent-data", function(e){
e.preventDefault();
let del_event_id = $(this).attr("id");
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
delete_id_event: del_event_id
},
dataType: "json",
success: function(data){
$("#delete_id_event").val(data.event_id);
$("#delete-title-event").html(data.event_title);
$("#delete-sub-event").html(data.event_name);
}
});
});
// 

// ajax event filtering
$(document).ready(function(){
$("#getEvents").keyup(function(){
let getEvents = $(this).val();
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
eventSearch: getEvents
},
success: function(response){
$("#showEventData").html(response);
}
});
});
});

$(document).ready(function(){
$(".getEventClass").keyup(function(){
let changeEvent = $(this).val();

changeEvent == "" ? window.location.reload() : null;

});
});
// 

// ajax retrieve update donation
$(document).on("click", ".editDonate-data",  function(e){
e.preventDefault();
let update_donate = $(this).attr("id");
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
update_donate: update_donate
},
dataType: "json",
success: function(data){
$("#update_donate").val(data.donate_id);
$("#update_donation_name").val(data.donate_name);
$("#update_donate_amount").val(data.donate_amount);
$("#update_donate_on").val(data.donate_on);
$("#update_donate_desc").val(data.donate_description);
}
});
});
// 

// ajax delete retrieve donation
$(document).on("click", ".deleteDonate-data", function(e){
e.preventDefault();
let delete_donate = $(this).attr("id");
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
delete_id_donate: delete_donate
},
dataType: "json",
success: function(data){
$("#delete_id_donate").val(data.donate_id);
$("#delete_title_donate").html(data.donate_amount);
$("#delete_sub_donate").html(data.donate_name);
}
});
});

// ajax donation filter
$(document).ready(function(){
$("#getDonations").keyup(function(){
let getDonations = $(this).val();
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
searchDonations: getDonations
},
success: function(response){
$("#showDonationsData").html(response);
}
});
});
});


$(document).ready(function(){
$(".getDonationClass").keyup(function(){
let changeDonation = $(this).val();
changeDonation == "" ? window.location.reload() : null;
});
});
// 

// Event JS
$(document).ready(function(){
$("#testchange").change(function(){
let testchange = $("#testchange").val();
if (testchange == "Online Registration") {
$("#test").show();
$("#file").attr("required", "required");
}else{
$("#test").hide();
$("#file").removeAttr("required");
}
});
});

$(document).ready(function(){
$("#updatetestchange").change(function(){
let updatetestchange = $("#updatetestchange").val();
if (updatetestchange == "Online Registration") {
$("#updateTest").show();
$("#update_file").attr("required", "required");
}else{
$("#updateTest").hide();
$("#update_file").removeAttr("required");
}
});
});


// for donation date filtering
$(document).ready(function(){
// for ajax filter
$("#donate_filter").click(function(){
	let from_date = $("#donate_from_date").val();
	let to_date = $("#donate_to_date").val();

	// conditon
	if (from_date != '' && to_date != '') {
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data: {
				from_donate_date:from_date, to_donate_date:to_date
			},
		success: function(data){
			$("#showDonationsData").html(data);
		}
		});
	}else{
	Swal.fire({
	 title: 'Error',
		text: 'Select Between two Dates',
		icon: 'error',
		allowOutsideClick: false,
		showConfirmButton: false,
		allowEscapeKey: false,
		footer: '<a id="swal-success" type="button" class="btn btn-success" href="donations">Confirm</a>'
		});
	}
});
});

// church expenses ajax retrieve
$(document).on("click", ".editChurch-data", function(e){
e.preventDefault();
let editChurch = $(this).attr("id");
$.ajax({
	url: "../inc/functions.php",
	method: "POST",
	data:{
		church_edit: editChurch
	},
	dataType: "json",
	success: function(data){
		$("#church_edit").val(data.expenses_id);
		$("#church_update_date").val(data.date_receipt);
		$("#church_update_expense").val(data.expenses);
		$("#church_update_tin").val(data.tin);
		$("#church_update_desc").val(data.description);
	}
});
});

// church expenses ajax delete
$(document).on("click", ".deleteChurch-data", function(e){
e.preventDefault();
let deleteChurch_data = $(this).attr("id");
$.ajax({
	url: "../inc/functions.php",
	method: "POST",
	data:{
		delete_id_church_exp: deleteChurch_data
	},
	dataType: "json",
	success: function(data){
		$("#delete_id_church_exp").val(data.expenses_id);
		$("#delete-church-expenses").html(data.tin);
	}
});
});

// church expenses live search
$(document).ready(function(){
	$("#seachChurchExp").keyup(function(){
		let searchChurch = $(this).val();
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				churchExpSearch: searchChurch
			},
			success: function(response){
				$("#showChurchExpensesData").html(response);
			}
		});
	});
});


$(document).ready(function(){
$(".seachChurchExp").keyup(function(){
	let changeChurch = $(this).val();
	changeChurch == "" ? window.location.reload() : null;
 });
});


// church expenses date filtering
$(document).ready(function(){
	$("#churchexp_filter").click(function(){
		let from_date = $("#churchexp_from_date").val();
		let to_date = $("#churchexp_to_date").val();

		if (from_date != "" && to_date != "") {
			$.ajax({
				url: "../inc/functions.php",
				method: "POST",
				data:{
					from_churchExp_date: from_date, to_churchExp_date: to_date
				},
				success: function(data){
					$("#showChurchExpensesData").html(data);
				}
			});
		}else{
			Swal.fire({
	 title: 'Error',
		text: 'Select Between two Dates',
		icon: 'error',
		allowOutsideClick: false,
		showConfirmButton: false,
		allowEscapeKey: false,
		footer: '<a id="swal-success" type="button" class="btn btn-success" href="church-expenses">Confirm</a>'
		});
		}
	});
});

// super admin page
$(document).ready(function(){
	$("#sdonate_filter").click(function(){
		let from_date = $("#sdonate_from_date").val();
		let to_date = $("#sdonate_to_date").val();

		if (from_date != "" && to_date != "") {
 	
		}else{
			Swal.fire({
	 title: 'Error',
		text: 'Select Between two Dates',
		icon: 'error',
		allowOutsideClick: false,
		showConfirmButton: false,
		allowEscapeKey: false,
		footer: '<a id="swal-success" type="button" class="btn btn-success" href="donation">Confirm</a>'
		});
		}
	});	
});


// certification page
$(document).ready(function(){
	$("#purpose").change(function(){
		let purpose = $(this).val();

		if (purpose == "Others") {
			$("#cert_others").show();
			$("#cert_others input").attr("required", "required");
		}else{
			$("#cert_others").hide()
			$("#cert_others input").removeAttr("required");
		}

	});
});


// datepicker
$(document).ready(function(){
	$("#yrConfirmed").datepicker({
		dateFormat: "yy",
		changeYear: true,
		yearRange: "2000:c" // the start year to current year
	// 	//year range if want to add plus 10years in current year 1900AD to 2013 + 10 years(1900:c+10)
	});
});

// =============================



// certifcate request update ajax retrieve

$(document).on("click", ".editCertReq-data", function(e){
	e.preventDefault();
	let cert_id = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			cert_req_update_id: cert_id
		},
		dataType: "json",
		success: function(data){
			$("#cert_req_update_id").val(data.cert_req_id);
			$("#cert_update_req_type").val(data.request_type);
			$("#cert_update_date").val(data.date_request);
			$("#cert_update_name").val(data.person_name);
			$("#cert_update_bday").val(data.date_of_birth);
			$("#cert_update_req_type").val(data.request_type);
			$("#cert_update_yr_confirmed").val(data.year_confirmed);
			$("#cert_update_yr_baptized").val(data.year_baptized);
			$("#cert_update_papa_name").val(data.father_name);
			$("#cert_update_mama_name").val(data.mother_name);
			$("#cert_update_requisitor").val(data.requesting_person_name);
			$(".cert_update_purpose").val(data.certificate_purpose);
			$("#cert_update_others").val(data.cert_others);
			$("#cert_update_requisitor_add").val(data.requesting_person_add);
			$("#cert_update_relationship").val(data.relationship);
			$("#cert_update_contact").val(data.contact);
			$("#cert_update_amount").val(data.cert_amount);
		}
	});
});

// ================================

// certificate delete ajax retrieve
$(document).on("click", ".deleteCertReq-data", function(e){
	let del_id = $(this).attr("id");

	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			del_cert_req_id: del_id
		},
		dataType: "json",
		success: function(data){
			$("#del_cert_req_id").val(data.cert_req_id);
			$("#delete_cert_req").html(data.person_name);
			$("#delete-cert-request").html(data.request_type);
		}
	});
});

//===========================

// certificate request live search 
$(document).ready(function(){
	$("#searchCertRequest").keyup(function(){
		let searchCertRequest = $(this).val();
		
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				filterCert: searchCertRequest
			},
			success: function(response){
				$("#showCertReqdata").html(response);
			}
		});
	});
});

// certificate reset
$(document).ready(function(){
	$(".searchCertRequest").keyup(function(){
		let reset = $(this).val();
		reset == "" ? window.location.reload() : null;
	});
});

// date certificate filter
$(document).ready(function(){
	$("#certReq_filter").click(function(){
		let from_date = $("#cert_req_from_date").val();
		let to_date = $("#cert_req_to_date").val();

		if (from_date != "" && to_date != "") {
			$.ajax({
				url: "../inc/functions.php",
				method: "POST",
				data:{
					from_cert_date: from_date, to_cert_date: to_date
				},
				success: function(data){
					$("#showCertReqdata").html(data);
				}
			});
		}else{
				Swal.fire({
	 title: 'Error',
		text: 'Select Between two Dates',
		icon: 'error',
		allowOutsideClick: false,
		showConfirmButton: false,
		allowEscapeKey: false,
		footer: '<a id="swal-success" type="button" class="btn btn-success" href="certification-request">Confirm</a>'
		});
		}
	});
});


// super admin page certificate request
$(document).ready(function(){
	$("#strack_certReq").keyup(function(){
		let strack_certReq = $(this).val();
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				sFilterCert: strack_certReq
			},
			success: function(response){
				$("#super_showCertReqData").html(response);
			}
		});
	});
});

	$(document).ready(function(){
		$("#strack_certReqClass").keyup(function(){
			let strack_certReqClass = $(this).val();

			strack_certReqClass == "" ? window.location.reload() : null;
		});
	});

$(document).on("click", ".editBaptist-data", function(e){
	e.preventDefault();
	let update_baptist_id = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			update_baptist_id: update_baptist_id
		},
		dataType: "json",
		success: function(data){
			$("#update_baptist_id").val(data.baptismal_id);
			$("#baptist_update_ornum").val(data.or_number);	
			$("#baptist_update_reserve_date").val(data.reservation_date);
			$("#baptist_update_time").val(data.time_reservation);
			$("#baptist_update_amount").val(data.fee);
			$("#baptist_update_date_baptize").val(data.baptismal_date);
			$("#baptist_update_name").val(data.baptismal_name);
			$("#baptist_update_gender").val(data.gender);
			$("#baptist_update_add").val(data.baptismal_address);
			$("#baptist_update_bday").val(data.date_of_birth);
			$("#baptist_update_birthPlace").val(data.birth_place);
			$("#baptist_update_father").val(data.father_name);
			$("#baptist_update_fatherAdd").val(data.father_birth_place);
			$("#baptist_update_mother").val(data.mother_name);
			$("#baptist_update_motherAdd").val(data.mother_birth_place);
			$("#baptist_update_contact").val(data.contact);
			$("#baptist_update_marriageType").val(data.type_of_marriage);
			$("#baptist_update_priest").val(data.priest);
		}
	});
});


// delete baptismal ajax retrieve
$(document).on("click", ".deleteBaptist-data", function(e){
	e.preventDefault();
	let del_baptismal_id = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			del_baptismal_id: del_baptismal_id
		},
		dataType: "json",
		success: function(data){
			$("#del_baptismal_id").val(data.baptismal_id);
			$("#delete-baptismal").html(data.baptismal_name);
		}
	}); 
});

	$(document).ready(function(){
		$(".searchBaptist").keyup(function(){
			let searchBaptist = $(this).val();

			searchBaptist == "" ? window.location.reload() : null;
		});
	});

// baptismal filtering
$(document).ready(function(){
	$("#searchBaptist").keyup(function(){
	let searchBaptist = $(this).val();
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			searchBaptist: searchBaptist
		},
		success: function(response){
			$("#showBaptistData").html(response);
		}
	});
});
});

// baptismal date filtering
$(document).ready(function(){
	$("#baptist_filter").click(function(){

		let from_date = $("#baptist_from_date").val();
		let to_date = $("#baptist_to_date").val();

		if (from_date != "" && to_date != "") {
			$.ajax({
				url: "../inc/functions.php",
				method: "POST",
				data:{
					from_baptist_date: from_date, to_baptist_date: to_date
				},
				success: function(data){
					$("#showBaptistData").html(data);
				}
			});
		}else{
			Swal.fire({
	 title: 'Error',
		text: 'Select Between two Dates',
		icon: 'error',
		allowOutsideClick: false,
		showConfirmButton: false,
		allowEscapeKey: false,
		footer: '<a id="swal-success" type="button" class="btn btn-success" href="donations">Confirm</a>'
		});
		}

	});
});


// date picker of update event
$(document).ready(function(){
	$("#update-end-date-event").datepicker({
		dateFormat: "yy-mm-dd",
		// change year and month
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:c" // 1900AD to 2013 + 10 years(1900:c+10)
	});
});

// date picker of insert event
	$(document).ready(function(){
	$("#end_date").datepicker({
		dateFormat: "yy-mm-dd",
		// change year and month
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:c" // 1900AD to 2013 + 10 years(1900:c+10)
	});
});

// date picker event page insert
	$(document).ready(function(){
	$("#event-insert").datepicker({
		dateFormat: "yy-mm-dd",
		// change year and month
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:c" // 1900AD to 2013 + 10 years(1900:c+10)
	});
});

// mass intention reset
$(document).ready(function(){
	$(".getMassClass").keyup(function(){
		let getMassClass = $(this).val();

		getMassClass == "" ? window.location.reload() : null;
	});
});

// mass intention event JS
$(document).ready(function(){
	$("#entryMassIntentChangeTrigger").change(function(){
		let btnTrigger = $(this).val();
		if (btnTrigger == "Others") {
			$("#entryMassIntentChange").show();
			$("#entryMassIntentChange input").attr("required", "required");
		}else{
			$("#entryMassIntentChange input").removeAttr("required");
			$("#entryMassIntentChange").hide();
		}
	});
});

// update mass intent event
// mass intention event JS
$(document).ready(function(){
	$("#updateMassIntentChangeTrigger").change(function(){
		let btnTrigger = $(this).val();
		if (btnTrigger == "Others") {
			$("#updateMassIntentChange").show();
			$("#updateMassIntentChange input").attr("required", "required");
		}else{
			$("#updateMassIntentChange input").removeAttr("required");
			$("#updateMassIntentChange").hide();
		}
	});
});


// mass update retrieve ajax
$(document).on("click", ".editMassIntent-data", function(e){
	e.preventDefault();
	let editMassIntent = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			editMassIntentId: editMassIntent
		},
		dataType: "json",
		success: function(data){
			$("#editMassIntentId").val(data.mass_id);
			$("#update_transact_date").val(data.transacts_date);
			$("#updateMassIntentChangeTrigger").val(data.mass_intention_request);
			$("#update_others").val(data.specify);
			$("#update_mass_date").val(data.mass_date);
			$("#update_mass_time").val(data.mass_time);
			$("#update_person_prayed").val(data.person_to_prayed_for);
			$("#update_person_making").val(data.person_making_offering);
		}
	});
});

// mass intention delete ajax
$(document).on("click", ".deleteMassIntent-data", function(e){
	e.preventDefault();
	let deleteMassIntent = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			del_massIntentId: deleteMassIntent
		},
		dataType: "json",
		success: function(data){
			$("#del_mass_intent_title").html(data.mass_intention_request);
			$("#del_massIntentId").val(data.mass_id);
		}
	});
});

// ajax mass intention filtering
$(document).ready(function(){
	$("#getMass").keyup(function(){
		let getMass = $(this).val();
		$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			massIntentSearch: getMass
		},
		success: function(response){
			$("#showMassData").html(response);
		}
		});
	});
});

// wedding js reset
$(document).ready(function(){
	$(".getWeddingClass").keyup(function(){
		let getWeddingClass = $(this).val();
		getWeddingClass == "" ? window.location.reload() : null;
	});
});

// wedding date picker
$(document).ready(function(){
	$("#dtPickerWeddingDate").datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		yearRange: "1900:c"
	});
});

// wedding ajax for update
$(document).on("click", ".editWedding-data", function(e){
	e.preventDefault();
	let editWedding = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			update_weddingId: editWedding
		},
		dataType: "json",
		success: function(data){
			$("#update_weddingId").val(data.wedding_id);
			$("#dtPickerupdateWeddingUDate").val(data.ceremony_date);
			$("#update_ceremony_time").val(data.ceremony_time);
			$("#update_fee").val(data.fees);
			$("#update_bride_name").val(data.bride_full_name);
			$("#update_bride_contact").val(data.bride_contact);
			$("#update_groom_name").val(data.groom_full_name);
			$("#update_groom_contact").val(data.groom_contact);
		}
	});
});

$(document).on("click", ".deleteWedding-data", function(e){
	e.preventDefault();
	let deleteWedding = $(this).attr("id");
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			del_weddingId: deleteWedding
		},
		dataType: "json",
		success: function(data){
			$("#del_weddingId").val(data.wedding_id);
			$("#bride-fullname").html(data.bride_full_name);
			$("#groom-fullname").html(data.groom_full_name);
		}
	});
});

// ajax wedding filtering
$(document).ready(function(){
	$("#getWedding").keyup(function(){
		let getWedding = $(this).val();
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				weddingFilter: getWedding
			},
			success: function(response){
				$("#showWeddingData").html(response);
			}
		});
	});
});

// certifcation page
$(document).ready(function(){
	$(".getCertClass").keyup(function(){
		let getCertClass = $(this).val();
		getCertClass == "" ? window.location.reload() : null;
	});
});

// certifcation ajax filter
$(document).ready(function(){
	$("#getCert").keyup(function(){
		let getCert = $(this).val();
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				searchCert: getCert
			},
			success: function(response){
				$("#showCertReqdata").html(response);
			}
		});
	});
});
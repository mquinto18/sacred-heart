$(document).ready(function(){
$("#getSearch").on("keyup", function(){
let searchName = $(this).val();
// alert(searchName);
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
	name: searchName
},
success: function(response){
	$("#showData").html(response);
}
});
});
});

$(document).ready(function(){
$(".getSearch").keyup(function(){
let getSearch = $(this).val();

if (getSearch == "") {
window.location.reload();
}
});
});

$(document).ready(function(){
$("#searchEventArchive").keyup(function(){
let searchEventArchive = $(this).val();
$.ajax({
url: "../inc/functions.php",
method: "POST",
data:{
	eventArchive: searchEventArchive
},
success: function(response){
	$("#showEventArchivesData").html(response);
}
});
});
});

$(document).ready(function(){
$(".searchEventArchive").keyup(function(){
let searchEventArchive = $(this).val();
searchEventArchive == "" ? window.location.reload() : null;
});
});

$(document).ready(function(){
$(".searchDonateArchive").keyup(function(){
	let searchDonateArchive = $(this).val();
	searchDonateArchive == "" ? window.location.reload() : null;
});
});

$(document).ready(function(){
$("#searchDonateArchive").keyup(function(){
	let searchDonateArchive = $(this).val();
	$.ajax({
		url: "../inc/functions.php",
		method:"POST",
		data:{
			donateArchive: searchDonateArchive
		},
		success: function(response){
			$("#showDonationArchives").html(response);
		}
	});
});
});

$(document).ready(function(){
$("#sgetDonations").keyup(function(){
	let sgetDonations = $(this).val();
	sgetDonations == "" ? window.location.reload() : null;
});
});

$(document).on("keyup", "#sgetDonations", function(){
let sgetDonations = $(this).val();
$.ajax({
	url: "../inc/functions.php",
	method: "POST",
	data:{
		sgetDonations: sgetDonations
	},
	success: function(response){
		$("#super_showDonationsData").html(response);
	}
});
});

$(document).ready(function(){
$("#sdonate_filter").click(function(){
	let from_date = $("#sdonate_from_date").val();
	let to_date = $("#sdonate_to_date").val();

	if (from_date != "" && to_date != "") {
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				from_donate_track_date: from_date, to_donate_track_date: to_date
			},
			success: function(data){
				$("#super_showDonationsData").html(data);
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
	footer: '<a id="swal-success" type="button" class="btn btn-success" href="donation">Confirm</a>'
	});
	}
});
});


$(document).ready(function(){
$("#sgetChurchExp").keyup(function(){
	let sgetChurchExp = $(this).val();
	sgetChurchExp == "" ? window.location.reload() : null;
});
});



$(document).on("keyup", "#sgetChurchExp", function(){
let sgetChurchExp = $(this).val();
$.ajax({
	url: "../inc/functions.php",
	method: "POST",
	data:{
		sgetChurchExp: sgetChurchExp
	},
	success: function(response){
		$("#super_showExpChurch").html(response);
	}
});
});

$(document).ready(function(){
	$("#sto_church_filter").click(function(){
	let from_churchexp_tracker = $("#sfrom_church_expenses").val();
	let to_churchexp_tracker = $("#sto_church_expenses").val();

	if (from_churchexp_tracker != "" && to_churchexp_tracker != "") {
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				from_churchexp_track_date: from_churchexp_tracker, to_churchexp_track_date: to_churchexp_tracker
			},
			success: function(data){
				$("#super_showExpChurch").html(data);
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


// certificate request reset
$(document).ready(function(){
	$(".strack_certReqClass").keyup(function(){
		let strack_certReqClass = $(this).val();
		strack_certReqClass == "" ? window.location.reload() : null;
	});
});


// baptismal archive reset
$(document).ready(function(){
	$(".searchBaptismalArchive").keyup(function(){
		let searchBaptismalArchive = $(this).val();
		searchBaptismalArchive == "" ? window.location.reload() : null;
	});
});

// certificate request live search
$(document).ready(function(){
	$("#strack_certReq").keyup(function(){
		let strack_certReq = $(this).val();
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				cert_track: strack_certReq
			},
			success: function(response){
				$("#super_showCertReqData").html(response);
			}
		});
	});
});

// donate archives resetter
$(document).ready(function(){
	$(".searchDonateArchive").keyup(function(){
		let searchDonateArchive = $(this).val();
		searchDonateArchive == "" ? window.location.reload() : null;
	});
});

// search church expenses resetter
$(document).ready(function(){
	$(".searchExpenseArch").keyup(function(){
		let searchExpenseArch = $(this).val();
		searchExpenseArch == "" ? window.location.reload() : null;
	});
});

// search expenses archive filter
$(document).ready(function(){
	$("#searchExpenseArch").keyup(function(){
		let searchExpenseArch = $(this).val();
	$.ajax({
		url: "../inc/functions.php",
		method: "POST",
		data:{
			searchExpenseArch: searchExpenseArch
		},
		success: function(response){
			$("#showChurchArchExpensesData").html(response);
		}
	});
	});
});

$(document).ready(function(){
	$(".sreq_cert_archClass").keyup(function(){
		let sreq_cert_archClass = $(this).val();
		sreq_cert_archClass == "" ? window.location.reload() : null;
	});
});

// search certificate archive filter request
$(document).ready(function(){
	$("#sreq_cert_arch").keyup(function(){
		let sreq_cert_arch = $(this).val();
		$.ajax({
			url: "../inc/functions.php",
			method: "POST",
			data:{
				sreq_cert_arch: sreq_cert_arch
			},
			success: function(response){
				$("#super_showCertReqArch").html(response);
			}
		});
	});
});
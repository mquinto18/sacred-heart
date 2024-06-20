// ES6 code
// document.addEventListener("DOMContentLoaded", function(){
// 	let input = document.querySelector(".number");

// 	input.addEventListener("change", ()=>{
// 		if (input.value.length > 11) {
// 			input.value = input.value.slice(0,11);
// 		}
// 	},false);

// },false);

// jquery code
$(document).ready(function(){
	let input = $("input[type='number']");

	input.change(function(){
		if ($(this).val().length > 11) {
			$(this).val($(this).val().slice(0,11)); 
		}
	});
});
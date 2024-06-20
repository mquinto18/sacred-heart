$(document).ready(function(){
	let input = $(".number");

	input.change(function(){
	// Add a change event handler to all selected elements
		if ($(this).val().length > 11) {
			$(this).val($(this).val().slice(0,11)); 
		}
	});
});
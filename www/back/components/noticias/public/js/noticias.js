// get your select element and listen for a change event on it

$( document ).ready(function() {
	$('#secciones').change(function() {
		// set the window's location property to the value of the option the user
		// has selected
		if($(this).val())
			window.location = $(this).val();
	});


});


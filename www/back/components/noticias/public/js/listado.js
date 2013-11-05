// get your select element and listen for a change event on it

$( document ).ready(function() {
	$('#secciones').change(function() {
		if($(this).val())
			window.location = $(this).val();
	});
	$('#secciones').val(window.location.href);

	//alert(window.location.href);
	

});


$(document).ready(function() {
	
	$('#seccionesSelect').change(function() {
		if($(this).val())
			window.location = $(this).val();
	});
	
		if(checkValueSelect(window.location.href))
			$('#seccionesSelect').val(window.location.href);
		else
			$('#seccionesSelect').val(0);

});

function checkValueSelect(secc){
	
	for(var i = 0, opts = document.getElementById('seccionesSelect').options; i < opts.length; ++i){
	   if( opts[i].value == secc )
	     return true;
	}
	return false;
}
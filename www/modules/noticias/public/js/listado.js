$(document).ready(function() {
	
	$('#secciones').change(function() {
		if($(this).val())
			window.location = $(this).val();
	});
	
		if(checkValueSelect(window.location.href))
			$('#secciones').val(window.location.href);
		else
			$('#secciones').val(0);

});

function checkValueSelect(secc){
	
	for(var i = 0, opts = document.getElementById('secciones').options; i < opts.length; ++i){
	   if( opts[i].value == secc )
	     return true;
	}
	return false;
}
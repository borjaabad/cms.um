$( document ).ready(function() {
	$('#secciones').change(function() {
		if($(this).val())
			window.location = $(this).val();
	});
        
            
});


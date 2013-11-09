$(document).ready(function() {
	
	// Switch toggle
	$('.Switch').on( "click", function() {
              
                enabledisablecomponent($(this));
		$(this).toggleClass('On').toggleClass('Off');
	});
	
	
});

function enabledisablecomponent(div){

	status = div.attr('class');
	id = div.attr('id');
        alertify.set({ delay: 3000 });
        
	if(status == 'Switch Off'){
		
		//window.location = "/enablecomponent/"+id
		$.get( "disablecomponent/"+id, function( data ) {
			
			  if(data=='ok'){
				alertify.log('Se deshabilitó correctamente el componente');
			    $('#menu' + id).fadeOut('slow');
			  }
			  else{
                            setTimeout(function(){alertify.error('No se ha desactivado el componente');div.toggleClass('On').toggleClass('Off');;},500);
			  }
			});
		
	}
	if(status == 'Switch On')
		$.get( "enablecomponent/"+id , function( data ) {
		  if(data=='ok'){
				alertify.success('Se habilitó correctamente el componente');
				$('#menu' + id).fadeIn('slow');
		  }
		  else{
			  setTimeout(function(){alertify.error('Hubo un problema y no se habilitó correctamente el componente');div.toggleClass('On').toggleClass('Off');},500);

		  }
		});
		//alert('enciende');	
}


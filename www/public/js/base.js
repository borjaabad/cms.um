  var b = parent.location.pathname.split("/");
  ruta = b[0] +'/modulo/secciones/getmenusecciones';             
      $.get( ruta , function( data ) {
        $('#menuSecciones').html(data);
      });
    
$( document ).ready(function() {
    
        //Calendarios desde hasta
        $(":date").dateinput({
 
            format: 'dd/mm/yyyy',
            
            });
        //Titulo de la página dinámico
        $("#tituloH").keyup(function() {
            $('#nuevaNoticia').html($(this).val());
        });
        
        
});




$( document ).ready(function() {

        $(":date").dateinput({
 
            format: 'dd/mm/yyyy',
            
            });
        
        $("#tituloH").keyup(function() {
            $('#nuevaNoticia').html($(this).val());
    });
    tinymce.init({selector:'textarea'});
});




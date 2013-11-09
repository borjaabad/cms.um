$(document).ready(function(){
	//si hay algún elemento seleccionado, lo marco en el visor
	var seleccionado = $(".lista_posiciones :checked");
	if (seleccionado.length==1) {		
		$("#" + get_visual_asociado(seleccionado.val())).addClass("elegido");
	}
	//evento de mousever sobre un menú en el visor
	$(".m").mouseover(function(){
		$(this).addClass("m_hover");
		//$("#pos_en_pag_" + get_radio_asociado($(this))).parent().addClass("negrita");
	});
	//evento de mouseout de un menú en el visor
	$(".m").mouseout(function(){
		$(this).removeClass("m_hover");
		//$("#pos_en_pag_" + get_radio_asociado($(this))).parent().removeClass("negrita");
	});
	//evento de click sobre un menú en el visor
	$(".m").click(function(){
		//$("#pos_en_pag_" + get_radio_asociado($(this))).click();
		$(".m").removeClass("elegido");
		$(this).addClass("elegido");
	});
});

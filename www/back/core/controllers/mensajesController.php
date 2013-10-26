<?php

class mensajesController extends Controller{
	
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['mensajes']))
			$_SESSION['mensajes'] = array();
			
	}
	/*Verifica si hay mensajes y pinta el script para mostrarlas con la librería alertify.js
	 * No se le pasa ninguna variable
	 * RETURN: vista con código javascript que muestra las alertas
	 * 
	 */
	public function index(){
		echo "INDEXMENSAJES";
	}
	

	
}

?>
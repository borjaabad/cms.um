<?php

class mensajesController extends Controller{
	
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['mensajes']))
			$_SESSION['mensajes'] = array();
			
	}
	/*Verifica si hay mensajes y pinta el script para mostrarlas con la librería alertify.js
	 * No se le pasa ninguna variable
	 * RETURN: código javascript que muestra las alertas
	 * 
	 */
	public function index(){
		
		$mensajes =  Session::get('mensajes');
		foreach($mensajes as $key=>$value){
			
			switch ($key){
				case 'success': break; 
				case 'error': break;
				case 'log': break;
				default: $key='log';break;
			}
			
			$alertify = "<script>
						alertify.".$key."('".$value."');
						return false;
						alert('hola');
						</script>
			";
		}
		return $alertify;
	}
}

?>
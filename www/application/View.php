<?php

class View{

	public function __construct(){
	}

	public function renderizar($vista){
		
		if(!defined('VIEW'))
			define('VIEW',$vista);

                Global $modulo;
                Global $controlador;
		$rutaView = ROOT. 'modules'. DS .$modulo. DS .'views' . DS . $controlador . DS . $vista . '.phtml';
		//Si no existe un controlador con ese nombre busca la vista en index
                if(!is_readable($rutaView))
			$rutaView = ROOT. 'modules'. DS .$modulo. DS .'views' . DS . 'index' . DS . $vista . '.phtml';
                if(is_readable($rutaView)){
				include_once $rutaView;
		}
		else{
			throw new Exception('Error al cargar la vista');
		}		
	}
}


?>
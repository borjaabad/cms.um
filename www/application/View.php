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
        
        public static function getUrlFriendlyString($url)
        {
           $url = strtolower($url);

        $find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $url = str_replace ($find, $repl, $url);
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $url = str_replace ($find, $repl, $url);
        $find = array(' ', '&', '\r\n', '\n');
        $url = str_replace ($find, '-', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        
        return $url;
        }
                
}


?>
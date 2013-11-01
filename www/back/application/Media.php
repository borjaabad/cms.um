<?php

class Media{

	public $css;
	public $js;
	
	public function __construct(Request $peticion){
		
	}
	
	public function js(){
		//JS Base del framework
		include_once ROOT . DS . 'views' . DS . 'common' . DS . 'js.phtml';	
	}
	
	public function css(){
		
		//JS Base del framework
		include_once ROOT . DS . 'views' . DS . 'common' . DS . 'css.phtml';
	}
	
	 
    /*
     * Ruta por defecto:
     * components/component/public/css/archivo.css
     */
	public function AddCss($archivo,$default = true){
		if($default){			
			if(is_readable(ROOT.DS.'components'.$this->_componente.DS.'public'.DS.'css'.DS.$archivo))
				echo '<link rel="StyleSheet" href="' . BASE_URL . 'components/' .$this->_componente.'/public/css/'.$archivo.'" type="text/css">';
				Alertify::agregaMensaje($archivo . ' Agregado ok' , 'log');
		}
		else{
			throw new Exception("Error en la carga del CSS");
		}
	}
	/*
     * Ruta por defecto:
     * components/component/public/js/js
     */
	public function AddJs($archivo,$default = true){
		if($default){			
			if(is_readable(ROOT.DS.'components'.$this->_componente.DS.'public'.DS.'js'.DS.$archivo))
				echo '<script type="text/javascript" src="' . BASE_URL . 'components/' .$this->_componente.'/public/js/'.$archivo.'"></script>';
				Alertify::agregaMensaje($archivo . ' Agregado ok' , 'log');
		}
		else{
			throw new Exception("Error en la carga del CSS");
		}
	}
	
}


?>
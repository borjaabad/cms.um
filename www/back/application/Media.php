<?php

class Media{

	public $css;
	public $js;
	
	public function __construct(){
		
	}
	
	public function js($type=false){
		if(!$type)
			$type = 'js';
		
		//JS/CSS Base del framework
		include_once ROOT . 'views' . DS . 'common' . DS . $type.'.phtml';
		
		//JS/CSS de cada componente
		if($this->type = Component::getJs()){
			foreach ($this->type as $type){

				//Ruta local del componente BASEURL/components/component/public/views/js */css
				if($type->allowedviews){//NO VA EN TODAS LAS VISTAS, verifica que se pueda mostrar en esa vista ya sean file o url		

					foreach($type->allowedviews->view as $view){
						if($view == VIEW){
							foreach ($type->url as $url)
								echo PHP_EOL.'<script type="text/javascript" src="'.$url.'"></script>';
							
							foreach ($type->file as $file)
						 		echo PHP_EOL.'<script type="text/javascript" src="'.BASE_URL.'components/'.NAME_COM.'/public/'.$type.'/'.$type->file.'"></script>';
						}
					}
				}
				else{//VA EN TODAS LAS VISTAS, no está definido views
					foreach ($type->url as $url)
						echo PHP_EOL.'<script type="text/javascript" src="'.$url.'"></script>';
					
					foreach ($type->file as $file)
				 		echo PHP_EOL.'<script type="text/javascript" src="'.BASE_URL.'components/'.NAME_COM.'/public/'.$type.'/'.$type->file.'"></script>';
				}
			}
		}
	}
	
	public function css(){
		
		$css = new Media( );
		$css->js('css');
	}
	
	 
    /*
     * Ruta por defecto:
     * components/component/public/css/archivo.css
     */
	public function AddCss($archivo,$default = true){
		if($default){			
			if(is_readable(ROOT.DS.'components'.$this->_componente.DS.'public'.DS.'css'.DS.$archivo))
				echo '<link rel="StyleSheet" href="' . BASE_URL . 'components/' .$this->_componente.'/css/'.$archivo.'" type="text/css">';
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
		}
		else{
			throw new Exception("Error en la carga del CSS");
		}
	}
	
}


?>
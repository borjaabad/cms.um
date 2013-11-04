<?php

class Media{

	public $css;
	public $js;
	
	public function __construct(Request $peticion){
		
	}
	
	public function js(){
		//JS Base del framework
		include_once ROOT . 'views' . DS . 'common' . DS . 'js.phtml';
		
		//JS de cada componente
		if($this->js = Component::getJs()){
			foreach ($this->js as $js){

				//Ruta local del componente BASEURL/components/component/public/views/js
				if($js->allowedviews){//NO VA EN TODAS LAS VISTAS, verifica que se pueda mostrar en esa vista ya sean file o url		

					foreach($js->allowedviews->view as $view){
						if($view == VIEW){
							foreach ($js->url as $url)
								echo PHP_EOL.'<script type="text/javascript" src="'.$url.'"></script>';
							
							foreach ($js->file as $file)
						 		echo PHP_EOL.'<script type="text/javascript" src="'.BASE_URL.'components/'.NAME_COM.'/public/views/js/'.$js->file.'"></script>';
						}
					}
				}
				else{//VA EN TODAS LAS VISTAS, no está definido views
					foreach ($js->url as $url)
						echo PHP_EOL.'<script type="text/javascript" src="'.$url.'"></script>';
					
					foreach ($js->file as $file)
				 		echo PHP_EOL.'<script type="text/javascript" src="'.BASE_URL.'components/'.NAME_COM.'/public/views/js/'.$js->file.'"></script>';
				}
			}
		}
	}
	
	public function css(){
		
		//JS Base del framework
		echo PHP_EOL;
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
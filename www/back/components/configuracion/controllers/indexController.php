<?php

class indexController extends Controller{
	
	
	public function __construct(){
		parent::__construct();
		Session::control();
	}
	
	//configuracion/
	public function index(){
		
		header('Location: configuracion/system');
		exit;
	}
	
	//configuracion/system
	public function system(){	
		$this->_view->_componentes = Component::getComponentes();
		 
		$this->_view->renderizar('system',true);
	}

	//configuracion/estructura
	public function estructura(){	
	 
		$this->_view->renderizar('estructura',true);
	}        
        
        //configuracion/enablecomponent/componente
	public function enablecomponent($component){
		if($component){
			$component = $this->getCadena($component);
			if(Component::enablecomponent($component))
				echo 'ok';
			else
				echo 'fail';
			exit;
		}
		echo 'fail';
		exit;		
	}
        //configuracion/disablecomponent/componente
	public function disablecomponent($component){	
		if($component){
			$component = $this->getCadena($component);
			if(Component::disablecomponent($component))
				echo 'ok';
			else
				echo 'fail';
			exit;
		}
		echo 'fail';
		exit;			
	}

}

?>
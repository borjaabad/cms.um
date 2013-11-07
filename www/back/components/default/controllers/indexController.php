<?php

class indexController extends Controller{
	
	public function __construct(){
		parent::__construct();
		if(!Session::get('autenticado')){
			Session::destroy();
			$this->redireccionar('login');
		}
		//Menu::resetMenu();
	}
	
	public function index(){
		$this->_view->titulo = "Portada";
		$this->_view->renderizar('main',true);
	}
	
}

?>
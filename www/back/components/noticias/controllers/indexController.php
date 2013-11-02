<?php

class indexController extends Controller{
	
	
	public function __construct(){
		parent::__construct();
		Session::control();
	}
	
	//noticias/
	public function index(){
		$this->_view->renderizar('listado',true);
	}
	

	//noticias/nueva
	public function nueva(){	
		$firmante = $this->loadModel('firmante');
		$seccion = $this->loadModelFromOtherComponent('seccion','secciones');
		
		$this->_view->_secciones = $seccion->getSecciones();
		$this->_view->_firmantes = $firmante->getFirmantes();
		$this->_view->renderizar('nueva',true);
	}
	

	
}

?>
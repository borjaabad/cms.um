<?php

class indexController extends Controller{


	public function __construct(){
		parent::__construct();
	}

	//secciones/
	public function index(){
		$seccion = $this->loadModel('seccion');
		$this->_view->_secciones = $seccion->getSecciones();
		$this->_view->renderizar('listado',true);
	}

	//secciones/getmenusecciones
	public function getmenusecciones(){
		if($_GET){
			$seccion = $this->loadModel('seccion');
			$postSeccion = $this->getTexto('seccion');
                        $this->_view->_secciones = $seccion->getSecciones();
                        $this->_view->renderizar('menu',true);
		}
	}

}

?>
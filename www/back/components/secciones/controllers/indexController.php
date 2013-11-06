<?php

class indexController extends Controller{


	public function __construct(){
		parent::__construct();
		Session::control();
	}

	//secciones/
	public function index(){
		$seccion = $this->loadModel('seccion');
		$this->_view->_secciones = $seccion->getSecciones();
		$this->_view->renderizar('ok',true);
	}

	//secciones/agregar
	public function agregar(){
		if($_POST){
			$seccion = $this->loadModel('seccion');
			$postSeccion = $this->getTexto('seccion');
			if($postSeccion == ""){
				Alertify::add('La sección no puede ser vacía','error');
			}
			else{
				if($result = $seccion->addSeccion($postSeccion))
					Alertify::add('Se agregó correctamente la sección','success');
				else if(!$result)
					Alertify::add('Hubo un error. La sección no fue agregada','error');
			}
		}
		header('location: '.BASE_URL_COM);
	}

	//secciones/eliminar
	public function eliminar(){
		if(isset($_POST['secciones'])) {
			$secciones = $_POST['secciones'];
			$seccion = $this->loadModel('seccion');
			
			if($seccion->eliminar($secciones))
				Alertify::add('Eliminación OK','success');
			else 
				Alertify::add('Hubo un problema con la eliminación.','error');
		}else{
			Alertify::add('No seleccionó ninguna sección.','log');
		}
		header('location: '.BASE_URL_COM);
	}
}

?>
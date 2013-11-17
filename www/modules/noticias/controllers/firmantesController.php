<?php

class firmantesController extends Controller{
	
	
	public function __construct(){
		parent::__construct();
		//$this->_view->setMenu('firmantes');
	}
	
	//noticias/firmantes/
	public function index(){
		$firmantes = $this->loadModel('firmante');
		$this->_view->_firmantes = $firmantes->getFirmantes();
		$this->_view->renderizar('listado',true);
	}
	
	//noticias/firmantes/agregar
	public function agregar(){
		if($_POST){
			$firmante = $this->loadModel('firmante');
			$postFirmante = $this->getTexto('firmante');
			$postEmail = $this->getTexto('email');
			if($postFirmante == ""){
				Alertify::add('Firmante no puede ser vacío','error');
			}
			else{
				if($result = $firmante->addFirmante($postFirmante,$postEmail))
					Alertify::add('Se agregó correctamente el firmante','success');
				else if(!$result)
					Alertify::add('Hubo un error. El firmante no fue agregado','error');
			}
		}
		else
			Alertify::add('No puede ser vacio','error');
		header('location: '.BASE_URL_COM.'firmantes');
		exit;
	}
	
	//noticias/firmantes/eliminar
	public function eliminar(){
		
		if(isset($_POST['firmantes'])) {
			$firmantes = $_POST['firmantes'];
			$firmante = $this->loadModel('firmante');
			
			if($firmante->eliminar($firmantes))
				Alertify::add('Eliminación OK','success');
			else 
				Alertify::add('Hubo un problema con la eliminación.','error');
		}
		else{
			Alertify::add('No seleccionó ningún firmante.','log');
		}
		
		header('location: '.BASE_URL_COM . 'firmantes');
		 exit;
	}
	
	
}

?>
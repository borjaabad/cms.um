<?php

class indexController extends Controller{
	
	
	public function __construct(){
		parent::__construct();
		Session::control();
	}
	
	//noticias/
	public function index(){
		header('location: '.BASE_URL_COM.'nueva');
		exit;
	}

	//noticias/nueva
	public function nueva(){	
		$firmante = $this->loadModel('firmante');
		$seccion = $this->loadModelFromOtherComponent('seccion','secciones');
		
		$this->_view->_secciones = $seccion->getSecciones();
		$this->_view->_firmantes = $firmante->getFirmantes();
		$this->_view->renderizar('nueva',true);
	}
	
	//noticias/agregar
	public function agregar(){	
		if($_POST){
			$noticia = $this->loadModel('noticia');
			if($noticia->agregar()){
				Alertify::add('La noticia se agregó correctamente','success');
				header('Location: '.BASE_URL_COM.'editar');
				exit;
			}
			else{
				Alertify::add('Hubo un problema al guardar la noticia','error');
				header('Location: '.BASE_URL_COM.'editar');
				exit;
			}
			
		}
	}

	//noticias/editar
	public function editar(){	
		$noticias = $this->loadModel('noticia');
		if($noticias = $noticias->getNoticias()){
			$this->_view->_noticias = $noticias;
		}
		$this->_view->renderizar('listado',true);
		
	}
	
	//noticias/eliminar
	public function eliminar(){	
		
		if(isset($_POST['noticias'])) {
			$noticias = $_POST['noticias'];
			$noticia = $this->loadModel('noticia');
			
			if($noticia->eliminar($noticias))
				Alertify::add('Eliminación OK','success');
			else 
				Alertify::add('Hubo un problema con la eliminación.','error');
		}else{
			Alertify::add('No seleccionó ninguna noticia.','log');
		}
		
		header('location: '.BASE_URL_COM . 'editar');
		 exit;
	}
}

?>
<?php

class indexController extends Controller{
	
	
	public function __construct(){
		parent::__construct();
	}
	
	//noticias/
	public function index(){
		header('location: noticias/ultimahora');
		exit;
	}

	
	//noticias/ultimahora
	public function ultimahora($seccion=false){
		
		$noticias = $this->loadModel('noticia');
		$secciones = $this->loadModelFromOtherModule('seccion','secciones');
		
		$this->_view->_noticias = $noticias->getNoticias($seccion);
		$this->_view->_secciones = $secciones->getSecciones();
		
		if(!$this->_view->_noticias)
			Alertify::add('No existen noticias en la sección seleccionada','log');
		if(!$this->_view->_secciones)
			Alertify::add('No existe ninguna sección','log');
		$this->_view->renderizar('ultimahora',true);
	}
        
        	
	//noticias/getnoticias/idseccion
	public function getnoticias($seccion=false){
		
		$noticias = $this->loadModel('noticia');
		$secciones = $this->loadModelFromOtherModule('seccion','secciones');
		
		$this->_view->_noticias = $noticias->getNoticias($seccion);
		$this->_view->_secciones = $secciones->getSecciones();
		
		if(!$this->_view->_noticias)
			Alertify::add('No existen noticias en la sección seleccionada','log');
		if(!$this->_view->_secciones)
			Alertify::add('No existe ninguna sección','log');
		$this->_view->renderizar('ultimahora',true);
	}

}

?>
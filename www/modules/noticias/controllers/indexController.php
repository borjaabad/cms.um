<?php

class indexController extends Controller{
	
	public $instancia;
	public function __construct(){
		parent::__construct();
	}
	
	//noticias/
	public function index(){
		header('location: noticias/ultimahora');
		exit;
	}

        
        //noticias/noticia/id/arg-s
	public function noticia($id,$noticia){
            
                $id = (int)$id;
		$noticia = $this->loadModel('noticia');
                
		$this->_view->_noticia = $noticia->getNoticia($id);
                 
		$this->_view->renderizar('noticia',true);
                
	}
        
        //noticias/principalportada
	public function principalportada(){
		
		$noticias = $this->loadModel('noticia');
		$this->_view->_noticias = $noticias->getNoticiasPortada(1);
		$this->_view->renderizar('principalportada',true);
	}
        
        //noticias/principalseccion
	public function principalseccion($idseccion,$seccion){
                
		$noticias = $this->loadModel('noticia');
		$this->_view->_noticias = $noticias->getNoticiasPortada(1,$idseccion);
		$this->_view->renderizar('principalportada',true);
	}
        //noticias/comunportada
	public function comunportada(){
		
		$noticias = $this->loadModel('noticia');
		$this->_view->_noticias = $noticias->getNoticiasPortada(2);
		$this->_view->renderizar('principalportada',true);
	}
        //noticias/comunseccion
	public function comunseccion($idseccion,$seccion){
		
		$noticias = $this->loadModel('noticia');
		$this->_view->_noticias = $noticias->getNoticiasPortada(2,$idseccion);
		$this->_view->renderizar('comunportada',true);
	}
        //noticias/terceraportada
	public function terceraportada(){
		
		$noticias = $this->loadModel('noticia');
		$this->_view->_noticias = $noticias->getNoticiasPortada(3);
		$this->_view->renderizar('terceraportada',true);
	}
        //noticias/terceraseccion
	public function terceraseccion($idseccion,$seccion){
		
		$noticias = $this->loadModel('noticia');
		$this->_view->_noticias = $noticias->getNoticiasPortada(3,$idseccion);
		$this->_view->renderizar('terceraportada',true);
	}   
        //noticias/otrasportada
	public function otrasportada(){
		
		$noticias = $this->loadModel('noticia');
		$secciones = $this->loadModelFromOtherModule('seccion','secciones');
		$this->_view->_noticias = $noticias->getNoticiasPortada(4);
		$this->_view->renderizar('otrasportada',true);
	}
        //noticias/otrasseccion
	public function otrasseccion($idseccion,$seccion){
		
		$noticias = $this->loadModel('noticia');
		$this->_view->_noticias = $noticias->getNoticiasPortada(4,$idseccion);
		$this->_view->renderizar('otrasportada',true);
	}   
        //noticias/getnoticia
	public function getnoticia(){
		
		$noticias = $this->loadModel('noticia');
		$secciones = $this->loadModelFromOtherModule('seccion','secciones');
		$this->_view->_noticias = $noticias->getNoticia(2);
		$this->_view->_secciones = $secciones->getSecciones();
		$this->_view->renderizar('principalportada',true);
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
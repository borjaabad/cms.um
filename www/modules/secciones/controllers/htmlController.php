<?php

class htmlController extends Controller{


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
        
        //secciones/gettitularseccion
	public function gettitularseccion($id){
                 

         if($_GET){
             
            $pref = explode('/', $_SERVER['REQUEST_URI']);
            $pref = $pref[1];
            $seccion = $this->loadModel('seccion');
            
            if($pref=='noticia')
               $this->_view->seccion = $seccion->getSeccionNoticia($id);
            else
               $this->_view->seccion = $seccion->getSeccion($id);
                        
            $this->_view->renderizar('titularseccion',true);
	}
       }

}

?>
<?php
    
class indexController extends Controller{
    
    
	public function __construct(){
		parent::__construct();
		Session::control();
	}
            
	//paginas
	public function index(){
            $paginas = $this->loadModel('pagina');
            $this->_view->_paginas = $paginas->getPaginas();
            $this->_view->renderizar('listado',true);
            exit;
	}

        //paginas/listado
	public function listado(){
            
            $paginas = $this->loadModel('pagina');
            $this->_view->_paginas = $paginas->getPaginas();
            $this->_view->renderizar('listado',true);
            exit;
	}
        
        //paginas/agregar
	public function agregar(){
            
            if($_POST){
                $paginas = $this->loadModel('pagina');
                if(empty($_POST['titulo']))
                    Alertify::add('Título no puede ser vacío','error');
                else{
                if($paginas->savePagina())
                    Alertify::add('Se agregó correctamente la página','success');
                else
                    Alertify::add('Hubo un problema','error');
            }
            }
            header('LOCATION: '.BASE_URL_COM);
            exit;
	}
            
        //paginas/eliminar
	public function eliminar(){
		if(isset($_POST['paginas'])) {
			$paginas = $_POST['paginas'];
			$pagina = $this->loadModel('pagina');
                            
			if($pagina->eliminar($paginas)){
                            foreach ($paginas as $pg){
                                 
                                $name = $pagina->getPagina($pg);
                                if(!unlink(ROOT . DS . '..' . DS . $name['enlace']))
                                     Alertify::add('Hubo un problema eliminando el archivo '.$name['enlace'],'error');
                            }
                                Alertify::add('Eliminación OK de la BBDD','success');
                        }
			else 
				Alertify::add('Hubo un problema con la eliminación.','error');
		}else
			Alertify::add('No seleccionó ninguna página.','log');
                            
		header('location: '.BASE_URL_COM);
                exit;
	}
}
    
?>
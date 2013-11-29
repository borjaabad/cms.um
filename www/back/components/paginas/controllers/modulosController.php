<?php

class modulosController extends Controller {

    public function __construct() {
        parent::__construct();
        Session::control();
    }

    //paginas/modulos
    public function index() {
        $modulos = $this->loadModel('modulo');
        $this->_view->_modulos = $modulos->getModulosPropios();
        $this->_view->renderizar('listado', true);
        exit;
    }

    //paginas/modulos/agregar
    public function agregar() {
           if($_POST){
                $modulos = $this->loadModel('modulo');
                if(empty($_POST['nombre']))
                    Alertify::add('Nombre no puede ser vacío','error');
                else
                    if($modulos->agregar())
                        Alertify::add('Se agregó correctamente','success');
                    else
                        Alertify::add('Hubo un problema','error');
            }
            header('LOCATION: '.BASE_URL_COM.'modulos');
            exit;
    }
    //paginas/modulos/guardar
    public function guardar() {
            if($_POST){
                $modulo = $this->loadModel('modulo');
                    if($modulo->guardar())
                        Alertify::add('Se agregó correctamente','success');
                    else
                        Alertify::add('Hubo un problema','error');
            }
            header('LOCATION: '.BASE_URL_COM.'modulos');
            exit;
    }
    
    //paginas/modulos/editor/123/abc
    public function editor($id) {
        $modulo = $this->loadModel('modulo');
        $this->_view->_modulo = $modulo->getModuloPropio($id);
        $this->_view->renderizar('editor', true);
        exit;
    }
    
    
    //paginas/modulos/eliminar
    public function eliminar(){
            if(isset($_POST['modulos'])) {
                    $modulos = $_POST['modulos'];
                    $modulo = $this->loadModel('modulo');

                        foreach ($modulos as $mod){
                                    if($modulo->eliminar($modulos))
                                        Alertify::add('Eliminación OK de la BBDD','success');
                                    else 
                                        Alertify::add('Hubo un problema con la eliminación.','error');
                       }	
            }else
                    Alertify::add('No seleccionó ningún módulo.','log');

            header('location: '.BASE_URL_COM.'modulos');
            exit;
    }
}

?>
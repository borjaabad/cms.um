<?php

class maquetacionController extends Controller {

    public function __construct() {
        parent::__construct();
        Session::control();
    }

    //paginas/maquetacion
    public function index() {
        $modulos = $this->loadModel('modulo');
        $this->_view->_modulos = $modulos->getModulos();
        $this->_view->renderizar('maquetacion', true);
        exit;
    }

    //paginas/maquetacion/editarpagina/3/portada
    public function editarpagina($id, $name) {

        $pag = $this->loadModel('modulo');

        //filtroHTMLSEGUROPORHACER($pagina)
        //$name = $this->validaChar($name);
        //

        $this->_view->_modulos = $pag->getModulos();
        $this->_view->renderizar('maquetacion', true);
        exit;
    }

    //paginas/maquetacion/guardar
    public function guardar() {//ajax
        if ($_POST) {

            $pag = $this->loadModel('pagina');

            //filtroHTMLSEGUROPORHACER($pagina)
            $pagina = $_POST['html'];
            $original = $_POST['original'];

            $name = $pag->getPagina($_POST['id']);


            //Lo que hago es traer la página limpia con el html final en el post con jquery. 
            //Además traigo la página con todos los bloques de edición y metadatos para 
            //poder cargar las páginas después con el editor. (getoriginal()).
            if (file_put_contents(ROOT . '..' . DS . $name['enlace'] . '.php', $pagina) &&
                    file_put_contents(ROOT . '..' . DS . 'original' . DS . $name['enlace'] . '.php', $original))
                echo true;
            echo false;
        }
        exit;
    }

    //paginas/maquetacion/getoriginal/123
    public function getoriginal($id) {

        $pag = $this->loadModel('pagina');

        $name = $pag->getPagina($id);

        echo @file_get_contents(ROOT . '..' . DS . 'original' . DS . $name['enlace'] . '.php');

        exit;
    }

}

?>
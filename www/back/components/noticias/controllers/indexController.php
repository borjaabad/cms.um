<?php
    
class indexController extends Controller {
    
    public function __construct() {
        parent::__construct();
        Session::control();
    }
        
    //noticias/
    public function index() {
        header('location: ' . BASE_URL_COM . 'nueva');
        exit;
    }
        
    //noticias/nueva
    public function nueva() {
        $firmante = $this->loadModel('firmante');
        $seccion = $this->loadModelFromOtherComponent('seccion', 'secciones');
        $noticia = $this->loadModel('noticia');
        
        $this->_view->_noticia = $noticia->getNoticia();
        $this->_view->_secciones = $seccion->getSecciones();
        $this->_view->_firmantes = $firmante->getFirmantes();
        $this->_view->renderizar('editor', true);
    }
        
    //noticias/agregar
    public function agregar() {
        if ($_POST) {
            $noticia = $this->loadModel('noticia');
            if ($noticia->agregar($_POST)) {
                Alertify::add('La noticia se agregó correctamente', 'success');
                header('Location: ' . BASE_URL_COM . 'listado');
                exit;
            } else {
                Alertify::add('Hubo un problema al guardar la noticia', 'error');
                header('Location: ' . BASE_URL_COM . 'listado');
                exit;
            }
        }
    }
    
    //noticias/guardar
    public function guardar() {
        if ($_POST) {
            $noticia = $this->loadModel('noticia');
            if ($noticia->guardar($_POST)) {
                Alertify::add('La noticia se guardó correctamente', 'success');
                header('Location: ' . BASE_URL_COM . 'listado');
                exit;
            } else {
                Alertify::add('Hubo un problema al guardar la noticia', 'error');
                header('Location: ' . BASE_URL_COM . 'listado');
                exit;
            }
        }
    }
        
    //noticias/editor/25
    public function editor($id = false) {
        $id = (int)$id;
        if ($id) {
            $noticia = $this->loadModel('noticia');
            $firmante = $this->loadModel('firmante');
            $seccion = $this->loadModelFromOtherComponent('seccion', 'secciones');
            
            $this->_view->_noticia = $noticia->getNoticia($id);

            $this->_view->_secciones = $seccion->getSecciones();
            $this->_view->_firmantes = $firmante->getFirmantes();
            $this->_view->renderizar('editor', true);
        }
    }
        
    //noticias/listado
    public function listado($seccion = false) {
        
        $noticias = $this->loadModel('noticia');
        $secciones = $this->loadModelFromOtherComponent('seccion', 'secciones');
            
        $this->_view->_noticias = $noticias->getNoticias($seccion);
        $this->_view->_secciones = $secciones->getSecciones();
            
        if (!$this->_view->_noticias)
            Alertify::add('No existen noticias en la sección seleccionada', 'log');
        if (!$this->_view->_secciones)
            Alertify::add('No existe ninguna sección', 'log');
        $this->_view->renderizar('listado', true);
    }
        
    //noticias/eliminar
    public function eliminar() {
        if (isset($_POST['noticias'])) {
            $noticias = $_POST['noticias'];
            $noticia = $this->loadModel('noticia');
                
            if ($noticia->eliminar($noticias))
                Alertify::add('Eliminación OK', 'success');
            else
                Alertify::add('Hubo un problema con la eliminación.', 'error');
        }else {
            Alertify::add('No seleccionó ninguna noticia.', 'log');
        }
            
        header('location: ' . BASE_URL_COM . 'listado');
        exit;
    }
        
}
    
?>
<?php
    
class maquetacionController extends Controller{
    
    
	public function __construct(){
		parent::__construct();
		Session::control();
	}
            
	//paginas/maquetacion
	public function index(){
            $this->_view->renderizar('maquetacion',true);
            exit;
	}   
        
	//paginas/maquetacion/guardar
        public function guardar(){

            $pag = $this->loadModel('pagina');
            
            //filtroHTMLSEGUROPORHACER($pagina)
            $pagina =  $_POST['html'];
            $original = $_POST['original'];
            
            $name = $pag->getPagina($_POST['id']);

            //Lo que hago es traer la página limpia con el html final en el post con jquery. 
            //Además traigo la página con todos los bloques de edición y metadatos para 
            //poder cargar las páginas después con el editor. (getoriginal()).
            file_put_contents(ROOT.'..'.DS.$name['name'].'.php', $pagina);
            file_put_contents(ROOT.'..'.DS.'original'.DS.$name['name'].'.php', $original);
            
            
            //$this->_view->renderizar('maquetacion',true);
            exit;
	}   
        
        //paginas/maquetacion/getoriginal/123
        public function getoriginal($id){

            $pag = $this->loadModel('pagina');
            
            $name = $pag->getPagina($id);
            
            echo  @file_get_contents(ROOT.'..'.DS.'original'.DS.$name['name'].'.php');

            exit;
	}   
}
    
?>
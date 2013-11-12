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
}
    
?>
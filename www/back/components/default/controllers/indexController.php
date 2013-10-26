<?php

class indexController extends Controller{
	
	public function __construct(){
		parent::__construct();
		if(!Session::get('autenticado')){
			Session::destroy();
			$this->redireccionar('login');
		}
	}
	
	public function index(){
		//$this->redireccionar('login');
		$this->_view->titulo = "Portada";
		$this->_view->renderizar('main',true);
	}
	
	public function editmaker(){
		/*
		$clientes = $this->loadModel('cliente');
		
		$this->_view->clientes = $clientes->getClientesProducto('Editmaker');
		
		$this->_view->titulo = "Portada";
		$this->_view->renderizar('index','inicio');
		*/
	} 
	
	public function migrar(){
		
		/*$cliente = $this->loadModel('cliente');
		
		$xml = new SimpleXmlElement(file_get_contents("C:\Users\Borja Abad\Desktop\clientes_cibeles.xml"));
				
		foreach ($xml->cliente as $fila){
			
			$cliente->setAll($fila->nombre,$fila->enlace,$fila->producto);
			
			$cliente->save();
		
		}*/
	}
	
}

?>
<?php

class loginController extends Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->_view->agregaMensaje('Probando sistema de mensajes','success');
		$this->_view->agregaMensaje('Probando sistema de mensajes','log');
		$this->_view->agregaMensaje('Probando sistema de mensajes','error');
		
		$this->_view->renderizar('login');
	}

	public function validar(){
		if($_POST){
			if($_POST['user']==USER  &&  $_POST['pass']==PASS){
					Session::set('autenticado',true);
					$this->_view->agregaMensaje('Se ha logueado correctamente','success');
					header("Location:" . BASE_URL );
			}
			else{
				//Session::destroy();
			}
		}
		else 
		$this->_view->renderizar('login');
	}
	
	public function logout(){
		Session::destroy();
		$this->_view->renderizar('login');		
	}
	
}

?>
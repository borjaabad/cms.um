<?php

class indexController extends Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	/*
	 * componente/controlador/metodo/arg/s
	 * login/
	 */
	public function index(){
		/*
		$this->_view->agregaMensaje('Probando sistema de mensajes satisfactoriamente','success');
		$this->_view->agregaMensaje('Prueba 02 tipo log','log');
		$this->_view->agregaMensaje('Ups hubo un problema...','error');
		*/
		
		$this->_view->renderizar('login',true);
	}
	
	/*
	 * componente/controlador/metodo/arg/s
	 * login/validar
	 * login/index/validar
	 */
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
		$this->_view->renderizar('login',true);
	}
	

	
}

?>
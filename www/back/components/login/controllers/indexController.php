<?php

class indexController extends Controller{
	
	
	public function __construct(){
		parent::__construct();
	}
	
	//login/
	public function index(){
		$this->_view->renderizar('login',true);
	}
	
	/*
	 * Sino existe el validarController.php en el componente busca el m�todo en el indexController
	 * login/index/validar -> login/validar
	 */
	//login/validar
	public function validar(){	
				
		if($_POST){
			
			$usuario = $this->loadModel('usuario');
			
			if($usuario->validar()){
					$usuario->iniciarSession();
					header("Location:" . BASE_URL );
			}
			else{
				if($_POST['user']=="")
					Alertify::agregaMensaje('Usuario no puede ser vacio','error');
				elseif($_POST['pass']=="")
					Alertify::agregaMensaje('Contrase�a no puede ser vacio','error');
				else
					Alertify::agregaMensaje('La combinaci�n de usuario y contrase�a no es correcta','error');
				$this->_view->renderizar('login',true);
				
			}
		}
		else 
			$this->_view->renderizar('login',true);
	}
	

	
}

?>
<?php

class loginController extends Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->_view->renderizar('login');
	}

	public function validar(){
		if($_POST){
			if($_POST['usr_form']==USER  &&  $_POST['pass_form']==PASS){
					Session::set('autenticado',true);
					header("Location:" . BASE_URL );
			}
			else{
				Session::destroy();
				$this->_view->error = true;
				$this->_view->renderizar('login');
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
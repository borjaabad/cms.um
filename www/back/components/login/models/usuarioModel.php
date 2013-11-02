<?php

class usuarioModel extends Model{

	public $id;
	public $nombre;
	public $contrasena;


	public function __construct(){
		parent::__construct();
	}


	public function iniciarSession() {
		Session::set('autenticado',true);
		Session::set('usuario', $this);
	}

	
	public function validar(){
		if($_POST['user']==USER  &&  $_POST['pass']==PASS){
			$this->nombre = USER;
			$this->contrasena = PASS;
			return true;
		}
		return false;
	}

}

?>
<?php

class firmanteModel extends Model{

	public $id;
	public $nombre;
	public $email;


	public function __construct(){
		parent::__construct();
		$this->cargaBD();
	}


	public function getFirmantes() {
		try {	
			$firmantes = $this->_db->query("SELECT * FROM firmantes") or die(mysql_error().mysql_errno());
			return $firmantes->fetchAll();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}
}

?>
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
	
	public function addFirmante($firmante,$email){

		try {
			$conn = $this->_db->prepare("INSERT INTO firmantes VALUES (NULL, ? , ?)") or die(mysql_error().mysql_errno());
			$res = $conn->execute(array($firmante,$email));
			return $res;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	public function eliminar($firmantes){
	
		try {
			$conn = $this->_db->prepare("DELETE FROM firmantes WHERE id = ?");
			foreach ($firmantes as $id){
				if($conn->execute(array($id)))
					Alertify::add('Eliminado firmante '.$id,'log');
			}
			return true;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
}

?>
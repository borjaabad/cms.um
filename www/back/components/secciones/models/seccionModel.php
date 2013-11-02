<?php

class seccionModel extends Model{

	public $id;
	public $seccion;

	public function __construct(){
		parent::__construct();
		$this->cargaBD();
	}


	public function getSecciones(){

		try {
				
			$secciones = $this->_db->query("SELECT * FROM secciones") or die(mysql_error().mysql_errno());
			return $secciones->fetchAll();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function addSeccion($seccion){

		try {
				
			$secciones = $this->_db->prepare("INSERT INTO secciones VALUES (NULL, ?)") or die(mysql_error().mysql_errno());
			$res = $secciones->execute(array($seccion));
			return $res;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			//return false;
		}
	}
	public function eliminar($secciones){
	
		try {
			$conn = $this->_db->prepare("DELETE FROM secciones WHERE id = ?");
			foreach ($secciones as $id){
				if($conn->execute(array($id)))
					Alertify::add('Eliminada sección '.$id,'log');
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
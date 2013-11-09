<?php

class configuracionModel extends Model{

	public $cabecera;
	public $pie;


	public function __construct(){
		parent::__construct();
                $this->cargaBD();
	}

	public function getBasicConfig() {
		
                $config = new configuracionModel();

		try {	
			$query = "SELECT cabecera, pie FROM config";

                        $query = $config->_db->query($query) or die(mysql_error().mysql_errno());
			
			return $config->fetchAll();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
}

?>
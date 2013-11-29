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
	
        public function getSeccion($id){
                $id=$this->validaInt($id);
		try {
				
			$secciones = $this->_db->query("SELECT seccion FROM secciones WHERE id=$id LIMIT 1") or die(mysql_error().mysql_errno());
                        $secciones = $secciones->fetch();

                        return $secciones["seccion"];
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
       public function getSeccionNoticia($id){
                $id=$this->validaInt($id);
                

		try {
			$secciones = $this->_db->query("SELECT seccion FROM secciones,noticias WHERE id_seccion=secciones.id and noticias.id =$id LIMIT 1") or die(mysql_error().mysql_errno());
                        $secciones = $secciones->fetch();

                        return $secciones["seccion"];
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}


}

?>
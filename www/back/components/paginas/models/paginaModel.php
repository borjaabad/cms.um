<?php
    
class paginaModel extends Model{
    
        public $id;
	public $titulo;
	public $plantilla;
            
            
	public function __construct(){
		parent::__construct();
                $this->cargaBD();
	}

        public function getPaginas() {
            
		try {	
                        $paginas = new paginaModel();
			$query = "SELECT * FROM paginas";
                        $paginas = $paginas->_db->query($query) or die(mysql_error().mysql_errno());
                        $paginas = $paginas->fetchAll(PDO::FETCH_ASSOC);
                            
                        return $paginas;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        
        public function getPagina($id){
            
           	try {	
                        $paginas = new paginaModel();
			$query = "SELECT name FROM paginas WHERE id = '" . $this->validaInt($id). "'";
                        $paginas = $paginas->_db->query($query) or die(mysql_error().mysql_errno());
                        $pagina = $paginas->fetch();
                            
                        return $pagina;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
        }


        public function savePagina(){
            
		try {
			$conn = $this->_db->prepare("INSERT INTO paginas (titulo, descripcion, name) VALUES (?, ?, ?)") or die(mysql_error().mysql_errno());
                        if($conn->execute(array($this->getTexto('titulo'),$this->getTexto('descripcion'),  Controller::normalizaStringToUrlFilesystemMatch($this->getTexto('titulo'))))){
                                    return true;
                        }
                            
                        return false;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
        }
        
        public function eliminar($paginas){
                $proccess = true;
		
                try {
			$conn = $this->_db->prepare("DELETE FROM paginas WHERE id = ?");
			foreach ($paginas as $id){
				if(!$conn->execute(array($id)))
					$proccess = false;
			}
		
                if(!$proccess)
                    return false;
                return true;
                }
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        
    
        
}
    
?>
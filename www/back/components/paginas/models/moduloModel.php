<?php
    
class moduloModel extends Model{
    
        public $parent;
	public $controller;
	public $method;
            
            
	public function __construct(){
		parent::__construct();
                //$this->cargaBD();
	}

        public function getModulos(){
		
		if($modulos = simplexml_load_file(ROOT.'..'.DS.'modules'.DS.'modules.xml')){
                    return  $modulos->modules;
                }
		else 
			return false;
	}
        
        public function getModulosPropios(){
		
		try {	
			$query = "SELECT * FROM modulos";
                        $this->cargaBD();
                        $modulos = $this->_db->query($query) or die(mysql_error().mysql_errno());
                        $modulos = $modulos->fetchAll(PDO::FETCH_ASSOC);
                            
                        return $modulos;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        
        public function getModuloPropio($id){
		$id=$this->validaInt($id);
		try {	
			$query = "SELECT * FROM modulos WHERE id=$id";
                        $this->cargaBD();
                        $modulo = $this->_db->query($query) or die(mysql_error().mysql_errno());
                                                
                        $modulo = $modulo->fetch();
                        $modulo['content'] = stripslashes($modulo['content']);
                        $modulo['content'] = htmlspecialchars($modulo['content']);
                            
                        return $modulo;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        
        public function agregar(){
		try {
                        $this->cargaBD();
			$conn = $this->_db->prepare("INSERT INTO modulos (nombre) VALUES (?)") or die(mysql_error().mysql_errno());
                        if($conn->execute(array($this->getTexto('nombre'))))
                                    return true;                                   
    
                        return false;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
        }
        
        
        public function guardar(){
		try {
                        $this->cargaBD();
			$conn = $this->_db->prepare("UPDATE modulos SET `content`=? WHERE id=?") or die(mysql_error().mysql_errno());
                        if($conn->execute(array(html_entity_decode($this->getTexto('content')),$this->getInt('idModulo'))))
                                    return true;                                   
    
                        return false;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
        }
        
       public function eliminar($modulos){
                $proccess = true;
		
                try {
                        $this->cargaBD();
			$conn = $this->_db->prepare("DELETE FROM modulos WHERE id = ?");
			foreach ($modulos as $id){
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
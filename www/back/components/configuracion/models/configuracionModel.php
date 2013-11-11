<?php
    
class configuracionModel extends Model{
    
	public $cabecera;
	public $pie;
            
            
	public function __construct(){
		parent::__construct();
                $this->cargaBD();
	}
            
	public function saveBasicConf() {
            
		try {
			$conn = $this->_db->prepare("UPDATE config SET valor=? WHERE clave='cabecera';") or die(mysql_error().mysql_errno());
                        if($res = $conn->execute(array($this->getTexto('cabecera')))){
                            $conn = $this->_db->prepare("UPDATE config SET valor=? WHERE clave='pie';") or die(mysql_error().mysql_errno());
                            if($res = $conn->execute(array($this->getTexto('pie'))))
                                    return true;
                        }
                            
                        return false;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        public function getBasicConf() {
            
		try {	
                        $config = new configuracionModel();
			$query = "SELECT clave, valor FROM config where clave='cabecera' or clave='pie'";
                        $config = $config->_db->query($query) or die(mysql_error().mysql_errno());
                        $config = $config->fetchAll(PDO::FETCH_ASSOC);
                            
                        foreach($config as $row){
                            if(!defined('CABECERA') && $row['clave']=='cabecera')
                                define('CABECERA', $row['valor']);
                            if(!defined('PIE') && $row['clave']=='pie')
                                define('PIE', $row['valor']);
                        }
		return true;	
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        
        public function saveInfoyseoConf() {
            
		try {
			$conn = $this->_db->prepare("UPDATE config SET valor=? WHERE clave='titulo';
                                                     UPDATE config SET valor=? WHERE clave='descripcion';
                                                     UPDATE config SET valor=? WHERE clave='keywords';
                                                     UPDATE config SET valor=? WHERE clave='url';") or die(mysql_error().mysql_errno());

                                    if($conn->execute(array(
                                        $this->getTexto('titulo'),
                                        $this->getTexto('descripcion'),
                                        $this->getTexto('keywords'),
                                        $this->getTexto('url')
                                    )))
                                    return true;
                }
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        
            
        public function getInfoyseoConf(){
                
		try {	
                        $config = new configuracionModel();
			$query = "SELECT clave, valor FROM config where clave='url' or clave='titulo' or clave='descripcion'  or clave='keywords'";
                        $config = $config->_db->query($query) or die(mysql_error().mysql_errno());
                        $config = $config->fetchAll(PDO::FETCH_ASSOC);
                            
     
                        foreach($config as $row){
                            
                            switch($row['clave']){
                                case 'titulo':       define('TITULO', $row['valor']);        break;
                                case 'descripcion':  define('DESCRIPCION', $row['valor']);   break;
                                case 'keywords':     define('KEYWORDS', $row['valor']);      break;
                                case 'url':          define('URL', $row['valor']);           break;
                            }   
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
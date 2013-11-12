<?php 

define('BASE_URL','http://cms.um/');
define('DEFAULT_CONTROLLER','index');
define('DEFAULT_COMPONENT','default');
define('DEFAULT_LAYOUT','default');

define('APP_NAME','CMS :: UM');
define('APP_COMPANY','Facultad de ingenier�a');
define('APP_SLOGAN','Gestor de contenidos');

define('USER','cms');
define('PASS','um');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'contra');
define('DB_NAME', 'cms_um');
define('DB_CHAR', 'utf8');


Class Config{
    
    public $_db;
    
    	public function __construct(){
		$this->_db = new Database();
	}
            
            
    
    public function getBasicConf() {
            
		try {	
			$query = "SELECT clave, valor FROM config where clave='cabecera' or clave='pie'";
                        $config = $this->_db->query($query) or die(mysql_error().mysql_errno());
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
            
        public function getInfoyseoConf(){
                
		try {	
			$query = "SELECT clave, valor FROM config where clave='url' or clave='titulo' or clave='descripcion'  or clave='keywords'";
                        $config = $this->_db->query($query) or die(mysql_error().mysql_errno());
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
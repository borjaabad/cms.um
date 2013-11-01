<?php



class Model
{
    //protected $_db;
    
    public function __construct() {
       //$this->_db = new Database();
    }
    
	protected function getLibrary($libreria)
	{
		$rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
		
		if(is_readable($rutaLibreria)){
			require_once $rutaLibreria;
			
		}
		else{
			throw new Exception('Error de libreria');
		}
	}
}

?>

<?php



class Model
{
    protected $_db;
    
    public function __construct() {
    }
    
    public function cargaBD(){
    	$this->_db = new Database();
    	$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
	
	protected function getTexto($clave)
	{   
		if(isset($_POST[$clave]) && !empty($_POST[$clave])){
			$_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
			return $_POST[$clave];
		}
	}

	protected function getInt($clave)
	{
		if(isset($_POST[$clave]) && !empty($_POST[$clave])){
			$_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
			return $_POST[$clave];
		}

		return 0;
	}
	protected function validaInt($int){
		filter_input(INPUT_POST, $int, FILTER_VALIDATE_INT);
		return (INT) $int;
	}
}

?>

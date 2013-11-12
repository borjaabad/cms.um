<?php



class Database extends PDO
{

	private $conn;
	
	public function __construct() {
		try { 	
			parent::__construct("mysql:host=127.0.0.1;dbname=".DB_NAME,DB_USER,DB_PASS);
		}
		catch(PDOException $e) { 
			echo "Error Connection: " . $e->getMessage();
			return false; 
		}
	}
}

?>

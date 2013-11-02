<?php
class Session
{
	public static function init()
	{
		session_start();
	}

	public static function destroy($clave = false)
	{
		if($clave){
			if(is_array($clave)){
				for($i = 0; $i < count($clave); $i++){
					if(isset($_SESSION[$clave[$i]])){
						unset($_SESSION[$clave[$i]]);
					}
				}
			}
			else{
				if(isset($_SESSION[$clave])){
					unset($_SESSION[$clave]);
				}
			}
		}
		else{
			session_destroy();
		}
	}

	public static function set($clave, $valor)
	{
		if(!empty($clave))
			$_SESSION[$clave] = $valor;
	}

	public static function get($clave)
	{
		if(isset($_SESSION[$clave]))
			return $_SESSION[$clave];
	}
	
	public static function control()
	{
		if(Session::get('autenticado'))
			return true;
		
		session_destroy();
		header('Location: ' .BASE_URL);
	}

}

?>
<?php 

class Bootstrap{
	
	public static function run(Request $peticion){
		
		
		$component = $peticion->getComponente();
		$controller = $peticion->getControlador() . 'Controller';
		if($peticion->cargarComponente){
			//echo "COMPONENTE EXTERNO CARGADO ";
			$rutaControlador = ROOT .'components'.DS.$component.DS.'controllers'.DS.$controller.'.php';
		}
		else{
			//echo "COMPONENTE CORE CONTROLADOR CARGADO ";
			$rutaControlador = ROOT .'core'.DS.'controllers'.DS.$component.'Controller.php';
			$controller = $component.'Controller';
		}
				
		$metodo = $peticion->getMetodo();
		$args = $peticion->getArgs();
		
		echo $rutaControlador;
		exit;
		
		if(is_readable($rutaControlador)){
			require_once $rutaControlador;
			
			$controller = new $controller;

			if(is_callable(array($controller,$metodo)))
				$metodo = $peticion->getMetodo();
				
			else
				$metodo = 'index';

			if(isset($args))
				call_user_func_array(array($controller,$metodo), $args);
			else 
				call_user_func(array($controller,$metodo));			
		}
		else {
			throw new Exception('rutaControlador no encontrada');
		}
	}
	
}

?>
<?php 

class Bootstrap{
	
	public static function run(Request $peticion){
		
		$component = $peticion->getComponente();
		
		define('ROOT_COM', ROOT .'components'.DS.$component.DS);
		
		$controller = $peticion->getControlador() . 'Controller';			
		$metodo = $peticion->getMetodo();
		$args = $peticion->getArgs();
		
		$rutaControlador = ROOT .'components'.DS.$component.DS.'controllers'.DS.$controller.'.php';

		/*
		echo "componente: . ".$component."<br>";
		echo "controlador: . ".$peticion->getControlador()."<br>";
		echo "metodo: . ".$metodo."<br>"; 
		*/
		
		if(is_readable($rutaControlador)){
			require_once $rutaControlador;
			
			$controller = new $controller;
			
				//$metodo = $peticion->getControlador();
				if(is_callable(array($controller,$metodo))) //ojo: if(is_callable(array($component,$metodo)))
					$metodo = $peticion->getMetodo();
				else
					$metodo = 'index';
				if(isset($args))
					call_user_func_array(array($controller,$metodo), $args);
				else 
					call_user_func(array($controller,$metodo));		
						
			if(isset($args))
				call_user_func_array(array($controller,$metodo), $args);
			else 
				call_user_func(array($controller,$metodo));
		}
		
		else{ //Significa que no existe el controlador buscado. Entonces veo si existe el método en lugar del controller del indexController
			  //Así si llamo a /login/validar y no existe el controlador validar buscará el método validar en el indexController del componente login
			  ///login/validar/arg1/arg2/arg3
			  
			$controller = 'indexController';
			
			$rutaControlador = ROOT .'components'.DS.$component.DS.'controllers'.DS.$controller.'.php';

			$metodo = $peticion->getControlador();	
			
			//Al desplazarse a la izq los parámetros el método pasaría a ser el primer argumento
			if($peticion->getMetodo()){
				array_push($args, $peticion->getMetodo());
			}
			array_push($args, $peticion->getArgs());
			
			require_once $rutaControlador;
			
			$controller = new $controller;
			
				$metodo = $peticion->getControlador();
				if(is_callable(array($controller,$metodo))){
					if(isset($args))
						call_user_func_array(array($controller,$metodo), $args);
					else 
						call_user_func(array($controller,$metodo));
				}						
		}
	}
	
}

?>
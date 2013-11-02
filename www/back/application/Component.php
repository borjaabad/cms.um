<?php

class Component {
	
	public $componente;
	public $componentes;
	
	public function __construct(){		
	}

	public function getComponentes(){
		
		
		if($componentes = simplexml_load_file(ROOT.'components'.DS.'components.xml'))
			return  $componentes->components;
		else 
			return false;
	}
	
	public function myComponent(){
		
		GLOBAL $componentes;
		foreach ($componentes->component as $componente){
			
		}
		
		return $miComponente;
	}
	
	public function loadComponent($request){
	
		$component = new Component();
		$componentes = $component->getComponentes();
		
		foreach ($componentes->component as $componente){
			//Componente a cargar
			if($componente->name == $request->getComponente()){
				if($component->enabled($componente)){
					define('NAME_COM' , $componente->name);
					define('BASE_URL_COM' , BASE_URL.$componente->name.'/');
					define('ROOT_COM', ROOT .'components'.DS.NAME_COM.DS);
					if(isset($componente->displayName))
						define('DISPLAYNAME_COM' , $componente->displayName);
					else 
						define('DISPLAYNAME_COM', false);
					if(isset($componente->displayName))
						define('SQLPREFIX_COM' , $componente->displayName);
					else 
						define('SQLPREFIX_COM' , false);
					if(isset($componente->menu))
						define('MENU_COM' , $componente->menu);
					else 
						define('MENU_COM' , false);
				}
				else
					throw new Exception('Componete no habilitado, revise la configuracion de components.xml');
			}
		}
		return $componentes;
	}
	
	public function enabled($componente){
		if($componente->enabled == 'true'){
			define('ENABLED_COM', true);
			return true;
		}
		return false;
	}

}

?>
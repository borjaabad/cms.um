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
	/*
	public function getJs(){
		GLOBAL $modules;
		$js = array();
		foreach ($modules->module as $module){
			if($module->name == NAME_COM){
				if($componente->media->js)
					foreach ($componente->media->js as $array)
						array_push($js, $array);
			}
		}
		if(count($js))
			return $js;

		return false;
	}*/

	/*	
	public function getCss(){
		GLOBAL $components;
		$css = array();
		foreach ($components->component as $componente){
			if($componente->name == NAME_COM){
				if($componente->media->css)
					foreach ($componente->media->css as $array)
						array_push($css, $array);
			}
		}
		if(count($css))
			return $css;

		return false;
	}*/
	
	/*
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
	}*/
	/*
	public function enabled($componente){
		if($componente->enabled == 'true'){
			define('ENABLED_COM', true);
			return true;
		}
		return false;
	}
	
	public function enablecomponent($componente,$disable=false){	
		
		try{
			$xml = ROOT.'components'.DS.'components.xml';
			$componentes = simplexml_load_file($xml);
			
			foreach($componentes->components->component as $comp){
				if($comp->name == $componente  &&  $disable){
                                        if($comp->locked!='true')
                                            $comp->enabled = 'false';
                                        else
                                            return false;
					break;
				}
				if($comp->name == $componente  &&  !$disable){
					$comp->enabled = 'true';
					break;
				}
			}
			if($componentes->asXML($xml)){
				return true;
			}
			return false;
		}
		catch (Exception $e){
			
			return false;
		}
		
		
	}
	*//*
	public function disablecomponent($componente){
		$component = new Component();
		if($component->enablecomponent($componente,true))
			return true;
		return false;
	}
        */
    
        
}
    
?>
<?php

class Menu{
	
	
	public function __construct(){
		//parent::__construct();
	}

	public function mostrar($menu=false){
	
		
		
		
		$menuObj = new Menu();
		
		
		if($path = $menuObj->getMenuFromComponent($menu)){
			$path = str_ireplace('/', DS , $path);
			echo  '<div id="menu"><div id="separador"></div>';
			include_once ROOT .DS. 'components' .DS. $path;
			echo  '</div>';	
			
			return true;
		}
		else{
		$menuHtml  = '<div id="menu"><div id="separador"></div>';
		$menuHtml .= $menuObj->getItemsMenu();
		$menuHtml .= '</div>';	
		
		echo $menuHtml;
		return true;
		}
		return false;
	}
	
	public function getMenuFromComponent($menu){
		//Comprobamos si el componente cargado tiene algún menu por defecto
		GLOBAL $components;
		foreach ($components->component as $component){
			if($component->name == NAME_COM){
				if(isset($component->menus->menuItem)){
					foreach ($component->menus->menuItem as $menuItem){
						if($menuItem->name == $menu)
							return $menuItem->path; 
						if(isset($menuItem->default)){
							if($menu==false && $menuItem->default=='true')
								return $menuItem->path; 
						}
					}
				}
				return false; //no tiene menus
			}		
		}
		return false;
	}
	
	
	
	private function getItemsMenu(){
		
		GLOBAL $components;
		$items = '';
		foreach ($components->component as $componente){
			if($componente->menu == 'true' && $componente->enabled == 'true')			
				$items .= '<a href="'.BASE_URL.$componente->name.'">
							<div id="menuItem">'.
								$componente->displayName.'
						    </div>
						   </a>'; 
		}
		return $items;
	}
	public function resetMenu(){
		Session::destroy('menu');
	}
	public function setMenu($opt){
		switch($opt){
			case 'noticias':
				$menu = '
						<a href="'.BASE_URL.'">
							<div id="menuItem">
								 << Noticias
							</div>
						</a>
						<a href="'.BASE_URL_COM.'nueva">
							<div id="menuItem">
								Nueva
							</div>
						</a>
						<a href="'.BASE_URL_COM.'editar">
							<div id="menuItem">
								Editar
							</div>
						</a>
						<a href="'.BASE_URL_COM.'firmantes">
							<div id="menuItem">
								Firmantes
							</div>
						</a>
						<a href="'.BASE_URL_COM.'estilos">
							<div id="menuItem">
								Estilos
							</div>
						</a>';
				Session::set('menu', $menu);
				break;
			default:
				Session::destroy('menu');
		}
	}

}

?>
<?php

class Menu extends Model{
	
	public $componentes;
	
	public function __construct(){
		parent::__construct();
		
	}

	public function mostrar(){
		
		$menu = new Menu();
		$menu->componentes = simplexml_load_file(ROOT.'components'.DS.'components.xml');
		
		$menuHtml  = '<div id="menu">';
		$menuHtml .= $menu->getItemsMenu($menu->componentes->components);
		$menuHtml .= '</div>';	
		
		echo $menuHtml;
	}
	public function getItemsMenu($componentes){
		$items = '';
		foreach ($componentes->component as $componente){
			if($componente->menu == 'true')			
				$items .= '<a href="'.BASE_URL.$componente->name.'">
							<div id="menuItem">'.
								$componente->displayName.'
						    </div>
						   </a>'; 
		}
		return $items;
	}

}

?>
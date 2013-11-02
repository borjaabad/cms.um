<?php

class Menu{
	
	
	public function __construct(){
		//parent::__construct();
	}

	public function mostrar(){
	
		$menu = new Menu();
		$menuHtml  = '<div id="menu">';
		$menuHtml .= $menu->getItemsMenu();
		$menuHtml .= '</div>';	
		
		echo $menuHtml;
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

}

?>
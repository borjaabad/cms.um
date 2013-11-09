<?php

class Menu extends Request{


	public function __construct(){
		//parent::__construct();
	}

	public function getItemsMenu(){

		GLOBAL $components;
		$items = '';

		foreach ($components->component as $componente){
			if($componente->menu == 'true' && $componente->enabled == 'true'){
					
				$sel = (COMPONENTE == $componente->name) ? $sel = 'selected' : $sel = '';
					
				echo '<div class="itemMenuComponentes '.$sel.'" id="menu'.$componente->name.'">';
				if(isset($componente->menudir))
					echo '<a href="#'.$componente->name.'" data-toggle="tab" class="enlaceComponente" >';
				else 
					echo '<a href="'.BASE_URL.$componente->name.'" class="enlaceComponente" >';
				echo	'
							<div>
								<img alt="config" height="40px" src="'.BASE_URL.'/components/'.$componente->name.'/public/img/'.$componente->img.'">
							</div>
							'.$componente->displayName.'
						</a>
				</div>';				
			}
			echo $items;
		}
	}


	public function getItemsSubmenu(){

		GLOBAL $components;
		$items = '';

		foreach ($components->component as $componente){
			if($componente->menu == 'true' && $componente->enabled == 'true'){
				if(isset($componente->menudir)){
					include_once ROOT.'components'.DS.$componente->menudir;
					
				}
				else {
					$componentObj = $componente->name;
					$componentDisplay = $componente->displayName;
					include ROOT.'views'.DS.'common'.DS.'subMenuDefault.phtml';
				}
			}
				
				
		}
	}


}

?>
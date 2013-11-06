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
			
				//Tiene submenús
				if(isset($componente->menus->menuItem)){
					echo COMPONENTE . ' ------------- ' . $componente->name;
					$items .= '
								<div class="itemMenuComponentes" id="menu'.$componente->name.'">
										<a href="#'.$componente->name.'" data-toggle="tab" class="enlaceComponente" >
											<div>
												<img alt="config" height="40px" src="http://cms.um/back/components/'.$componente->name.'/public/img/'.$componente->img.'">
											</div>
											'.$componente->displayName.'
										</a>
								</div>
								
								<script type="text/javascript">	
														
									$(\'#menu'.$componente->name.'\').on(\'click\',function(){
										if($("#sidebar-wrapper").width()==120){
											$("#sidebar-wrapper").width(310);
											$("#wrapper").css(\'padding-left\',310);
										}else{
											$("#sidebar-wrapper").width(120);
											$("#wrapper").css(\'padding-left\',120);
										}
										
									});
								</script>
								
								';
					
				}
				//No tiene submenús
				else{
					$items .= '
								<div class="itemMenuComponentes" id="menu'.$componente->name.'">
										<a href="'.BASE_URL.$componente->name.'" class="enlaceComponente" >
											<div>
												<img alt="config" height="40px" src="http://cms.um/back/components/'.$componente->name.'/public/img/'.$componente->img.'">
											</div>
											'.$componente->displayName.'
										</a>
								</div>';
					
					if(COMPONENTE == $componente->name){
						$items .= '
									<script type="text/javascript">
										$("#sidebar-wrapper").width(120);
										$("#wrapper").css(\'padding-left\',120);
									</script>
									';
					}
				}
				if(COMPONENTE == $componente->name){
					$items .= 	'
								<script type="text/javascript">
									$("#menu'.$componente->name.'").addClass("menuActive");
								</script>
								';
				}
			}
		}
		echo $items;
	}


	public function getItemsSubmenu(){

		GLOBAL $components;
		$items = '';

		foreach ($components->component as $componente){
				if(isset($componente->menus->menuItem)){

					foreach ($componente->menus->menuItem as $menuItem){
					$active = '';
						if(COMPONENTE == $componente->name && CONTROLADOR == $menuItem->controller)
							$active = ' active';
						include_once ROOT.'components'.DS.$menuItem->path;
					}
				}
				else 
					include_once ROOT.'views'.DS.'common'.DS.'subMenuDefault.phtml';
			
							
		}
	}


}

?>
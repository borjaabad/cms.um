<?php

class Alertify{
	
	public function __construct(Request $peticion){
		
	}
	
	public function add($mensaje,$tipo){

		switch ($tipo){
			case 'success': break;
			case 'error': break;
			case 'log': break;
			default: $tipo='log';break;
		}
			
		$alertify = "
					alertify.set({ delay: 5000 });
					alertify.".$tipo."('".$mensaje."');
					";

		if(isset($_SESSION['mensajes']))
		$_SESSION['mensajes'] = $_SESSION['mensajes'] . $alertify;
		else
		$_SESSION['mensajes'] = $alertify;
	}

	public function mostrarMensajes(){
		if(isset($_SESSION['mensajes'])){
			echo "<script type='text/javascript'>
			".$_SESSION['mensajes']."
			
		</script>";
		}
		Session::destroy('mensajes');
	}	
}


?>
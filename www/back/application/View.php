<?php

class View{

	private $_controlador;
	private $_componente;
	private $cargarComponente;


	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
		$this->_componente = $peticion->getComponente();
		$this->cargarComponente = $peticion->cargarComponente;
		if($peticion->cargarComponente)
		$this->ruta = 'components'.DS.$this->_componente.DS;
		else
		$this->ruta = 'core'.DS;
	}

	public function renderizar($vista,$item = false){
		if($this->cargarComponente)
		$rutaView = ROOT. $this->ruta .'views' . DS . $this->_controlador . DS . $vista . '.phtml';
		else
		$rutaView = ROOT. $this->ruta .'views' . DS . $this->_componente . DS . $vista . '.phtml';
			
		//echo $rutaView; exit;
			
		if(is_readable($rutaView)){
			if($item){
				include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS.'header.php';
				include_once $rutaView;
				include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS. 'footer.php';
			}
			else
			include_once $rutaView;
		}
		else
		throw new Exception('Error al cargar la vista');
	}

	public function agregaMensaje($mensaje,$tipo){

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
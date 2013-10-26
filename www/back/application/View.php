<?php 

class View{
	
	private $_controlador;
	private $_mensajes;
	

	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
		if($peticion->cargarComponente)
			$this->ruta = 'components'.DS.$this->_componente.DS;
		else
			$this->ruta = 'core'.DS;
	}
	
	public function renderizar($vista,$item = false){
		
		$rutaView = ROOT. $this->ruta .'views' . DS . $this->_controlador . DS . $vista . '.phtml';
				
		echo $rutaView; exit;
		
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

	public function añadirMensaje(){
		
		
		
	}
}


?>
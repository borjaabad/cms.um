<?php 

class  Request{
	
	private $_componente;
	private $_controlador;
	private $_metodo;
	private $_argumentos;
	public  $cargarComponente;

	public function __construct()
	{
		if($_GET){
			$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			$url = array_filter($url);	
			$this->_componente = strtolower(array_shift($url));
			$this->_controlador = strtolower(array_shift($url));
			$this->_metodo = strtolower(array_shift($url));
			$this->_argumentos = $url;
		}
		if(!$this->_componente)
			$this->_componente = DEFAULT_COMPONENT;

			
		if(!$this->_controlador || $this->_controlador == "index.php")
			$this->_controlador = DEFAULT_CONTROLLER;
		if(!$this->_metodo)
			$this->_metodo = 'index';
		if(!isset($this->_argumentos))
			$this->_argumentos = array();
			if($this->esPalabraReservadaCORE($this->_componente))
				$this->cargarComponente = false;
			else
				$this->cargarComponente = true;
	}
	
	public function esPalabraReservadaCORE($palabra){
		
		$palabras = array('login');
		foreach ($palabras as $word){
			if($palabra==$word)
				return true;
		}
		return false;
	}
	
	
	public function getComponente()
	{
		return $this->_componente;
	}
	public function getControlador()
	{
		return $this->_controlador;
	}
	
	public function getArgs()
	{
		return $this->_argumentos;
	}

	public function getMetodo()
	{
		return $this->_metodo;
	}

}


?>
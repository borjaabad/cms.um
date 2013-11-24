                 <?php 
    
class  Request{
    
    
        private $_pagina;
        private $_modulo;
	private $_controlador;
	private $_metodo;
	private $_argumentos;
        public $first;
            
	public function __construct()
	{  
            Global $modulo;
            if($_GET){
               
                $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

                $url = explode('/', $url);
                $url = array_filter($url);
                $this->first = strtolower(array_shift($url));

                ///////////////////////////////////////////////////////
                //http://cms.um/modulo/modname/controlador/metodo/arg/s
                ///////////////////////////////////////////////////////
                if ($this->first == 'modulo') {//Cargo módulo
                    $this->_modulo = strtolower(array_shift($url));
                    $this->_controlador = strtolower(array_shift($url));
                    $this->_metodo = strtolower(array_shift($url));
                    $this->_argumentos = $url;
                     
                    $modulo = $this->_modulo;

                }
                ////////////////////////////
                //http://cms.um/pagina/arg/s
                ////////////////////////////
                else {//Cargo página
                    
                    $this->_pagina = $this->first;
                    $this->_argumentos = $url;
                    if (!defined('PAGINA')){
                        define('PAGINA', $this->_pagina);
                    }
                }

                if (!$this->_controlador || $this->_controlador == "index.php")
                    $this->_controlador = DEFAULT_CONTROLLER;
                if (!$this->_metodo)
                    $this->_metodo = 'index';
                if (!isset($this->_argumentos))
                    $this->_argumentos = array();

                if (!defined('CONTROLADOR'))
                    define('CONTROLADOR', $this->_controlador);
                if (!defined('METODO'))
                    define('METODO', $this->_metodo);
                 
            }
            else{
               
                    if (!defined('PAGINA'))
                     define('PAGINA', 'portada');
                     
            }
	}
            
        
        public function paginaModulo(Request $peticion)
        {
            if($peticion->first=='modulo')
                return 'modulo';
             return 'pagina';
                 
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
	public function getPagina()
	{
		return $this->_pagina;
	}
            
	public function getModulo()
	{
		return $this->_modulo;
	}
        
        public function argumentos(){
            if($_GET){
                $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                $url = array_filter($url);
                $this->first = strtolower(array_shift($url));
                
                return $url;
            }
        }
}
    
    
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
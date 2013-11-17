<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);


//Aplicación siempre cargada
require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Module.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Database.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
require_once APP_PATH . 'Form.php';
require_once APP_PATH . 'Media.php';
require_once APP_PATH . 'Alertify.php';
require_once APP_PATH . 'Pagina.php';
require_once APP_PATH . 'Modulo.php';


try{        
        ob_start();

        $peticion = new Request();
                
        //Selector de página
        if($peticion->paginaModulo($peticion)=='pagina')
            Bootstrap::cargaPagina(PAGINA);
        else
            Bootstrap::run($peticion);
             
          
          
      //  $buffer = ob_get_contents();

        //ob_end_clean();
       // if(R)
      //  include_once ROOT.'views'.DS.'header.php';
          //  echo $pagina;
      //  include_once ROOT.'views'.DS.'footer.php';
       // exit;
        
}
catch (Exception $e){
	$e->getMessage();	
}


?>


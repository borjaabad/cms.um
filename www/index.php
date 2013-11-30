<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)) . DS);
    define('APP_PATH', ROOT . 'application' . DS);

    
    require_once APP_PATH . 'Cache.php';
    $cache = new Cache();
    
    if($cache->isCached()){
            $cache->response($cache->buffer);
        exit;
    }
    
    try{  
    //Aplicación
    require_once APP_PATH . 'Config.php';
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


      
         
            ob_start();
            $peticion = new Request();

            //Selector de página
            if($peticion->paginaModulo($peticion)=='pagina')
                Bootstrap::cargaPagina(PAGINA);
            else
                Bootstrap::run($peticion);

            $buffer = ob_get_contents();
            //ob_end_clean();
            $cache->set($buffer);
                
    }
    catch (Exception $e){
            $e->getMessage();	
    }


?>


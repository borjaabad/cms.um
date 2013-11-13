<?php
header('Location: back/login');
exit;
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


try{ 
	$request = new Request();
	//$components = Component::loadComponent($request);
        
        ob_start();

        $peticion = new Request();
        //Selector de página
        switch($peticion->paginaModulo($peticion)){
            case 'pagina':
                $config = new Config();
                $config->getBasicConf();
                $config->getInfoyseoConf();
                Bootstrap::run($peticion);
                break;
            case 'modulo';
                echo 'hopaaaaaaaaaaaaa';
                break;
        }
       
        $pagina = ob_get_contents();

        ob_end_clean();
        echo $pagina.$pagina.$pagina.$pagina;
        
        exit;
        
}
catch (Exception $e){
	$e->getMessage();	
}


?>


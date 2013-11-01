<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);


require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
require_once APP_PATH . 'Session.php';
require_once APP_PATH . 'Datasource.php';
require_once APP_PATH . 'Media.php';
require_once APP_PATH . 'Alertify.php';

Session::init();

try{ 
	Bootstrap::run(new Request());
}
catch (Exception $e){
	$e->getMessage();	
}

?>


<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('ROOTWWW', realpath(dirname(__FILE__)) . DS . '..');

define('APP_PATH', ROOT . 'application' . DS);


//Aplicación siempre cargada
require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Component.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Database.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
require_once APP_PATH . 'Session.php';
require_once APP_PATH . 'Form.php';
require_once APP_PATH . 'Media.php';
require_once APP_PATH . 'Alertify.php';

//Modelos del sistema
require_once ROOT . 'models' . DS . 'menuModel.php';

Session::init();

try {
    $request = new Request();
    $components = Component::loadComponent($request);

    Bootstrap::run($request);
} catch (Exception $e) {
    $e->getMessage();
}
?>


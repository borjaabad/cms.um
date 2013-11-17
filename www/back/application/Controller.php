<?php
    
abstract class Controller{
    
    protected $_view;
        
    public function __construct() {
        $this->_view = new View(new Request);
    }
        
    abstract public function index();
        
    //Carga un modelo por defecto del componente propio
    protected function loadModel($modelo, $flag = false){
        
        $modelo = $modelo . 'Model';
            
        if(!$flag)
            $rutaModelo = ROOT_COM . 'models' . DS . $modelo . '.php'; //MODELOS DEL COMPONENTE QUE SE ESTÁ EJECUTANDO
        else
            $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';  //MODELOS BASE Y COMUNES A TODA LA APP

        if(is_readable($rutaModelo)){
            
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            
            throw new Exception('Error de modelo');
        }
    }
        
    protected function loadModelFromOtherComponent($model, $component){
        
    $model = $model . 'Model';
    $rutaModelo = ROOT . 'components' . DS . $component . DS . 'models' . DS .$model. '.php'; //MODELOS DEL COMPONENTE QUE SE ESTÁ EJECUTANDO
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $model = new $model;
            return $model;
        }
        else {
          throw new Exception('Error de modelo');
        }
    }
        
    protected function getLibrary($libreria){
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
            
        if(is_readable($rutaLibreria))
            require_once $rutaLibreria;
        else
            throw new Exception('Error de libreria');
    }
        
    protected function getTexto($clave){
        if(isset($_POST[$clave]) &&!empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
            
    return '';
    }
        
    protected function getInt($clave){
        
        if(isset($_POST[$clave]) &&!empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        return 0;
    }
        
    public function validaInt($entero){
        if(isset($entero) &&!empty($entero)){
            $entero = filter_input($entero, FILTER_VALIDATE_INT);
        return $entero;
        }
        return 0;
    }
    
    public function validaChar($cadena){
        if(isset($cadena) &&!empty($cadena)){
            $cadena = htmlspecialchars($cadena, ENT_QUOTES);
            return $cadena;
        }
        return '';
    }
    
    protected function redireccionar($ruta = false){
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }
    
    
    public function normalizaStringToUrlFilesystemMatch($url){

        $url = strtolower($url);

        $find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $url = str_replace ($find, $repl, $url);
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        $url = str_replace ($find, $repl, $url);
        $find = array(' ', '&', '\r\n', '\n');
        $url = str_replace ($find, '-', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        $repl = array('', '-', '');
        $url = preg_replace ($find, $repl, $url);
        
        return $url;
    }
}
?>
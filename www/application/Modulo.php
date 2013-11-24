<?php

class Modulo{
    
    public $parent;
    public $controller;
    public $method;
    public $description;
    public $tittle;
    public $js;
    public $css;
    
    public $_modulos;
    
    
    public function procesarModulo($modulo){
        
               
        ob_start(); 
        $this->run(false,$modulo);
        $buffer = ob_get_contents();
        
        ob_end_clean();
        
        return $buffer;
    }
    
    public function run($peticion=false,$mod=false){
        //Si la carga del módulo la hace la página
       
        
            if(!$peticion && $mod){
                $mod = $this->parent;
                $controller = $this->controller . 'Controller';
                $metodo = $this->method;
            }
            //Si la carga del módulo se hace por GET
            else{
                $mod = $peticion->getModulo();
                $controller = $peticion->getControlador() . 'Controller';
                $metodo = $peticion->getMetodo();
            }
            $rutaControlador = ROOT . 'modules' . DS . $mod . DS . 'controllers' . DS . $controller . '.php';
            /*    
            echo "modulo: . " . $modulo . "<br>";
            echo "controlador: . " . $peticion->getControlador() . "<br>";
            echo "metodo: . " . $metodo . "<br>";*/
                
            if (is_readable($rutaControlador)) {
                 
                require_once $rutaControlador;
                    
                $controller = new $controller;
              //  if(!(!$peticion && $mod))    
              //      echo '----';
                $args = Request::argumentos();
                //$metodo = $peticion->getControlador();
                if (!is_callable(array($controller, $metodo))) //ojo: if(is_callable(array($component,$metodo)))
                    $metodo = 'index';
                if (isset($args))
                    call_user_func_array(array($controller, $metodo), $args);
                else
                    call_user_func(array($controller, $metodo));
                        
                if (isset($args))
                    call_user_func_array(array($controller, $metodo), $args);
                else
                    call_user_func(array($controller, $metodo));
            }
                
            else {
               
                //Significa que no existe el controlador buscado. Entonces veo si existe el método en lugar del controller del indexController
                //Así si llamo a /login/validar y no existe el controlador validar buscará el método validar en el indexController del componente login
                ///login/validar/arg1/arg2/arg3. Esto me evitar usar la menos acertada url /login/index/validar/arg1/arg2/arg3
                $controller = 'indexController';
                $rutaControlador = ROOT . 'modules' . DS . $mod . DS . 'controllers' . DS . $controller . '.php';
                $metodo = $peticion->getControlador();
                //Al desplazarse a la izq los par�metros el método pasaría a ser el primer argumento
                $args = array();
                if ($peticion->getMetodo() != 'index') {
                    array_push($args, $peticion->getMetodo());
                }
                array_push($args, $peticion->getArgs());
                    
                    
                require_once $rutaControlador;
                    
                $controller = new $controller;
                    
                $metodo = $peticion->getControlador();
                if (is_callable(array($controller, $metodo))) {
                    if (isset($args))
                        call_user_func_array(array($controller, $metodo), $args);
                    else
                        call_user_func(array($controller, $metodo));
                }
            }
    }
    
    public function setJS(){}
    
    public function setCSS(){}
    
    public function setTittle(){}
    
    public function setDescription(){}
    
    public function setKeywords(){}
    
    public function setParent($parent=false){
        if($parent)
            $this->parent = $parent;
    }

    public function setController($controller=false){
        if($controller)
            $this->controller = $controller;
    }

    public function setMethod($method=false){
        if($method)
            $this->method = $method;        
    }
    public function setString($string=false){
        if($string)
            $this->string = $string;        
    }
}

?>
<?php

class Pagina{
    
    public $rutaPlantilla;
    public $plantillaProcesada;
    public $footer;
    public $header;
    public $keywords;
    public $description;
    public $tittle;
    public $js;
    public $css;
    
    public $_modulos;
    
    
    public function procesarPlantilla(){
        
        $plantilla = file_get_contents($this->rutaPlantilla);
        
        //Ejemplo de lo que busca: [[noticias::index::ultimahora]]
        preg_match_all('/\[\[.*\]\]/i', $plantilla, $this->_modulos);
        $this->_modulos = $this->cargaModulos($this->_modulos[0]);
        
        //Una vez procesados los modulos reemplazamos las etiquetas
        // de la plantilla por la salida que produjo cada módulo
        if($this->_modulos = $this->procesaModulos($this->_modulos))
            foreach($this->_modulos as $mod)
                $plantilla = str_replace($mod->string,$mod->buffer, $plantilla);
        
        $this->SetPlantillaProcesada($plantilla);
    }
    
    public function procesaModulos($modulos){
            
    //    $peticion = 
        Global $modulo;
        Global $controlador;
        
        if($modulos){
            foreach($modulos as $mod){
                $modulo = $mod->parent;
                $controlador = $mod->controller;
                $mod->buffer = $mod->procesarModulo($mod);
            }
            return $modulos;
        }
        return false;
    }
    
    public function cargaModulos($modulos){
        //$buffer = ob_get_contents();
        $modules = array();
        
        foreach ($modulos as $key => $value){
            try {
                $modulo = new Modulo();
                $modulo->setString($value);
                $mcm = str_replace('[[','', $value);
                $mcm = str_replace(']]','', $mcm);
                $arr = explode('::', $mcm);
                
                $modulo->setParent($arr[0]);
                $modulo->setController($arr[1]);
                $modulo->setMethod($arr[2]);
                array_push($modules, $modulo);
            } catch (Exception $ex) {
                echo $ex;
                return false;
            }
        }
        
        if(count($modules))
            return $modules;
        return false;
    }
    
    public function renderizar(){
        
        include_once $this->header;
        echo $this->plantillaProcesada;
        include_once $this->footer;
    }
    
    public function setJS(){}
    
    public function setCSS(){}
    
    public function setTittle(){}
    
    public function setDescription(){}
    
    public function setKeywords(){}
    
    public function setPlantilla($rutaPlantilla=false){
        if($rutaPlantilla)
            $this->rutaPlantilla = $rutaPlantilla;
    }

    public function setFooter($footer=false){
        if($footer)
            $this->footer = $footer;
    }

    public function setHeader($header=false){
        if($header)
            $this->header = $header;        
    }

    public function SetPlantillaProcesada($plantillaProcesada){
        if($plantillaProcesada)
            $this->plantillaProcesada = $plantillaProcesada;
    }
}

?>
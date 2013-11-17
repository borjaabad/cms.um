<?php
    
class Bootstrap {
    
    public static function run(Request $peticion) {
        //Request original: /controlador/metodo/argunmentos
        //modules/controlador/metodo/arg/s
        if (defined('MODULO')) {
                $modulo = new Modulo();
                $modulo->run($peticion);
        }
    }
    //pagina
    public function cargaPagina($pagina=false){
        try{
            if ($pagina == 'index')
                $pagina = 'portada';

            $config = new Config();
            $config->getBasicConf();
            $config->getInfoyseoConf();
            
            $pag = new Pagina();
            
            $pag->setPlantilla(ROOT . $pagina . '.php');
            $pag->setHeader(ROOT. 'views'. DS . 'header.php');
            $pag->setFooter(ROOT. 'views'. DS . 'footer.php');
            $pag->procesarPlantilla();
            $pag->renderizar();
            return true;
            
        } catch (Exception $ex) {
            echo $ex;
            return false;
        }
            
            
    }
        
}
    
?>
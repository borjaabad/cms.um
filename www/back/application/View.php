<?php
    
class View {
    
    private $_controlador;
    private $_componente;
        
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        $this->_componente = $peticion->getComponente();
    }
        
    public function renderizar($vista, $item = false, $menu = true) {
        
        if (!defined('VIEW'))
            define('VIEW', $vista);
        if (!defined('MENU'))
            define('MENU', $menu);
                
        $rutaView = ROOT . 'components' . DS . $this->_componente . DS . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';

        //Si no existe un controlador con ese nombre busca la vista en index
        if (!is_readable($rutaView)) {
            $rutaView = ROOT . 'components' . DS . $this->_componente . DS . 'views' . DS . 'index' . DS . $vista . '.phtml';
			
        }
        if (is_readable($rutaView)) {
            if ($item) {
			//echo $rutaView;exit;
                include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
                include_once $rutaView;
                include_once ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
            } else
                include_once $rutaView;
        }
        else {
            throw new Exception('Error al cargar la vista');
        }
    }
        
    public static function setMenu($menu) {
        if (defined('MENUCOM')) {
            if ($menu)
                define('MENUCOM', $menu);
        }
    }
        
}
    
?>
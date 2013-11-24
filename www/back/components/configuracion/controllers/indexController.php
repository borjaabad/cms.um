<?php
    
class indexController extends Controller{
    
    
	public function __construct(){
		parent::__construct();
		Session::control();
	}
            
	//configuracion/
	public function index(){
            
		header('Location: configuracion/system');
		exit;
	}
            
	//configuracion/system
	public function system(){	
		$this->_view->_componentes = Component::getComponentes();
                    
		$this->_view->renderizar('system',true);
	}
            
	//configuracion/estructura
	public function estructura(){
                $configuracion = $this->loadModel('configuracion');
                if(isset($_POST['cancel'])){
                     Alertify::add('Se canceló el cambio','log');
                }
                else{
                if($_POST){
                    if($configuracion->saveBasicConf())
                        Alertify::add('Se guardó correctamente la configuracion','success');
                    else
                        Alertify::add('Hubo un problema','error');
                }
                }
                    $configuracion->getBasicConf();//Genera CONST
                    $this->_view->renderizar('estructura',true);
	} 
            
        //configuracion/infoyseo
	public function infoyseo(){
                $configuracion = $this->loadModel('configuracion');
                if(isset($_POST['cancel'])){
                     Alertify::add('Se canceló el cambio','log');
                }
                else{
                    if($_POST){
                        if($configuracion->saveInfoyseoConf())
                            Alertify::add('Se guardó correctamente la configuracion','success');
                        else
                            Alertify::add('Hubo un problema','error');
                    }
                }
                    
                    $configuracion->getInfoyseoConf();//Genera CONST
                    $this->_view->renderizar('infoyseo',true);
	} 
            
        //configuracion/enablecomponent/componente
	public function enablecomponent($component){
		if($component){
			$component = $this->validaChar($component);
			if(Component::enablecomponent($component))
				echo 'ok';
			else
				echo 'fail';
			exit;
		}
		echo 'fail';
		exit;		
	}
        //configuracion/disablecomponent/componente
	public function disablecomponent($component){	
		if($component){
			$component = $this->validaChar($component);
			if(Component::disablecomponent($component))
				echo 'ok';
			else
				echo 'fail';
			exit;
		}
		echo 'fail';
		exit;			
	}
            
}
    
?>
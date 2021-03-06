<?php

class noticiaModel extends Model{

	public $id;
	public $titulo;
	public $subtitulo;
	public $entradilla;
	public $texto;
	public $seccion;
	public $firmante;
	public $orden;


	public function __construct(){
		parent::__construct();
		$this->cargaBD();
		
	}

	public function getNoticia($id) {
		$noticia = new noticiaModel();

		try {	
			$query = "SELECT noticias.id, noticias.subtitulo, noticias.entradilla, noticias.texto, noticias.titulo, noticias.orden, secciones.seccion, firmantes.nombre
					  FROM noticias,secciones,firmantes WHERE secciones.id=noticias.id_seccion and noticias.id_firmante=firmantes.id and noticias.id=$id";
			$noticia = $noticia->_db->query($query) or die(mysql_error().mysql_errno());
			
			return $noticia->fetch();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
        
        public function getNoticias($seccion=false) {
             
		$noticias = new noticiaModel();
                
		if(!$seccion)
			$sql ='';
		else 
			$sql =' AND id_seccion='.$this->validaInt($seccion);
               
		try {	
			$query = "SELECT noticias.id, noticias.titulo, noticias.orden, secciones.seccion, firmantes.nombre
					  FROM noticias,secciones,firmantes WHERE secciones.id=noticias.id_seccion and noticias.id_firmante=firmantes.id $sql";
			$noticias = $noticias->_db->query($query) or die(mysql_error().mysql_errno());
			
			return $noticias->fetchAll();
                                    

                   
                    
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

        public function getNoticiasPortada($posicion,$seccion=false){
            $noticias = new noticiaModel();
            $posicion = $this->validaInt($posicion);
            
		try {	
                       
                        if($seccion){
                            $seccion = $this->validaInt($seccion);
                            $add = "and pos_seccion=$posicion and id_seccion=$seccion";
                        }
                        else
                            $add = "and pos_portada=$posicion";

                        $query = "SELECT noticias.id, noticias.titulo,noticias.entradilla,noticias.id_seccion, noticias.orden, secciones.seccion, firmantes.nombre
					  FROM noticias,secciones,firmantes WHERE secciones.id=noticias.id_seccion and noticias.id_firmante=firmantes.id 
                                          $add order by seccion, orden";
			$noticias = $noticias->_db->query($query) or die(mysql_error().mysql_errno());

                        $noticias = $noticias->fetchAll();

                        return $noticias;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
        }
}

?>
<?php
    
class noticiaModel extends Model{
    
	public $id;
	public $titulo;
	public $subtitulo;
	public $entradilla;
	public $texto;
	public $id_seccion;
	public $id_firmante;
	public $orden;
	public $pos_portada;
	public $pos_seccion;
	public $desde;
	public $hasta;
            
            
	public function __construct(){
		parent::__construct();
		$this->cargaBD();
	}
            
        public function getNoticia($id=false) {
		$noticia = new noticiaModel();
                if(!$id){
                    $this->id = 0;
                    $this->titulo= 'Nueva noticia';
                    $this->subtitulo = '';
                    $this->entradilla = '';
                    $this->texto = '';
                    $this->id_seccion = '';                    
                    $this->id_firmante = '';
                    $this->orden = '';
                    $this->pos_seccion = '';                    
                    $this->pos_portada = '';                    
                    $this->desde = '';                    
                    $this->hasta = '';   
                    return (array)$this;
                }
                    
		try {	
			$query = "SELECT noticias.id as id, noticias.titulo as titulo, noticias.subtitulo as subtitulo, noticias.entradilla as entradilla, noticias.texto as texto, noticias.id_seccion as id_seccion,"
                                . "noticias.id_firmante as id_firmante, noticias.orden as orden, noticias.pos_seccion as pos_seccion, noticias.pos_portada as pos_portada, noticias.desde as desde, noticias.hasta as hasta"
                                . " FROM noticias,secciones,firmantes WHERE secciones.id=noticias.id_seccion and noticias.id_firmante=firmantes.id and noticias.id=$id";
			$noticia = $noticia->_db->query($query) or die(mysql_error().mysql_errno());
			
			$noticia = $noticia->fetch();

			$noticia['desde'] =  explode(' ', $noticia['desde']);
			$noticia['desde'] =  $noticia['desde'][0];
			$noticia['hasta'] =  explode(' ', $noticia['hasta']);
			$noticia['hasta'] =  $noticia['hasta'][0];
                        
                      //  echo $noticia['desde'].'<br>'.$noticia['hasta'];exit;
                        
			return $noticia;
			
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
            
        public function guardar(){
            
	$noticia = new noticiaModel();
			$noticia->id = $this->getInt('idNoticia');
                        
			$noticia->titulo = $this->getTexto('titulo');
			$noticia->subtitulo = $this->getTexto('subtitulo');
			$noticia->entradilla = html_entity_decode($this->getTexto('entradilla'));
			$noticia->texto = html_entity_decode($this->getTexto('texto'));
			$noticia->pos_portada = $this->getInt('pos_portada');
			$noticia->pos_seccion = $this->getInt('pos_seccion');
                            
                        if (isset($_POST['guardar']) && $this->getDate('desde'))
                            $noticia->desde = $this->getDate('desde');
                                
                        if(isset($_POST['publicarahora']))
                            $noticia->desde = '01/01/1900';
                                
                        $noticia->hasta = $this->getDate('hasta');
                            
                        //Invierto las fechas para mysql
                        $noticia->hasta =implode('/',array_reverse(explode('/',$noticia->hasta)));
                        $noticia->desde =implode('/',array_reverse(explode('/',$noticia->desde)));
                            
                        $noticia->orden = $this->getInt('orden');
			$noticia->id_seccion = $this->getInt('seccion');
			$noticia->id_firmante = $this->getInt('nombre');
                            
                        if($noticia->orden=='' || $noticia->id_seccion=='' || $noticia->id_firmante=='')
                                   return false;
                                       
                                       
                               
		try {
			$conn = $noticia->_db->prepare(
                        "UPDATE noticias SET `titulo`=?, `subtitulo`=?, `entradilla`=?, `texto`=?, `pos_portada`=?,`pos_seccion`=?,`desde`=?,`hasta`=?,`orden`=?, `id_seccion`=?, `id_firmante`=? WHERE id=?;"
                         );
                             
			$res = $conn->execute(array(
                        $noticia->titulo,$noticia->subtitulo,$noticia->entradilla,$noticia->texto,$noticia->pos_portada,$noticia->pos_seccion,$noticia->desde,$noticia->hasta,$noticia->orden,$noticia->id_seccion,$noticia->id_firmante,$noticia->id)
                               );	
                        
                        return $res;
		}
		catch (PDOException $e) {
			echo $e->getMessage();exit;
			return false;
		}        }
                    
	public function agregar(){
			$noticia = new noticiaModel();
                            
			$noticia->titulo = $this->getTexto('titulo');
			$noticia->subtitulo = $this->getTexto('subtitulo');
			$noticia->entradilla = $this->getTexto('entradilla');
			$noticia->texto = $this->getTexto('texto');
			$noticia->pos_portada = $this->getInt('pos_portada');
			$noticia->pos_seccion = $this->getInt('pos_seccion');
                            
                        if (isset($_POST['guardar']) && $this->getDate('desde'))
                            $noticia->desde = $this->getDate('desde');
                                
                        if(isset($_POST['publicarahora']))
                            $noticia->desde = '01/01/1900';
                                
                        $noticia->hasta = $this->getDate('hasta');
                            
                        //Invierto las fechas para mysql
                        $noticia->hasta =implode('/',array_reverse(explode('/',$noticia->hasta)));
                        $noticia->desde =implode('/',array_reverse(explode('/',$noticia->desde)));
                            
                        $noticia->orden = $this->getInt('orden');
			$noticia->id_seccion = $this->getInt('seccion');
			$noticia->id_firmante = $this->getInt('nombre');
                            
                        if($noticia->orden=='' || $noticia->id_seccion=='' || $noticia->id_firmante=='')
                                   return false;
                                       
                                       
                                       
		try {
			$conn = $noticia->_db->prepare(
                         "INSERT INTO noticias (`titulo`, `subtitulo`, `entradilla`, `texto`, `pos_portada`,`pos_seccion`,`desde`,`hasta`,`orden`, `id_seccion`, `id_firmante`) 
			 VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                             
			$res = $conn->execute(array(
                        $noticia->titulo,$noticia->subtitulo,$noticia->entradilla,$noticia->texto,$noticia->pos_portada,$noticia->pos_seccion,$noticia->desde,$noticia->hasta,$noticia->orden,$noticia->id_seccion,$noticia->id_firmante)
                               );	
                        return $res;
		}
		catch (PDOException $e) {
			echo $e->getMessage();exit;
			return false;
		}
	}
            
            
	public function eliminar($noticias){
		try {
			$conn = $this->_db->prepare("DELETE FROM noticias  WHERE id = ?");
			foreach ($noticias as $id){
				if($conn->execute(array($id)))
					Alertify::add('Eliminada noticia '.$id,'log');
			}
			return true;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
}
    
?>
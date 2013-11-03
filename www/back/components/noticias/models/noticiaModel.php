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

	public function getNoticias() {
		try {	
			$noticias = $this->_db->query("SELECT * FROM noticias") or die(mysql_error().mysql_errno());
			return $noticias->fetchAll();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
	public function agregar(){
			$noticia = new noticiaModel();
			
			$noticia->titulo = $this->getTexto('titulo');
			$noticia->subtitulo = $this->getTexto('subtitulo');
			$noticia->entradilla = $this->getTexto('entradilla');
			$noticia->texto = $this->getTexto('texto');
			$noticia->orden = $this->getInt('orden');
			$noticia->seccion = $this->getInt('seccion');
			$noticia->firmante = $this->getInt('firmante');
		try {
			$conn = $noticia->_db->prepare("INSERT INTO noticias (`titulo`, `subtitulo`, `entradilla`, `texto`, `orden`, `id_seccion`, `id_firmante`) 
			 VALUES (?,?,?,?,?,?,?)");			
			$res = $conn->execute(array($noticia->titulo,$noticia->subtitulo,$noticia->entradilla,$noticia->texto,$noticia->orden,$noticia->seccion,$noticia->firmante));	
			return $res;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
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
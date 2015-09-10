<?php
require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Entrega.php';
require_once 'Usuario.php';
require_once 'Estudiante.php';
require_once 'Profesor.php';
require_once 'Timestamp.php';

class Comentario extends ObjetoPersistente{
	use accesoAPropiedades;
	
	private $comentario;
	private $entrega_id;
	private $creado_en;
	private $comentador;
	private $tipo_comentador;
	
	function __construct($id = -1){
		parent::__construct($id);
		$this->creado_en = Timestamp::ahora();
	}
	protected function initialize_from($aRow){
		$this->comentario = $aRow['comentario'];
		$this->entrega_id = $aRow['entrega_id'];
		$this->comentador  = $aRow['comentador'];
		$this->tipo_comentador  = $aRow['tipo_comentador'];
		$this->creado_en  = new Timestamp($aRow['creado_en']);
	}
	
	public function setComentario($comentario){
		$this->comentario = $comentario;
	}
	
	public function setEntrega($entrega){
		if ($entrega instanceof Entrega){
			$this->entrega_id = $entrega->getId();
		} else {
			$this->entrega_id = $entrega;
		}
	}
	public function setComentador($comentador){
		if ($entrega instanceof Usuario){
			$this->comentador = $comentador->getId();
			$this->tipo_comentador = $comentador->getTipoUsuario();
		} else {
			$this->comentador = $comentador;
		}
	}
	
	public function setTipoComentador($tipo_comentador){
		$this->tipo_comentador = $tipo_comentador;
	}
	
	public function __toString(){
		return $this->comentario;
	}
	
	public function getComentario(){
		return $this->comentario;
	}
	
	public function getEntrega(){
		return new Entrega($this->entrega_id);
	}
	
	public function getComentador(){
		
		$res = null;
		if ($this->tipo_comentador == Usuario::ESTUDIANTE){
			$res = new Estudiante($this->comentador);
		}
		if ($this->tipo_comentador == Usuario::PROFESOR){
			$res = new Profesor($this->comentador);
		}
		return $res;
	}
	
	public function getFechaHora(){
		return $this->creado_en->mostrar();
	}
	
	protected function validar(){
		return true;
	}
	
	public function getTable(){
		return 'comentarios';
	}
}
?>
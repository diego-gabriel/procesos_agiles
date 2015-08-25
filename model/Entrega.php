<?php
require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Estudiante.php';
require_once 'Tarea.php';

class Entrega extends ObjetoPersistente{
	use accesoAPropiedades;
	
	private $archivo;
	private $usuario_id;
	private $tarea_id;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->archivo 	  = $aRow['archivo'];
		$this->usuario_id = $aRow['usuario_id'];
		$this->tarea_id   = $aRow['tarea_id'];
	}
	
	public function setArchivo($archivo){
		$this->archivo = $archivo;
	}
	public function setUsuarioId($usuario_id){
		$this->usuario_id = $usuario_id;
	}
	public function setTareaId($tarea_id){
		$this->tarea_id = $tarea_id;
	}
	public function getArchivo(){
		return $this->archivo;
	}
	public function getUsuario(){
		return new Estudiante($this->usuario_id);
	}
	public function getTarea_id(){
		return new Tarea($this->tarea_id);
	}
	
	public function validar(){
		//implementar
		return true;
	}
	public function getTable(){
		return 'entregas';
	}
}

?>
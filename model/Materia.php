<?php

require_once 'data/Connection.php';
require_once 'PersistentObject.php';

class Materia extends PersistentObject{
	private $nombre;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->nombre = $aRow['nombre'];
	}
	
	protected function guardar_atributos(){
		//implementar
		return true;
	}
	
	protected function validar(){
		//implementar
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	
}

?>
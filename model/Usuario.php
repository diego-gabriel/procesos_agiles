<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';

abstract class Usuario extends ObjetoPersistente{
	use accesoAPropiedades;
	
	const ESTUDIANTE 	= 1;
	const PROFESOR	 	= 2;
	const ADMINISTRADOR = 3;
	
	protected $nombre_usuario;
	protected $clave;
	protected $tipo_usuario;
	
	function __construct($tipo, $id = -1){
		parent::__construct($id);
		$this->tipo_usuario = $tipo;
	}
	
	public function getNombreUsuario(){
		return $this->nombre_usuario;
	}
	
	public function setNombreUsuario($nombre_usuario){
		$this->nombre_usuario = $nombre_usuario;
	}
	
	public function getClave(){
		return $this->clave;
	}
	
	public function setClave($clave){
		$this->clave = $clave;
	}
	
	protected function initialize_from($aRow){
		$this->nombre_usuario = $aRow['nombre_usuario'];
		$this->clave		  = $aRow['clave'];
	}
	
	protected function validar(){
		//implementar
		return true;
	}
	
	public function getTable(){
		return "usuarios";
	}
}

?>
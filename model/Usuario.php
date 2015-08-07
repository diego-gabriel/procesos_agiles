<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente';

abstract class Usuario extends ObjetoPersistente{
	use accesoAPropiedades;
	
	protected $nombre_usuario;
	protected $clave;
	
	function __construct($id = -1){
		parent::__construct($id);
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
}

?>
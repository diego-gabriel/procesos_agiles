<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';

abstract class Usuario extends ObjetoPersistente{
	use accesoAPropiedades;
	
	const ESTUDIANTE 	= 1;
	const PROFESOR	 	= 2;
	const ADMINISTRADOR = 3;
	
	protected $nombre_usuario;
	protected $contrasena;
	protected $nombre;
	protected $apellido;
	protected $telefono;
	protected $correo;
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
	
	public function getContrasena(){
		return $this->contrasena;
	}
	
	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	public function getTelefono(){
		return $this->telefono;
	}
	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
	public function getCorreo(){
		return $this->Correo;
	}
	public function setCorreo($correo){
		$this->correo = $correo;
	}
	
	
	protected function initialize_from($aRow){
		$this->nombre_usuario = $aRow['nombre_usuario'];
		$this->contrasena		  = $aRow['contrasena'];
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
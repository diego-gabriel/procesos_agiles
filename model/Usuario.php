<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Notificacion.php';

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
		$this->tipo_usuario = $tipo;
		parent::__construct($id);
	}
	
	public static function autenticar($usuario, $contrasena){
		$conexion 	= Connection::getInstance();
		$resultado 	= $conexion->query("SELECT id, tipo_usuario FROM usuarios 
										WHERE nombre_usuario = '$usuario' 
										AND contrasena = '$contrasena'");
		$array = null;
			
		if (pg_num_rows($resultado) >= 1){
			while($attr = pg_fetch_object($resultado)){
				$array = $attr;
			}
		}
		
		return $array;
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
	
	public function getTipoUsuario(){
		return $this->tipo_usuario;
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
		return $this->correo;
	}
	public function setCorreo($correo){
		$this->correo = $correo;
	}
	
	
	protected function initialize_from($aRow){
		$this->nombre_usuario = $aRow['nombre_usuario'];
		$this->contrasena	  = $aRow['contrasena'];
		$this->nombre 		  = $aRow['nombre'];
		$this->apellido		  = $aRow['apellido'];
		$this->telefono 	  = $aRow['telefono'];
		$this->correo 		  = $aRow['correo'];
		$this->tipo_usuario   = $aRow['tipo_usuario'];
		
	}
	
	//devuelve el nombre completo del usuario
	public function nombreCompleto(){
		return $this->apellido." ".$this->nombre;
	}
	
	//devuelve las notificaciones del estudiante
	public function notificaciones(){
		
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT notificaciones.id 
										  FROM usuarios, notificaciones   
										  WHERE   
										  notificaciones.usuario_id = usuarios.id AND
										  usuarios.id = $this->id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Notificacion($id);
		}
		
		return $res;
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
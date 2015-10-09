<?php

require_once "ObjetoPersistente.php";
require_once "Estudiante.php";
require_once "Materia.php";

class Inscripcion extends ObjetoPersistente{
	use accesoAPropiedades;
	
	private $usuario_id;
	private $grupo_id;
	
	//construye una inscripcion de manera normal
	function __construct($id = -1){
		parent::__construct($id);
	}
	//construye una inscripcion dados un usuario (o usuario_id) y una
	//materia (o materia_id). Notese que si se pasan id's, ambos 
	//parametros deben ser id's, lo mismo si son objetos.
/*	function __construct($usuario, $materia){
		parent::__construct($id);
		if ($usuario instanceof Estudiante && $materia instanceof Materia){
			$this->usuario_id = $usuario->getId();
			$this->materia_id = $materia->getId();
		} else 
		if (is_numeric($usuario) && is_numeric($materia)){
			$this->usuario = $usuario;
			$this->materia = $materia;
		} else {
			trigger_error("Parametros invalidos, asegurese de pasar usuario y materia", E_USER_ERROR);
		}
	}
*/
	//devuelve todas las inscripciones
	public static function all(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id FROM inscripciones");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Inscripcion($id);
		}
		
		return $res;
		
	}

	//recibe un usuario o usuario_id.
	public function setUsuario($usuario){
		if ($usuario instanceof Estudiante){
			$this->usuario_id = $usuario->getId();
		} else {
			$this->usuario_id = $usuario;
		}
	}
	//retorna el usuario (Estudiante)
	public function getUsuario(){
		return new Estudiante($this->usuario_id);
	}
	//retorna el id del usuario
	public function getUsuarioId(){
		return $this->usuario_id;
	}
	
	public function setGrupo($grupo){
		if ($grupo instanceof Grupo){
			$this->grupo_id = $grupo->getId();
		} else {
			$this->grupo_id = $grupo;
		}
	}
	//retorna la materia (Materia)
	public function getMateria(){
		return new Grupo($this->grupo_id);
	}
	//retorna el id de la materia
	public function getGrupoId(){
		return $this->grupo_id;
	}
	
	protected function validar(){
		//implementar
		return true;
	}
	protected function initialize_from($aRow){
		$this->usuario_id = $aRow['usuario_id'];
		$this->grupo_id = $aRow['grupo_id'];
	}
	public function getTable(){
		return "inscripciones";
	}
	
}

?>
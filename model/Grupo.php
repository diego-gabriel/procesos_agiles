<?php

require_once "ObjetoPersistente.php";
require_once "Profesor.php";
require_once "Materia.php";

class Grupo extends ObjetoPersistente{
	use accesoAPropiedades;
	
	private $usuario_id;
	private $materia_id;
	private $codigo;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	public static function all(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id FROM grupos");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Grupo($id);
		}
		
		return $res;
		
	}
	
	public static function materias(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT materia_id FROM grupos");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Materia($id);
		}
		
		return $res;
		
	}
	
	public function estudiantes(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT usuarios.id 
										  FROM usuarios, inscripciones, grupos  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  grupos.id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  grupos.id = inscripciones.grupo_id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Estudiante($id);
		}
		
		return $res;
	}

	public function setUsuario($usuario){
		if ($usuario instanceof Profesor){
			$this->usuario_id = $usuario->getId();
		} else {
			$this->usuario_id = $usuario;
		}
	}

	public function getUsuario(){
		return new Profesor($this->usuario_id);
	}
	
	public function getUsuarioId(){
		return $this->usuario_id;
	}

	public function setMateria($materia){
		if ($materia instanceof Materia){
			$this->materia_id = $materia->getId();
		} else {
			$this->materia_id = $materia;
		}
	}
	
	public function getMateria(){
		return new Materia($this->materia_id);
	}
	
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	
	public function getCodigo(){
		return $this->codigo;
	}
	
	public function getMateriaId(){
		return $this->materia_id;
	}
	
	protected function validar(){
		return true;
	}
	
	public function validarMateria(){
		$res = true;
		$conexion = Connection::getInstance();
		$consulta = "SELECT * FROM grupos where materia_id = '$this->materia_id' AND codigo = '$this->codigo'";
		$resultado = $conexion->query($consulta);
		$registro = pg_num_rows($resultado);
		if($registro > 0)
			$res = false;
			
		return $res;
	}
	
	protected function initialize_from($aRow){
		$this->usuario_id = $aRow['usuario_id'];
		$this->materia_id = $aRow['materia_id'];
		$this->codigo     = $aRow['codigo'];
	}
	public function getTable(){
		return "grupos";
	}
	
}

?>
<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Estudiante.php';
require_once 'Profesor.php';

class Materia extends ObjetoPersistente{
	
	use accesoAPropiedades;
	
	private $nombre;
	private $codigo;
	private $descripcion;
	private $profesor_id;

	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->nombre      = $aRow['nombre'];
		$this->codigo      = $aRow['codigo'];
		$this->descripcion = $aRow['descripcion'];
		$this->profesor_id = $aRow['profesor_id'];
	}
	
	public static function all(){
		$connection = Connection::getInstance();
		$class 		= "materias";
		$result 	= $connection->query("SELECT id FROM $class");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Materia($id);
		}
		
		return $res;
	}
	
	public function estudiantes(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT usuarios.id 
										  FROM usuarios, inscripciones, materias  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  materias.id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  materias.id = inscripciones.materia_id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Estudiante($id);
		}
		
		return $res;
	}
	
	protected function validar(){
		
		$valido = true;
		
		$connection 	= Connection::getInstance();
        $consultaNombre = "SELECT * FROM materias WHERE nombre = '$this->nombre' AND id <> '$this->id'";
        $resultado 		= $connection->query($consultaNombre);
        $registros 		= pg_num_rows($resultado);
        
        if($registros > 0)
        	$valido = false;
        	
		return $valido;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	
	public function setProfesor($profesor_id){
		$this->profesor_id = $profesor_id;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function getCodigo(){
		return $this->codigo;
	}
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function getProfesor(){
		return new Profesor($this->profesor_id);
	}
	
	public function getTable(){
		return "materias";
	}
}

?>
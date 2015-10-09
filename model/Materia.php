<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Estudiante.php';
require_once 'Profesor.php';
require_once 'Grupo.php';
require_once 'Area.php';

class Materia extends ObjetoPersistente{
	
	use accesoAPropiedades;
	
	private $nombre;
	private $codigo;
	private $descripcion;
	private $area_id;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->nombre      = $aRow['nombre'];
		$this->codigo      = $aRow['codigo'];
		$this->descripcion = $aRow['descripcion'];
		$this->area_id     = $aRow['area_id'];
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
										  FROM usuarios, inscripciones, grupos  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  grupos.materia_id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  grupos.id = inscripciones.grupo_id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Estudiante($id);
		}
		
		return $res;
	}
	
	public function mostrarGrupos(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id 
										  FROM grupos  
										  WHERE materia_id = $this->id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Grupo($id);
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
	
	public function setArea($area){
		if ($area instanceof Area){
			$this->area_id = $area->getId();
		} else {
			$this->area_id = $area;
		}
	}
	public function getArea(){
		return new Area($this->area_id);
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
	
	public function getTable(){
		return "materias";
	}
}

?>
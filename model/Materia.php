<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Estudiante.php';

class Materia extends ObjetoPersistente{
	
	use accesoAPropiedades;
	
	private $nombre;

	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->nombre = $aRow['nombre'];
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
		//implementar
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function getTable(){
		return "materias";
	}
}

?>
<?php
require_once 'Usuario.php';
require_once 'Materia.php';
require_once 'Tarea.php';

class Estudiante extends Usuario{

	public function __construct($id = -1){
		parent::__construct(Usuario::ESTUDIANTE, $id);
	}
	
	public static function all(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id FROM usuarios 
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE);
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Estudiante($id);
		}
		
		return $res;
	}
	//devuelve todas las materias a las que se ha inscrito el estudiante
	public function materias(){
		
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT materias.id 
										  FROM usuarios, inscripciones, materias  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  usuarios.id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  materias.id = inscripciones.materia_id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Materia($id);
		}
		
		return $res;
	}
	//devuelve todas las tareas del estudiante
	public function tareas(){
		
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT tareas.id 
										  FROM usuarios, inscripciones, materias, tareas  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  usuarios.id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  materias.id = inscripciones.materia_id AND 
										  tareas.materia_id = materias.id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Tarea($id);
		}
		
		return $res;
	}
	
}

?>
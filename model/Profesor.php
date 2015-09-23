<?php
require_once 'Usuario.php';
require_once 'Estudiante.php';
require_once 'Materia.php';
require_once 'Tarea.php';
require_once 'Entrega.php';

class Profesor extends Usuario{

	public function __construct($id = -1){
		parent::__construct(Usuario::PROFESOR, $id);
	}
	
	public static function all(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id FROM usuarios 
										  WHERE tipo_usuario = ".Usuario::PROFESOR);
		$res 		= array();
		while (($id = pg_fetch_array($result)[0]) != null){
			$res[] = new Profesor($id);
		}
		
		return $res;
	}
	
	public function mostrarTareas(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id 
										  FROM   tareas  
										  WHERE  profesor_id = $this->id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Tarea($id);
		}
		
		return $res;
	}
	
	public function mostrarMaterias(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id 
										  FROM   materias  
										  WHERE  profesor_id = $this->id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Materia($id);
		}
		
		return $res;
	}
	public function numeroEstudiantes(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT inscripciones.usuario_id 
										  FROM   inscripciones, materias
										  WHERE  materias.profesor_id = $this->id AND
										  inscripciones.materia_id = materias.id");
		$res 		= pg_num_rows($result);
		
		return $res;
	}
	//Devuelve una lista de todos los estudiantes inscritos a $materia
	public function estudiantes($materia){
		//echo 'implementar metodo Profesor->estudiantes($materia)<br>';
		
		return $materia->estudiantes();
	}
}

?>
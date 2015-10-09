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
										  WHERE estado = 't' and tipo_usuario = ".Usuario::PROFESOR);
		$res 		= array();
		while (($id = pg_fetch_array($result)[0]) != null){
			$res[] = new Profesor($id);
		}
		
		return $res;
	}
	
	public function mostrarTareas(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT tareas.id 
										  FROM   tareas, grupos  
										  WHERE  grupos.usuario_id = $this->id AND 
										  		 tareas.grupo_id = grupos.id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Tarea($id);
		}
		
		return $res;
	}
	
	public function mostrarMaterias(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT distinct materia_id
										  FROM   grupos  
										  WHERE  usuario_id = $this->id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Materia($id);
		}
		
		return $res;
	}
	
	public function mostrarGrupos($materia){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id
										  FROM   grupos  
										  WHERE  materia_id = $materia AND usuario_id = $this->id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Grupo($id);
		}
		
		return $res;
	}
	
	public function numeroGrupos(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT usuario_id 
										  FROM   grupos
										  WHERE  usuario_id = $this->id");
		$res 		= pg_num_rows($result);
		
		return $res;
	}
	//Devuelve una lista de todos los estudiantes inscritos a $materia
	public function estudiantes($grupo){
		return $grupo->estudiantes();
	}
}

?>
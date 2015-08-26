<?php
require_once 'Usuario.php';
require_once 'Materia.php';
require_once 'Tarea.php';
require_once 'Entrega.php';
require_once 'Timestamp.php';

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
	//devuelve las materias a las que el estudiante puede inscribirse
	public function materiasHabilitadas(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT materias.id 
										  FROM materias 
										  WHERE materias.id NOT IN 
										  (SELECT materias.id 
										  FROM usuarios, inscripciones, materias  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  usuarios.id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  materias.id = inscripciones.materia_id)");
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
	
	//devuelve una Entrega si la tarea fue entregada, sino devuelve NULL
	public function entrega($tarea){
		$tarea_id;
		if ($tarea instanceof Tarea){
			$tarea_id = $tarea->getId();
		} else {
			$tarea_id = $tarea;
		}
		
		$entrega = null;
		$conexion  = Connection::getInstance();
		$resultado = $conexion->query("SELECT entregas.id 
									   FROM entregas, usuarios, tareas 
									   WHERE 
									   entregas.usuario_id = $this->id AND 
									   entregas.tarea_id = $tarea_id");
		while ($id = pg_fetch_array($resultado)[0]){
			$entrega = new Entrega($id);
		}							   
		return $entrega;
	}
	
	//devuelve el archivo entregado para una tarea
	public function archivoDe($tarea){
		$entrega = $this->entrega($tarea);
		return $entrega == null ? null : $entrega->getArchivo();
	}
	
	//devuelve el estado de una tarea
	
	public function estadoDe($tarea){
		return $this->entrega($tarea) != null ? Tarea::ENTREGADA : 
		($tarea->getFechaEntrega()->mayorQue(Timestamp::ahora()) ? 
		Tarea::PENDIENTE : Tarea::ATRASADA);
	}
	
}

?>
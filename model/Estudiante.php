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
		$result 	= $connection->query("SELECT grupos.materia_id 
										  FROM usuarios, inscripciones, grupos  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  usuarios.id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  grupos.id = inscripciones.grupo_id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Materia($id);
		}
		
		return $res;
	}
	//devuelve las materias a las que el estudiante puede inscribirse
	public function materiasHabilitadas(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT distinct materias.id 
										  FROM materias, grupos 
										  WHERE grupos.materia_id = materias.id AND 
										  materias.id NOT IN 
										  (SELECT grupos.materia_id 
										  FROM usuarios, inscripciones, grupos  
										  WHERE tipo_usuario = ".Usuario::ESTUDIANTE." AND  
										  usuarios.id = $this->id AND 
										  usuarios.id = inscripciones.usuario_id AND 
										  grupos.id = inscripciones.grupo_id)");
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
										  FROM tareas, inscripciones
										  WHERE inscripciones.usuario_id = $this->id AND
										  inscripciones.grupo_id = tareas.grupo_id");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Tarea($id);
		}
		
		return $res;
	}
	
	public function profesor($materia){
		
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT grupos.usuario_id
										  FROM grupos, inscripciones
										  WHERE inscripciones.usuario_id = $this->id AND
										  inscripciones.grupo_id = grupos.id AND
										  grupos.materia_id = $materia");
		$res 		= array();
		$id = pg_fetch_array($result)[0];
		$profesor = new Profesor($id);
		return $profesor;
	}
	
	public function grupo($materia){
		
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT grupos.id
										  FROM grupos, inscripciones
										  WHERE inscripciones.usuario_id = $this->id AND
										  inscripciones.grupo_id = grupos.id AND
										  grupos.materia_id = $materia");
		$res 		= array();
		$id = pg_fetch_array($result)[0];
		$grupo = new Grupo($id);
		return $grupo;
	}

	public function tareasDelMes(){
		
		$res = array();
		$mesActual = Timestamp::ahora()->getMes();
		foreach($this->tareas() as $tarea){
			if ($tarea->getFechaEntrega()->getMes() == $mesActual)
				$res[] = $tarea;
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
		
		$conexion  = Connection::getInstance();
		$resultado = $conexion->query("SELECT entregas.id 
									   FROM entregas, usuarios, tareas 
									   WHERE 
									   entregas.usuario_id = $this->id AND 
									   entregas.tarea_id = $tarea_id");
		$id = pg_fetch_array($resultado)[0];
		$entrega = $id != null ? new Entrega($id) : null;
							   
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
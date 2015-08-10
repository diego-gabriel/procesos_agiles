<?php
require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Timestamp.php';
require_once 'Materia.php';

class Tarea extends ObjetoPersistente{
	
	use accesoAPropiedades;

	private $fecha_inicio;
	private $fecha_entrega;
	private $nombre;
	private $descripcion;
	private $materia_id;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->fecha_inicio  	= new Timestamp($aRow['fecha_inicio']);
		$this->fecha_entrega  	= new Timestamp($aRow['fecha_entrega']);
		$this->nombre 	    	= $aRow['nombre'];
		$this->descripcion		= $aRow['descripcion'];
		$this->materia_id	 	= $aRow['materia_id'];
	}
	
	public static function all(){
		$connection = Connection::getInstance();
		$class 		= "tareas";
		$result 	= $connection->query("SELECT id FROM $class");
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Tarea($id);
		}
		
		return $res;
	}
	
	
	protected function validar(){
		//validamos que el nombre no este repetido en la basede datos
		$valido = true;
		
		$connection 	= Connection::getInstance();
        $consultaNombre = "SELECT * FROM tareas WHERE nombre = '$this->nombre' AND materia_id = '$this->materia_id'";
        $resultado 		= $connection->query($consultaNombre);
        $registros 		= pg_num_rows($resultado);
        
        if($registros > 0)
        	$valido = false;
        	
		return $valido;
	}
	
	public function setMateria($materia_id){
		$this->materia_id = $materia_id;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	
 	public function setFechaInicio($date, $hour){
 		$this->fecha_inicio = new Timestamp($date, $hour);
 	}
 	
 	public function setFechaEntrega($date, $hour){
 		$this->fecha_entrega = new Timestamp($date, $hour);
 	}
 	
 	public function getMateria(){
 		return new Materia($this->materia_id);
 	}
 	
 	public function getNombre(){
 		return $this->nombre;
 	}
 	
 	public function getFechaInicio(){
 		return $this->fecha_inicio;
 	}
 	
 	public function getFechaEntrega(){
 		return $this->fecha_entrega;
 	}
 	
 	public function getDescripcion(){
 		return $this->descripcion;
 	}
 	
 	public function getTable(){
 		return "tareas"
 	}
}

?>
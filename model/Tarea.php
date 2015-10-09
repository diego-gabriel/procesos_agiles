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
	private $grupo_id;
	private $estado;
	
	const PENDIENTE  = "Pendiente";
	const ENTREGADA  = "Entregada";
	const ATRASADA   = "Atrasada";
	const VISIBLE 	 = "Visible";
	const NO_VISIBLE = "No Visible";
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->fecha_inicio  	= new Timestamp($aRow['fecha_inicio']);
		$this->fecha_entrega  	= new Timestamp($aRow['fecha_entrega']);
		$this->nombre 	    	= $aRow['nombre'];
		$this->descripcion		= $aRow['descripcion'];
		$this->materia_id	 	= $aRow['materia_id'];
		$this->grupo_id         = $aRow['grupo_id'];
		$this->estado           = $aRow['estado'];
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
        $consultaNombre = "SELECT * FROM tareas WHERE nombre = '$this->nombre' AND materia_id = '$this->materia_id' AND id <> '$this->id'";
        $resultado 		= $connection->query($consultaNombre);
        $registros 		= pg_num_rows($resultado);
        
        if($registros > 0)
        	$valido = false;
        	
		return $valido;
	}
	
	public function setMateria($materia_id){
		$this->materia_id = $materia_id;
	}
	public function setGrupo($grupo_id){
		$this->grupo_id = $grupo_id;
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
 	public function setEstado($estado){
 		if ($estado == Tarea::VISIBLE)
 			$this->estado = "t";
 		if ($estado == Tarea::NO_VISIBLE)
 			$this->estado = "f";
 	}
 	
 	public function getMateria(){
 		return new Materia($this->materia_id);
 	}
 	
 	public function getGrupo(){
 		return $this->grupo_id;
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
 	
 	public function getEstado(){
 		$resultado = Tarea::VISIBLE;
 		if($this->estado=="f" || $this->fecha_inicio > Timestamp::ahora()){
 			$resultado = Tarea::NO_VISIBLE;
 		}
 		return $resultado;
 	}
 	
 	public function generarEnlace(){
 		return "/estudiantes/tarea.php?id=".$this->getId();
 	}
 	
 	public function getTable(){
 		return "tareas";
 	}
}

?>
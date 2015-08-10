<?php

require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';

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
	
	protected function validar(){
		//implementar
		return true;
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public function getTable(){
		return "materias";
	}
}

?>
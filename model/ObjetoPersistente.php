<?php

require_once "traits/accesoAPropiedades.php";

function pluralize($str){
	return $str."s";
}

abstract class ObjetoPersistente{
		
	use accesoAPropiedades;
	
	protected $id;
	
	protected function __construct($id = -1){
		if ($id < 0){
			$this->id = $id;
		} else {
			$connection = Connection::getInstance();
			$class 		= $this->getClass();
			$data 		= $connection->query("SELECT * FROM $class WHERE id = $id");
			
			$this->id = $id;
			
			while ($aRow = pg_fetch_assoc($data)){
				$this->initialize_from($aRow);
			}
		}
	}
	
	
	public function guardar(){
		$guardado_exitoso = false;
		
		if ($this->validar()){
		//el objeto decide si debe insertarse a la base de datos
			if ($this->id < 0){
				$connection 	= Connection::getInstance();
				$class = $this->getClass();
				$connection->query("INSERT INTO $class DEFAULT VALUES");
				$res = $connection->query("SELECT currval('$class"."_id_seq')");
				$arr = pg_fetch_array($res);
				$this->id = $arr[0];
			}
			
			$this->guardar_atributos();
			
			$guardado_exitoso = true;
		}
		
		return $guardado_exitoso;	
		
	}
	
	public function guardar_atributos(){
		$atributos = $this->atributos();
		$conexion = Connection::getInstance();
		
		$consulta = "UPDATE ".$this->getClass()." SET ";
		$bandera = false;
		foreach($this->atributos() as $attr => $value){
			
			if ($bandera){
				$consulta .= ", ";
			} else {
				$bandera = true;
			}
			
			$consulta .= $attr." = ".(is_numeric($value) ? $value : "'$value'")." ";
		}
	
		$consulta .= "WHERE id = $this->id";
		echo "$consulta<br>";
		$conexion->query($consulta);
	}
	
	private function getClass(){
		return strtolower(pluralize(get_class($this)));
	}
	
	
	public function getId(){
		return $this->id;
	}
	
	protected abstract function initialize_from($aRow);
	protected abstract function validar();
}
	
?>
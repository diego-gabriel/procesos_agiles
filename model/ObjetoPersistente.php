<?php

require_once "traits/accesoAPropiedades.php";

abstract class ObjetoPersistente{
		
	use accesoAPropiedades;
	
	protected $id;
	
	public function __construct($id = -1){
		if ($id < 0){
			$this->id = $id;
		} else {
			$connection = Connection::getInstance();
			$class 		= $this->getTable();
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
				$class = $this->getTable();
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
		
		$consulta = "UPDATE ".$this->getTable()." SET ";
		$bandera = false;
		foreach($this->atributos() as $attr => $value){
			
			if ($attr != "id"){
				if ($bandera){
					$consulta .= ", ";
				} else {
					$bandera = true;
				}
				
				$consulta .= $attr." = ".(is_numeric($value) ? $value : "'$value'")." ";
			}
		}
	
		$consulta .= "WHERE id = $this->id";
		$conexion->query($consulta);
	}
	
	
	
	public function getId(){
		return $this->id;
	}
	
	public abstract function getTable();
	protected abstract function initialize_from($aRow);
	protected abstract function validar();
}
	
?>
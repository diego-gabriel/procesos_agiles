<?php
require_once 'Usuario.php';

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
	
}

?>
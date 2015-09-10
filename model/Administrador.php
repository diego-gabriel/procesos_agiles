<?php

require_once 'Usuario.php';

class Administrador extends Usuario{
	public function __construct($id = -1){
		parent::__construct(Usuario::Administrador, $id);
	}
	
	public static function all(){
		$connection = Connection::getInstance();
		$result 	= $connection->query("SELECT id FROM usuarios 
										  WHERE tipo_usuario = ".Usuario::ADMINISTRADOR);
		$res 		= array();
		
		while ($id = pg_fetch_array($result)[0]){
			$res[] = new Administrador($id);
		}
		
		return $res;
	}
}

?>
<?php
require_once 'Usuario.php';

class Estudiante extends Usuario{
	use accesoAPropiedades;
	
	private $usuario_id;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
}

?>
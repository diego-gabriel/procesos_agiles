<?php
require_once 'Usuario.php';

class Estudiante extends Usuario{
	use accesoAPropiedades;

	public function __construct($id = -1){
		parent::__construct(Usuario::ESTUDIANTE, $id);
	}
	
	
}

?>
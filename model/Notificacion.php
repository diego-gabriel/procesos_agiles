<?php 
require_once 'data/Connection.php';
require_once 'ObjetoPersistente.php';
require_once 'Usuario.php';

class Notificacion extends ObjetoPersistente{
	use accesoAPropiedades;
	
	private $usuario_id;
	private $enlace;
	private $mensaje;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->usuario_id = $aRow['usuario_id'];
		$this->mensaje 	  = $aRow['mensaje'];
		$this->enlace 	  = $aRow['enlace'];
	}
	
	public function setUsuario($usuario){	
		if ($usuario instanceof Usuario){
			$this->usuario_id = $usuario->getId();
		} else {
			$this->usuario_id = $usuario;
		}
	}
	
	public function setEnlace($enlace){
		$this->enlace = $enlace;
	}
	
	public function setMensaje($mensaje){
		$this->mensaje = $mensaje;
	}
	
	public function getUsuarioId(){
		return $this->usuario_id;
	}
	
	public function getEnlace(){
		return $this->enlace;
	}
	
	public function getMensaje(){
		return $this->mensaje;
	}
	
	protected function validar(){
		return true;
	}
	 public function getTable(){
	 	return 'notificaciones';
	 }
}

?>
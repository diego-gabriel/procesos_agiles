<?php

trait accesoAPropiedades{
	public function atributos(){
		return get_object_vars($this);
	}
	
}

?>
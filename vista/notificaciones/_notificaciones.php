<?php
	//$estudiantes debe estar definido antes de la llamada a este parcial
	
	foreach ($usuario->notificaciones() as $notificacion){
		include '_notificacion.php';
	}
	
?>
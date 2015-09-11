<?php
	//$estudiantes debe estar definido antes de la llamada a este parcial
	
	foreach ($estudiante->notificaciones() as $notificacion){
		include '_notificacion.php';
	}
	
?>
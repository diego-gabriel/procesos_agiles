<?php
	if (isset($_POST['name'])){
		//se ha entrado via POST
		//se va a crear la nueva tarea
		require 'crear.php';
	}
	else {
		//se ha entrado via GET
		//muesta el formulario de nueva tarea
		require '../vista/tareas/nueva.php';
	}
?>
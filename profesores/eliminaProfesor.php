<?php
	require_once '../model/Profesor.php';

	$conexion = Connection::getInstance();
	
	$profesor = new Profesor($_GET['id']);
	
	foreach($profesor->mostrarMaterias() as $materia){
		$materia->setProfesor(0);
		$materia->guardar();
	}
	
	$profesor->setEstado(Usuario::NO_HABILITADO);
	$profesor->guardar();
	
	$mensaje = "El profesor fue elimiando correctamente";
	echo "<script>alert('$mensaje'); window.location='../vista/administradores/verUsuarios.php';</script>";
?>
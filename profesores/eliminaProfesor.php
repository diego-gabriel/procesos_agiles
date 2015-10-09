<?php
	require_once '../model/Profesor.php';

	$conexion = Connection::getInstance();
	
	$profesor = new Profesor($_GET['id']);
	
	$profesor->setEstado(Usuario::NO_HABILITADO);
	$profesor->guardar();
	
	$mensaje = "El profesor fue elimiando correctamente";
	echo "<script>alert('$mensaje'); window.location='../vista/administradores/verUsuarios.php';</script>";
?>
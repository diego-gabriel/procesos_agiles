<?php
	require_once '../model/data/Connection.php';
	$conexion = Connection::getInstance();
	
	$id = $_GET['id'];
	$consultaMateria = "update materias set profesor_id = 0 where id = (select id from materias where profesor_id = '$id')";
	$consultaTarea = "update tareas set profesor_id = 0 where id = (select id from tareas where profesor_id = '$id')";
	$consulta = "delete from usuarios where id = '$id'";
	$conexion->query($consultaMateria);
	$conexion->query($consultaTarea);
	$conexion->query($consulta);
	$mensaje = "El profesor fue elimiando correctamente";
	echo "<script>alert('$mensaje'); window.location='../vista/administradores/verUsuarios.php';</script>";
?>
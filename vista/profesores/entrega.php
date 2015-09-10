<?php
	session_start();
	require_once "../../model/Tarea.php";
	require_once "../../model/Estudiante.php";
	require_once "../../model/Profesor.php";
	require_once "../../controlador/validacionDeAcceso.php";
	
	$profesor 	= new Profesor($_SESSION['usuario_id']);
	validar_permisos($profesor, Usuario::PROFESOR);
	$tarea 		= new Tarea($_GET['t_id']);
	$estudiante = new Estudiante($_GET['e_id']);
	$entrega	= $estudiante->entrega($tarea);
	
	$_SESSION['ultimo_sitio'] = $_SERVER['REQUEST_URI'];
?>

<h1>Entrega de la tarea: <?=$tarea->getNombre()?></h1>
<h2>Estudiante: <?=$estudiante->nombreCompleto()?></h2>
<h3>Detalled de la tarea:</h3>

<? require "_tarea.php" ?>

<a target='_blank' href="<?=$entrega->getArchivo()?>">Descargar tarea entregada</a>
<br>
<? require "_comentarios.php" ?>
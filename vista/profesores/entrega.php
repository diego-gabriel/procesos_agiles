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
<?require 'head.php'?>
<br><br><br>
<div class="container">
<table class="table table-striped table-hover table-bordered table-condensed">
	<tr class="info"> 
		<th><h2><b>Entrega de la tarea:</b> <?=$tarea->getNombre()?></h2></th>
	</tr>
		<td><h4><b>Estudiante : </b> <?=$estudiante->nombreCompleto()?></h4>
		<h4><b>Detalles de la tarea : </b> <? require "_tarea.php" ?></h4>

<a target='_blank' href="<?=$entrega->getArchivo()?>">Descargar tarea entregada</a></td>

</table>
</div>
<br>
<? require "_comentarios.php" ?>


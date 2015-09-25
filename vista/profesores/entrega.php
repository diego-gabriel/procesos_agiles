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
		 <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
<br><br><br>
<div class="container">
<table class="table table-striped table-hover table-bordered table-condensed">
	<tr class="info"> 
		<th><font color="blue"><h2><b>Entrega de la tarea:</b></font> <?=$tarea->getNombre()?></h2></th>
	</tr>
		<td><h4><b>Estudiante : </b> <?=$estudiante->nombreCompleto()?></h4>
		<font color="blue"><h4><b> DETALLES DE LA TAREA  </b></font><br><br> <? require "_tarea.php" ?></h4>

<a target='_blank' href="<?=$entrega->getArchivo()?>">Descargar tarea entregada</a></td>

</table>
</div>
<br>
<? require "_comentarios.php" ?>


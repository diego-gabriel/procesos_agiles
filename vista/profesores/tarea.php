<?php
	session_start();
	require_once '../../model/Tarea.php';
	require_once '../../model/Profesor.php';
	require_once '../../model/Estudiante.php';
	require_once '../../model/Usuario.php';
	require_once '../../controlador/validacionDeAcceso.php';
	
	$profesor = new Profesor($_SESSION['usuario_id']);
	validar_permisos($profesor, Usuario::PROFESOR);
	$tarea = new Tarea($_GET['id']);
	$materia = $tarea->getMateria();
?>
<title>ENTREGAS</title>

<?require 'head.php'?>
<head>
 	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
 </head>
        <br><br><br><br>

<div class="container">
<table class="table table-striped table-hover table-bordered table-condensed">
		<tr class="info">
			<th><h1>Tarea: <?=$tarea->getNombre()?></h1></th>
		</tr>
		<tr>
			<td><?require '_tarea.php'?></td>
		</tr>
</table>
	<center><h2>Entregas</h2></center>
<table class="table table-striped table-hover table-bordered table-condensed">
	<?php
		$id = 1;
	?>
	<tr class="info">
		<th>nro</th>
		<th>Estudiante</th>
		<th>Estado</th>
		<th>Entrega</th>
	</tr>
	
	<?php
		foreach($profesor->estudiantes($materia) as $estudiante){
			require "_entregasTarea.php";
		}
	?>
</table>
</div>
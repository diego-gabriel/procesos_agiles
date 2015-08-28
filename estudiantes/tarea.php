<?php
	session_start();
	require_once "../model/Estudiante.php";
	require_once "../model/Tarea.php";
	require_once "../model/Entrega.php";
	require_once "../controlador/validacionDeAcceso.php";
	
	$estudiante = new Estudiante($_SESSION['usuario_id']);
	
	validar_permisos($estudiante, Usuario::ESTUDIANTE);
	
	$tarea 		= new Tarea($_GET['id']);
	if (isset($_FILES['archivo'])){
		require_once "../controlador/manejadorDeArchivos.php";
		$archivo = recibirArchivo($estudiante, $tarea);
		
		if ($archivo != null){
			$entrega = new Entrega();
			$entrega->setUsuarioId($estudiante->getId());
			$entrega->setTareaId($tarea->getId());
			$entrega->setArchivo($archivo);
			$entrega->guardar();
		} else {
			$entrega = null;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		
        <body style="background:#F0F8FF">
        <meta charset="UTF-8">
        
        <title>Tarea: <?=$tarea->getNombre()?></title>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="/dist/bootstrap-clockpicker.min.css">
	    <link rel="stylesheet" type="text/css" href="/assets/css/github.min.css">
	    <link rel="stylesheet" href="/css/bootstrap.css">
	    <link rel="stylesheet" href="/css/datepicker.css">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top header" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand color1" href="../estudiantes/inicio.php">Inicio</a>
            </div>
        </nav>
		<br><br>
		<?php
			if (isset($entrega)){
		?>
			<div id = "notificacion entrega">
				<p> <?=$entrega == null ? "Ocurrio un error al entregar su tarea. 
					Por favor intente nuevamente." : "Su tarea ha sido entregada 
					con exito"?></p>
			</div>
		<?php
			}
		?><br><br><br>
		<div class="container">
	<table class="table table-striped table-bordered table-condensed ">
			<tr class="info">
				
				<th><font face="courier" color="blue">	<h1><b>Tarea:</b> <?=$tarea->getNombre()?></h1> </font></th>
 			</tr>
 		<tr>
 			
        <td><font face="courier" color="black">	<p><b>Estado: </b> <?=$estudiante->estadoDe($tarea)?></p>
		<p><b>Publicada en:</b> <?=$tarea->getFechaInicio()->mostrar()?></p>
		<p><b>Fecha limite de entrega:</b> <?=$tarea->getFechaEntrega()->mostrar()?></p>
		<p><b>Descripcion:</b> <i> <?=$tarea->getDescripcion()?></i></p>
		</font>
		</td>
		</tr>
	</table>
	</div>
		<?php
			if ($estudiante->estadoDe($tarea) == Tarea::PENDIENTE){
				require "_entrega.php";
			} else {
				if ($estudiante->estadoDe($tarea) == Tarea::ENTREGADA){
		?>
					<p><a href = '<?=$estudiante->archivoDe($tarea)?>'> Ver tarea entregada </a></p>
		<?php
				}
			}
		?>
		<br> <br>
		<a href="/estudiantes/tareas.php"> Volver</a>
	</body>
</html>
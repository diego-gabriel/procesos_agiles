<?php
	session_start();
	require_once "../model/Estudiante.php";
	require_once "../model/Tarea.php";
	require_once "../model/Entrega.php";
	require_once "../model/Notificacion.php";
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
			
			$notificacion = new Notificacion();
			$notificacion->setUsuario($tarea->getProfesor());
			$notificacion->setMensaje($estudiante->nombreCompleto()." ha entregado la tarea: ".$tarea->getNombre());
			$notificacion->setEnlace("/vista/profesores/entrega.php?t_id=".$tarea->getId()."&e_id=".$estudiante->getId());
			$notificacion->guardar();	
		} else {
			$entrega = null;
		}
	}
?>
<!DOCTYPE html>
<?require 'head.php'?>
<html>
	<head>
		
       
      
        
        <title>Tarea: <?=$tarea->getNombre()?></title>
	   
	   	<link rel="stylesheet" href="../../css/bootstrap.css">
		
	    <link rel="stylesheet" href="/css/datepicker.css">
	    
		<br><br>
		<br>
		<div class="container">
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
		?>
	<table class="table table-striped table-bordered table-condensed ">
			<tr class="info">
				
				<th><font face="courier" color="blue"><h1><b>Tarea:</b> <?=$tarea->getNombre()?></h1> </font></th>
 			</tr>
 		<tr>
 			
        <td><font face="courier" color="black">	<p><b>Estado: </b> <?=$estudiante->estadoDe($tarea)?></p>
		<p><b>Publicada en:</b> <?=$tarea->getFechaInicio()->mostrar()?></p>
		<p><b>Fecha limite de entrega:</b> <?=$tarea->getFechaEntrega()->mostrar()?></p>
		<p><b>Descripcion:</b> <i> <?=$tarea->getDescripcion()?></i></p>
		
	</div>
		<?php
			if ($estudiante->estadoDe($tarea) == Tarea::PENDIENTE){
				require "_entrega.php";
			} else {
				if ($estudiante->estadoDe($tarea) == Tarea::ENTREGADA){
		?>
					<p><a href = '<?=$estudiante->archivoDe($tarea)?>'> Ver tarea entregada </a></p>
					
		<?php
					$entrega = $estudiante->entrega($tarea);
					require "../vista/comentarios/_index.php";
				}
			}
		?>
		</font>
		</td>
		</tr>
	</table>
		<br> <br>
		<center> <a href="/estudiantes/tareas.php"><button class="btn btn-primary glyphicon glyphicon-arrow-left"> Volver</button></button></a></center>
		
	</body>
</html>
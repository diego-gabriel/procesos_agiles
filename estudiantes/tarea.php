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
		
       
        <meta charset="UTF-8">
        
        <title>Tarea: <?=$tarea->getNombre()?></title>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="/dist/bootstrap-clockpicker.min.css">
	    <link rel="stylesheet" type="text/css" href="/assets/css/github.min.css">
	   	<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/estilos.css">
	    <link rel="stylesheet" href="/css/datepicker.css">
	    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/reloj.js"></script>
	    <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	</head>
	<body style="background:#F0F8FF">
		 <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
                      <span class="sr-only">Toggle Navigation</span>  
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">MENU</a>
                </div>
                <div class="collapse navbar-collapse" id="acolapsar" >
                        <ul class="nav navbar-nav" <ul style="float:right;">
                        <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                            <li><a href="inicio.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                          </ul>
                    </div>
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
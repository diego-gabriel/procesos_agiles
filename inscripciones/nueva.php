<?php
session_start();
require_once "../model/Estudiante.php";
require_once "../model/Profesor.php";
require_once '../model/Materia.php';
require_once '../model/Grupo.php';
if (isset($_SESSION['usuario_id'])){
    $estudiante = new Estudiante($_SESSION['usuario_id']);
} else {
    header("Location: /index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inscripcion</title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
         <script type="text/javascript" src="/js/reloj.js"></script>
         <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="../js/mostrarGrupos.js"></script>
         <script type="text/javascript" src="../js/validacionCambioSelect.js"></script>
         <link rel="stylesheet" href="../css/estilos.css">
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
                    <a class="navbar-brand" href="../estudiantes/inicio.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a>
                    
                </div>
                <div class="collapse navbar-collapse" id="acolapsar" >
                         <ul class="nav navbar-nav" <ul style="float:right;">>
                             <li> <a>Estudiante: <?=$estudiante->nombreCompleto()?><br></a> </li>
                             <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                        </ul>
                    </div>
                
            </div>
        </nav>
        <div class="container">
            <form action = '/inscripciones/crear.php' method = 'POST'>
                <font face="courier" color="blue">
                    <h1><b>Materias Habilitadas</b></h1>
                </font>
                
                <div class="form-group ">
            	    <div class="input-group col-xs-12 col-sm-6">
            	        <span class="input-group-addon">Seleccione la materia:</span>
            	        <select class="selectpicker form-control" data-live-search="true" name="materia" id="materia" onChange="valida()">
            	        	<option selected>Seleccione una opcion</option>
            	        	<?php
            	        	    $materiasHabilitadas = false;
            	        		foreach($estudiante->materiasHabilitadas() as $materia){
            	        		    $materiasHabilitadas = true;
                   			?>
            	        	<option value="<?=$materia->getId()?>"><?=$materia->getNombre()?></option>
            	        	<?php
            	        		}
            	        	?>
            	        </select>
            	    </div>
            	</div>
            	<div class="form-group ">
            	    <div class="input-group col-xs-12 col-sm-6">
            	        <span class="input-group-addon">Seleccione el Grupo:</span>
            	        <select class="selectpicker form-control" data-live-search="true" name="grupo" id="grupo">
            	        	
            	        </select>
            	    </div>
            	</div>
            	<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon">Codigo de la Materia:</span>
    					<input required type="text" class="form-control" name="codigoMateria" id="codigoMateria" placeholder="Escriba el codigo de la materia">
                    </div>
            	</div>
            	<?php
            	    if (!$materiasHabilitadas){
            	?>
                <p><i>Usted no tiene materias habilitadas para su inscripcion</i></p>
            	<?php
            	    }
            	?>
                
                <input type="submit" id = "boton" name="boton" value="Inscribirse" disabled class = "btn btn-info<?= ($materiasHabilitadas ? '' : 'disabled') ?> "/>
            </form>
            <font face="courier" color="green">
        	<h1><b>Materias Inscritas</b></h1>
        	</font>
            <table class="table table-striped table-hover table-bordered table-condensed">
            <tr class="info">
                <th>Materias Inscritas</th>
                <th>Profesor</th>
                <th>Grupo</th>
            </tr>
            
            <?php
            $bandera = false;
            foreach($estudiante->materias() as $materia){
                $bandera = true;
                $profesorEstudiante = $estudiante->profesor($materia->getId());
                $grupoEstudiante    = $estudiante->grupo($materia->getId());
           	?>
               	<tr>
                   	<td><?=$materia->getNombre()?></td>
                   	<td><?=$profesorEstudiante->nombreCompleto()?></td>
                   	<td><?=$grupoEstudiante->getCodigo()?></td>
               	</tr>
            <?php
            } 
        	?>
        	 </table>
        	<?php
        	    if (!$bandera){
        	?>
            <p><i>Usted no esta inscrito en nunguna materia</i></p>
        	<?php
        	    }
        	?>
        	
        	
            <a href="/estudiantes/inicio.php"><button class="btn btn-info">volver a inicio</button></a>
        </div>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="../../assets/js/jquery.js"></script>
    </body>
</html>
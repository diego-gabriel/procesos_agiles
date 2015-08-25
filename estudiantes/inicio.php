<?php
session_start();
require_once "../model/Estudiante.php";
if (isset($_SESSION['usuario_id'])){
    $estudiante = new Estudiante($_SESSION['usuario_id']);
} else {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <body style="background:#F0F8FF">
        <meta charset="UTF-8">
        <title>Tareas Registradas</title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
    </head>
    <body>
       <div class="container" style="text-align:center;">
        	
        	<br>
            <font FACE="courier"  color="blue">
  			 <h1><b>MENU PRINCIPAL</b></h1>
  			 <p><b>Bienvenido: </b><i><?=$estudiante->getNombreUsuario()?></i></p>
			</font>
            </br>
            <a href="/inscripciones/nueva.php"><button class="btn btn-primary glyphicon glyphicon-check">    Inscribirse      </button></a>
            <a href="/vista/tareas/subirArchivo.php"><button class="btn btn-primary glyphicon glyphicon-open" class="glyphicon glyphicon-open">   Subir Tarea       </button></a>
            <a href="tareas.php"><button class="btn btn-primary glyphicon glyphicon-file ">     Ver Tareas      </button></a>
            <a href="../../index.php"><button class="btn btn-primary glyphicon glyphicon-remove-circle"> Cerrar sesion </button></a>
        	<br>
        	

        	<img  src="../../imagenes/agiles.jpg" alt="portadaInicio" class="img-thumbnail" width="700" height="700">
        </div>
    </body>
</html>









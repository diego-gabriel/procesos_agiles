<?php
session_start();
require_once "../model/Estudiante.php";
if (isset($_SESSION['usuario_id'])){
    $estudiante = new Estudiante($_SESSION['usuario_id']);
    $usuario = $estudiante;
} else {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
      <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
    <?require 'head.php'?>
       <div class="container" style="text-align:center;">
        	
        	<br>
            <font FACE="courier"  color="blue">
  			 <h1><b>MENU PRINCIPAL</b></h1>
  			 <p><b>Bienvenido: </b><i><?=$estudiante->getNombreUsuario()?></i></p>
			</font>
            </br>
            <a href="/inscripciones/nueva.php"><button class="btn btn-primary glyphicon glyphicon-check">    Inscribirse      </button></a>
            <a href="tareas.php"><button class="btn btn-primary glyphicon glyphicon-file ">     Ver Tareas      </button></a>
            <a href="../../index.php"><button class="btn btn-primary glyphicon glyphicon-remove-circle"> Cerrar sesion </button></a>
        	<br><br><br>
        	   
            <? require "../vista/notificaciones/_notificaciones.php" ?>

        	<img  src="../../imagenes/agiles.jpg" alt="portadaInicio" class="img-thumbnail" width="700" height="700">
        </div>
    </body>
</html>









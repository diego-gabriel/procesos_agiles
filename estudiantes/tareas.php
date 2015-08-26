<?php
session_start();
require_once "../model/Estudiante.php";
require_once "../model/Timestamp.php";
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
        <title>Tareas de <?=$estudiante->getNombreUsuario()?></title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
    </head>
    <body>
        <div class="container">
            <font FACE="courier" color="blue">
            <h1><center><b>Lista de Tareas de: </b> <?=$estudiante->getNombreUsuario()?></center></h1>
            </font>
            <center>Fecha y hora del servidor: <?=Timestamp::ahora()->mostrar()?></center> <br>
            <table class="table table-striped table-hover table-bordered table-condensed">
            <tr class="info">
               
                <th> <center>Nombre</center></th>
                <th> <center>Fecha de Inicio</center></th>
                <th> <center>fecha de Entrega </center></th>
                <th> <center>Materia</center></th>
                <th> <center>Descripcion</center></th>
                <th> <center>Estado</center></th>
            </tr>
            <?php 
                require_once '../model/Tarea.php';
                $ver_entrega = true;
                foreach(Tarea::all() as $tarea){ 
                    if ($tarea->getEstado() == Tarea::VISIBLE)
                        require "../vista/tareas/_lineaTarea.php";
                }
            ?> 
            </table>
            <a href="inicio.php"><button class="btn btn-primary glyphicon glyphicon-arrow-left"> Volver</button></button></a>
        </div>
    </body>
</html>


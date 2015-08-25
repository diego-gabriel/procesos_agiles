<?php
    session_start();
    require_once "../../model/Profesor.php";
    if (isset($_SESSION['usuario_id'])){
        $profesor = new Profesor($_SESSION['usuario_id']);
    } else {
        header("Location: /index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tareas Registradas</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/estilos.css">
        <link rel="stylesheet" type="text/css" href="../../librerias/font-awesome/css/font-awesome.css">
    </head>
    <body style="background:#F0F8FF">
        <nav class="navbar navbar-default navbar-fixed-top header" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand color1" href="vistaPrincipal.php">Inicio</a>
            </div>
        </nav>
        <br><br><br>
        <div class="container">
            <font face="courier" color="blue">
            <h1><center>Lista de Tareas registradas</center></h1>
            <br><br>
            </font>
            <table class="table table-striped table-hover table-bordered table-condensed">
            <tr class="info">
                <th>Nombre</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Entrega</th>
                <th>Materia</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php
                $tareas = $profesor->mostrarTareas();
                foreach($tareas as $tarea){
               	    require "../tareas/_lineaModificar.php";
                }
            ?> 
            </table>
            <a href="../tareas/nueva.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nueva Tarea</button></a>
        </div>
    </body>
</html>
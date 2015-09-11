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
    
        <title>Tareas Registradas</title>
        <body>
             <?require 'nav.php'?>
        
        <br>
        <div class="container">
            <font face="courier"color="blue">
            <h1><center><b>Lista de Tareas registradas</b></center></h1>
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
               	    require "_lineaTarea.php";
                }
            ?> 
            </table>
            <a href="../tareas/nueva.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nueva Tarea</button></a>
        </div>
    </body>
</html>
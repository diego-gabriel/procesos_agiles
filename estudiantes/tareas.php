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
        <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
        <title>Lista de Materias</title>
        <?require 'head.php'?>
        <br>
        <div class="container">
            <font FACE="courier" color="blue">
                <h1><center><b>Lista de Tareas</b></center></h1>
            </font>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-condensed">
                    <tr class="info">
                        <th> <center>Nombre</center></th>
                        <th> <center>Fecha de Inicio</center></th>
                        <th> <center>Fecha de Entrega </center></th>
                        <th> <center>Materia</center></th>
                        <th> <center>Descripcion</center></th>
                        <th> <center>Estado</center></th>
                    </tr>
                    <?php 
                        require_once '../model/Tarea.php';
                        require_once '../model/Inscripcion.php';
                        
                        $ver_entrega = true;
                        foreach($estudiante->tareas() as $tarea){
                            if ($tarea->getEstado() == Tarea::VISIBLE)
                                require "../vista/tareas/_lineaTarea.php";
                        }
                    ?> 
                </table>
            </div>
            <a href="inicio.php"><button class="btn btn-primary glyphicon glyphicon-arrow-left"> Volver</button></button></a>
        </div>
    </body>
</html>


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
        <div class="container">
            <font face="courier" color="blue">
            <h1><center><b>Lista de Tareas registradas</b></center></h1>
            </font>
            <table class="table table-striped table-hover table-bordered table-condensed">
            <tr class="info">
                <th><center>Nombre</center></th>
                <th><center>Fecha de Inicio</center></th>
                <th><center>fecha de Entrega</center></th>
                <th><center>Materia</center></th>
                <th><center>Descripcion</center></th>
            </tr>
            <?php 
                require_once '../../model/Tarea.php';
                foreach(Tarea::all() as $tarea){ 
                require "_lineaTarea.php";
                }
            ?> 
            </table>
            <a href="nueva.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nueva Tarea</button></a>
        </div>
    </body>
</html>









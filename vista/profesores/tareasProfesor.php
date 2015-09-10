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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/js/reloj.js"></script>
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
                        <ul class="nav navbar-nav" <ul style="float:right;">>
                        <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                            <li><a href="../administradores/index.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                              
                        </ul>
                    </div>
                
            </div>
        </nav>
        <br><br><br>
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
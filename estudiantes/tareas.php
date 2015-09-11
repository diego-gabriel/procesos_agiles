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
    	<meta charset="UTF-8">
        <title>Lista de Materias</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/estilos.css">
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
                    <a href="#" class="navbar-brand">MENU</a>
                    
                </div>
                <div class="collapse navbar-collapse" id="acolapsar" >
                         <ul class="nav navbar-nav" <ul style="float:right;">>
                        <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                            <li><a href="inicio.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                              
                        </ul>
                    </div>
                
            </div>
        </nav>
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
                            if ($tarea->getEstado == Tarea::VISIBLE)
                                require "../vista/tareas/_lineaTarea.php";
                        }
                    ?> 
                </table>
            </div>
            <a href="inicio.php"><button class="btn btn-primary glyphicon glyphicon-arrow-left"> Volver</button></button></a>
        </div>
    </body>
</html>


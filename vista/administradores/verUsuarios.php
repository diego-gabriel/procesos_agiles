<?php
    session_start();
    require_once "../../model/Administrador.php";
    if (isset($_SESSION['usuario_id'])){
        $administrador = new Administrador($_SESSION['usuario_id']);
    } else {
        header("Location: /index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Registro de Materia</title>
    	<meta charset="utf-8">
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
        <div class="container">
            <font face="courier" color="blue">
            <h1><center><b>Profesores Registrados</b></center></h1>
            </font>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-condensed">
                    <tr class="info">
                        <th><center>Nombre de Usuario</center></th>
                        <th><center>Nombre</center></th>
                        <th><center>Apellido</center></th>
                        <th><center>Telefono</center></th>
                        <th><center>Correo</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                    <?php
		            	require_once '../../model/Profesor.php';
		                foreach(Profesor::all() as $profesor){
		               	    require "_lineaProfesor.php";
		                }
		            ?>
                </table>
            </div>
            <a href="crearUsuario.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nuevo Usuario</button></a>
        </div>
    </body>
</html>

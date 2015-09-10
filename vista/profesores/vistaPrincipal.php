<?php
session_start();
require_once "../../model/Profesor.php";
if (isset($_SESSION['usuario_id'])){
    $estudiante = new Profesor($_SESSION['usuario_id']);
} else {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
           <!-- <body background="../../imagenes/fondo3.jpg" bgcolor="FFCECB"> --> 

        <body style="background:#F0F8FF">
        <meta charset="UTF-8">
        
        <title>Pagina Profesor</title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
         <link rel="stylesheet" href="../../css/estilos.css">
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
         <script type="text/javascript" src="/js/reloj.js"></script>
         <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	
         
    </head>
    <body >
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
                            <li><a href="vistaPrincipal.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                              
                        </ul>
             </div>
        </nav>
        <br><br>
      <div class="container">
          <br><center> 
  			 <h1 id="titulo"><b>MENU PRINCIPAL PROFESOR</b></h1>
  			 <p><b>Bienvenido: </b><i><?=$estudiante->getNombreUsuario()?></i></p>
  			</center></br>
  			</div>
            <style type="text/css">
                
                 #absoluto {
                position:absolute;
                left: 500px;
                top :210px;
                }
                 #titulo {
              font-weight: bold;
              font-size: 36px;
              font-family: "courier";
              text-shadow: 0 1px 0 #ccc, 
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
              color:blue;
              text-align: center;
}
        
               
                
            </style>
            
            <div class="content" align="left" style="padding: 50px 100px">
                
                    
                     
                    <a href="../tareas/nueva.php"><button class="btn btn-info glyphicon glyphicon-open">  Crear Tarea</button></a> <br><br><br><br>
                      
                    <a href="tareasProfesor.php"><button class="btn btn-info glyphicon glyphicon-file"> Ver tareas   </button></a> <br> <br><br><br>
                  
                    <a href="../../index.php"><button class="btn btn-info glyphicon glyphicon-remove"> Cerrar sesion </button></a> 
                   
                  <div id="absoluto"> <img  class="img-responsive" alt="Imagen responsive" src="../../imagenes/calendario.png" width="500" height="500">  </div>
                   
                     
            </div>
           
            
        
        
            
                
        	
    
    </body>
</html>
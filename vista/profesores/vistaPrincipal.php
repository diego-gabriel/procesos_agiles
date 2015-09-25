<?php
session_start();
require_once "../../model/Profesor.php";
if (isset($_SESSION['usuario_id'])){
    $profesor = new Profesor($_SESSION['usuario_id']);
    $usuario = $profesor;
} else {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
         
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
         <script type="text/javascript" src="/js/reloj.js"></script>
         <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="../../css/jquery1-10.css" />
	    <script src="../../dist/jquery-datepicker.js"></script>
    	
 
 <title>MENU PROFESOR</title>

    <body >
       <?require 'head.php'?>
       
        <ul style="float:right;" id="mensaje"> <b><? require "../notificaciones/_notificaciones.php" ?></b></ul>
        <div class="container">
          <br><center> 
  			 <h1 id="titulo"><b>MENU PRINCIPAL PROFESOR</b></h1>
  			 
  			</center>
  			
  			</div>
            <style type="text/css">
                
                 #absoluto {
                position:absolute;
                left: 450px;
                top :210px;
                }
                #mensaje{
                  color: #045FB4;
text-shadow: 0px 0px 8px #045FB4;
font-size: 14px;
font-family: 'Orbitron', sans-serif;
                    
                    
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
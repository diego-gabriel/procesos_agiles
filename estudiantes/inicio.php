<?php
session_start();
require_once "../model/Estudiante.php";
if (isset($_SESSION['usuario_id'])){
    $estudiante = new Estudiante($_SESSION['usuario_id']);
    $usuario = $estudiante;
} else {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
 <style type="text/css">
             #mensaje{
                  color: #045FB4;
                  text-shadow: 0px 0px 8px #045FB4;
                  font-size: 14px;
                  font-family: 'Orbitron', sans-serif;
                    
                    
                }
                
 </style>

      <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
    <?require 'head.php'?>
      <ul style="float:right;" id="mensaje"> <b><? require "../vista/notificaciones/_notificaciones.php" ?></b></ul>
       <div class="container" style="text-align:center;">
        	
            <font FACE="courier"  color="blue">
  			 <h1 id=""><b>MENU PRINCIPAL</b></h1>
  			 
			</font>
            </br>
            <a href="/inscripciones/nueva.php"><button class="btn btn-primary glyphicon glyphicon-check">    Inscribirse      </button></a>
            <a href="tareas.php"><button class="btn btn-primary glyphicon glyphicon-file ">     Ver Tareas      </button></a>
            <a href="../../index.php"><button class="btn btn-primary glyphicon glyphicon-remove-circle"> Cerrar sesion </button></a>
        	<br><br><br>
        	 <center>  
           
            <div id = 'calendario'></div>
            </center>
            <script type="text/javascript" src="/js/calendario.js"></script>
            <?php require "_cargarTareas.php"; ?>
        </div>            
    </body>            
</html>          









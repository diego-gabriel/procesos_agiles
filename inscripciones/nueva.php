<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <body style="background:#F0F8FF">
        <meta charset="UTF-8">
        <title>Inscripcion</title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
         <script type="text/javascript" src="/js/reloj.js"></script>
         <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    </head>
    <body>
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
                            <li><a href="../estudiantes/inicio.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                              
                        </ul>
                    </div>
                
            </div>
        </nav>
        <div class="container">
            <?php 
            require_once '../model/Materia.php';
            require_once '../model/Estudiante.php';
            $estudiante = new Estudiante($_SESSION['usuario_id']);
            ?>
            
            
  			 
            
            <form action = '/inscripciones/crear.php' method = 'POST'>
               <font face="courier" color="blue">
                <h1><b>Materias Habilitadas</b></h1>
                </font>
                <table class="table table-striped table-hover table-bordered table-condensed">
                <tr class="info">
                    <th>Materias Habilitadas</th>
                </tr>
                
                <?php
                $materiasHabilitadas = false;
                foreach($estudiante->materiasHabilitadas() as $materia){ 
                    $materiasHabilitadas = true;
                ?>
                   	<tr>
                       	<td> <input type="checkbox" name="materia[]" id = 'materias' value="<?=$materia->getId()?>"> <?=$materia->getNombre()?></td>
                   	</tr>
                <?php
                } 
            	?>
            	 </table>
            	 
            	 
            	<?php
            	    if (!$materiasHabilitadas){
            	?>
                <p><i>Usted no tiene materias habilitadas para su inscripcion</i></p>
            	<?php
            	    }
            	?>
                
                <input type="submit" value="Inscribirse" class = "btn btn-info  <?= ($materiasHabilitadas ? '' : 'disabled') ?> "/>
            </form>
            <font face="courier" color="green">
        	<h1><b>Materias Inscritas</b></h1>
        	</font>
            <table class="table table-striped table-hover table-bordered table-condensed">
            <tr class="info">
                <th>Materias Inscritas</th>
            </tr>
            
            <?php
            $bandera = false;
            foreach($estudiante->materias() as $materia){
                $bandera = true;
           	?>
               	<tr>
                   	<td><?=$materia->getNombre()?></td>
               	</tr>
            <?php
            } 
        	?>
        	 </table>
        	<?php
        	    if (!$bandera){
        	?>
            <p><i>Usted no esta inscrito en nunguna materia</i></p>
        	<?php
        	    }
        	?>
        	
        	
            <a href="/estudiantes/inicio.php"><button class="btn btn-info">volver a inicio</button></a>
        </div>
    </body>
</html>
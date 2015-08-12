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
    </head>
    <body>
        <div class="container">
            <?php 
            require_once '../../model/Materia.php';
            require_once '../../model/Estudiante.php';
            $estudiante = new Estudiante(1);
            ?>
            <form action = '../../inscripciones/nueva.php' method = 'POST'>
                <h1>Materias Habilitadas</h1>
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
                
                <input type="submit" value="Inscribirse" class = "btn btn-info <?= ($materiasHabilitadas ? '' : 'disabled') ?>"/>
            </form>
            
        	<h1>Materias Inscritas</h1>
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
        	
        	
            <a href="index.php"><button class="btn btn-info">volver a inicio</button></a>
        </div>
    </body>
</html>
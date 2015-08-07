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
            <h1>Materias Habilitadas</h1>
            <table class="table table-striped table-hover table-bordered table-condensed">
            <tr class="info">
                
                <th>Materias</th>
                
            </tr>
            <tr>
                <?php 
                require_once '../../model/Materia.php';
                ?>
                
                <?php
              foreach(Materia::allMaterias() as $materia){ 
               	?>
                <td> <input type="checkbox" name="materia" id = 'materias' value="<?=$materia->getId()?>"> <?=$materia->getNombre()?></td>
            
            
                <?php
                } 
            	?> 
            </tr>
            
            </table>
            <a href="index.php"><button class="btn btn-info">volver a inicio</button></a>
            <a href="nueva.php"><button class="btn btn-info">Inscribirse</button></a>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
	<html lang="en">
    <head>
        <body style="background:#F0F8FF">
        <meta charset="UTF-8">
        <title>Subir Tareas</title>
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
            <br> 
            <a href="#ventana1" class="btn btn-primary btn-lg" data-toggle="modal">subir tareas</a>
            <div class="modal fade" id="ventana1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Subir Archivo </h4>
                        </div>
                        <div class="modal-body"><!--contenido-->
                            
                            <form role="form">
                            <div class="container">
  			                	<input type="file" id="archivo">
    			                <p class="help-block">solo es admitido formatos .pdf y .zip</p>
  			                    <button type="submit" name= "boton" class="btn btn-info">Subir Trabajo</button>
  			               </div>
  		
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
                             <button type="button" class="btn btn-primary" >subir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    	<script src="../../js/jquery.min.js"></script>
	    <script src="../../js/bootstrap.js"></script>
    
        	<?php
        
  			$formatos = array('.pdf','.doc','.zip');
  			
  			?>
		</form>
    </body>

</html>
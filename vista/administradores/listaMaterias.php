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
   <?require'head.php'?>
       <script type="text/javascript" src="/js/tablesorter.js"></script>
        <title>Lista de Materias</title>
        
        <div class="container">
            <font face="courier" color="blue">
    			<center><h1><b> Materia Registradas</b></h1></center>
            </font>
            
            <br>
            <div class="table-responsive">
	            <table id="materias" class="sortable table table-striped table-hover table-bordered table-condensed">
		            <thead>
    		            <tr class="info">
    		                <th>Nombre</th>
    		                <th>Codigo</th>
    		                <th>Descripcion</th>
    		                <th>Area</th>
    		                <th>Acciones</th>
    		            </tr>
		            </thead>
		            <tbody>
		            <?php
		            	require_once '../../model/Materia.php';
		                foreach(Materia::all() as $materia){
		               	    require "_lineaMateria.php";
		                }
		            ?> 
		            </tbody>
		            
	            </table>
            </div>
            <a href="registroMateria.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nueva Materia</button></a>
        </div>
    </body>
</html>
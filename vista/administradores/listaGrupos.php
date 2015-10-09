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
        <title>Lista de Grupos</title>
        
        <div class="container">
            <font face="courier" color="blue">
    			<center><h1><b> Grupos Registrados</b></h1></center>
            </font>
            <br>
            <div class="table-responsive">
	            <table class="table table-striped table-hover table-bordered table-condensed">
		            <tr class="info">
		                <th>Numero de Grupo</th>
		                <th>Profesor</th>
		                <th>Materia</th>
		                <th>Acciones</th>
		            </tr>
		            <?php
		            	require_once '../../model/Grupo.php';
		                foreach(Grupo::all() as $grupo){
		               	    require "_lineaGrupo.php";
		                }
		            ?> 
	            </table>
            </div>
            <a href="registroGrupo.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nueva Grupo</button></a>
        </div>
    </body>
</html>
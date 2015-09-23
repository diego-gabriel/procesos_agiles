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
    	<title>Registro de Materia</title>
        <script type="text/javascript" src="../../js/eliminaUsuario.js"></script>
   
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
                        <th COLSPAN="2"><center>Acciones</center></th>
                    </tr>
                    <?php
		            	require_once '../../model/Profesor.php';
		                foreach(Profesor::all() as $profesor){
		               	    require "_lineaProfesor.php";
		                }
		            ?>
                </table>
            </div>
            <a href="crearUsuario.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nuevo Profesor</button></a>
        </div>
    </body>
</html>

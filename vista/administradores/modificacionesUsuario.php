<?php
	session_start();
	require_once "../../model/Administrador.php";
	require_once "../../model/Profesor.php";
	if (isset($_SESSION['usuario_id'])){
	    $administrador = new Administrador($_SESSION['usuario_id']);
	    if (isset($_GET['id']))
	    	$profesor = new Profesor($_GET['id']);
	} else {
	    header("Location: /index.php");
	}
?>
<html>
	<?require'head.php'?>
    	<title>Actualizar Profesor</title>
    	
		<div class="container">
	        <font face="courier" color="blue">	
				<h1><b> Modificar Profesor</b></h1>
			</font>
			<br>
			<form method="post" name="Aceptar" action="../../profesores/modificar.php?id=<?=$_GET['id']?>">
				
				<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon"> Nombre de Usuario:</span>
    					<input required type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" pattern="^[a-zA-Z]{3}[a-zA-z0-9_\\_\ü]{0,9}$" value = "<?=$profesor->getNombreUsuario()?>" title="Minimo 3 caracteres y Maximo 12. Los primeros tres caracteres tienen que ser letras.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Contraseña:</span>
    					<input required type="password" class="form-control" name="contraseña" id="contraseña" pattern=".{5,}" value = "<?=$profesor->getContrasena()?>" title="Ingrese una contraseña segura. Debe tener como minimo 5 caracteres.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Repita su contraseña:</span>
    					<input required type="password" class="form-control" name="contraseña1" id="contraseña1" value = "<?=$profesor->getContrasena()?>" title="Escriba su contraseña nuevamente">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Nombre:</span>
    					<input required type="text" class="form-control" name="nombre" id="nombre" value = "<?=$profesor->getNombre()?>" pattern="[A-Z]{1}[a-záéíóú]{2,20}$" title="El nombre debe empezar con mayuscula.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Apellido:</span>
    					<input required type="text" class="form-control" name="apellido" id="apellido" value = "<?=$profesor->getApellido()?>" pattern="[A-Z]{1}[a-záéíóú]{2,20}$" title="El apellido debe empezar con mayuscula.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Telefono:</span>
    					<input required type="text" class="form-control" name="telefono" id="telefono" value = "<?=$profesor->getTelefono()?>" pattern="^(([4][0-9]{6,7})|([7|6][0-9]{7}))$" title="Ingrese solo números validos.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Correo:</span>
    					<input required type="text" class="form-control" name="correo" id="correo" value = "<?=$profesor->getCorreo()?>" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Ingrese un correo valido.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<input class="btn btn-primary glyphicon glyphicon-floppy-disk" type="submit" name="Aceptar" value="Guardar Cambios">
					<input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar" onClick="location.href='verUsuarios.php'">
				</div>	
			</form>
			
					
				
		</div>
		
	
		<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>
	
	</body>

</html>
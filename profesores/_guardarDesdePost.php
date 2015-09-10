<?php

	$nombreUsuario    = $_POST['nombreUsuario'];
	$contraseña       = $_POST['contraseña'];
	$nombre    		  = $_POST['nombre'];
	$apellido   	  = $_POST['apellido'];
	$telefono   	  = $_POST['telefono'];
	$correo       	  = $_POST['correo'];
	
	$profesor->setNombreUsuario($nombreUsuario);
	$profesor->setContrasena($contraseña);
	$profesor->setNombre($nombre);
	$profesor->setApellido($apellido);
	$profesor->setTelefono($telefono);
	$profesor->setCorreo($correo);

?>
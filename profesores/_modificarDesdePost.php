<?php
	$usuarioActual = $profesor->getNombreUsuario();

	$nombreUsuario    = $_POST['nombreUsuario'];
	$contraseña       = $_POST['contraseña'];
	$nombre    		  = $_POST['nombre'];
	$apellido   	  = $_POST['apellido'];
	$telefono   	  = $_POST['telefono'];
	$correo       	  = $_POST['correo'];
	
	if($usuarioActual === $nombreUsuario){
		$profesor->setContrasena($contraseña);
		$profesor->setNombre($nombre);
		$profesor->setApellido($apellido);
		$profesor->setTelefono($telefono);
		$profesor->setCorreo($correo);
	}else{
		$profesor->setNombreUsuario($nombreUsuario);
		$profesor->setContrasena($contraseña);
		$profesor->setNombre($nombre);
		$profesor->setApellido($apellido);
		$profesor->setTelefono($telefono);
		$profesor->setCorreo($correo);
		if(!$profesor->validarUsuario()){
			$mensaje = "El nombre de usuario ya existe. Por favor elija otro nombre";
         	echo "<script>alert('$mensaje'); window.location='../vista/administradores/modificacionesUsuario.php?id=".$_GET['id']."';</script>";
			exit();
		}
	}
?>
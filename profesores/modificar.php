<?php

    require_once '../model/Profesor.php';
    
    $profesor = new Profesor($_GET['id']);
    
    $contraseña       = $_POST['contraseña'];
	$contraseña1      = $_POST['contraseña1'];
	if($contraseña === $contraseña1){
        require "_guardarDesdePost.php";
        
        if ($profesor->guardar()){
            $mensaje = "El profesor fue actualizado";
            echo "<script>alert('$mensaje'); window.location='../vista/administradores/verUsuarios.php';</script>";
        }else {
             $mensaje = "El nombre del profesor ya fue registrado. Por favor elija otro nombre";
             echo "<script>alert('$mensaje'); window.location='../vista/administradores/modificacionesUsuario.php?id=".$_GET['id']."';</script>";
        }
	}else{
	    $mensaje = "Las contraseñas no coinciden";
        echo "<script>alert('$mensaje'); window.location='../vista/administradores/modificacionesUsuario.php?id=".$_GET['id']."';</script>";
	}

?>
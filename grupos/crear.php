<?php
	require_once "../model/Grupo.php";
	session_start();
	
	$grupo = new Grupo();
	require "_registrarDesdePost.php";
	
	if($grupo->validarMateria()){
		if($grupo->guardar()){
			$mensaje = "Se creo el grupo correctamente";
	        echo "<script>alert('$mensaje'); window.location='../vista/administradores/listaGrupos.php';</script>";
		}
	}else{
		$mensaje = "El numero de grupo ya existe. Por favor elija otro.";
        echo "<script>alert('$mensaje'); window.location='../vista/administradores/registroGrupo.php';</script>";
	}
?>
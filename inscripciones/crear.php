<?php
	require_once "../model/Inscripcion.php";
	session_start();
	
	$inscripcion = new Inscripcion();
	require "_registrarDesdePost.php";
	
	if($inscripcion->guardar()){
		$mensaje = "Usted se inscribio correctamente";
        echo "<script>alert('$mensaje'); window.location='nueva.php';</script>";
	}
?>
<?php
	require_once "../model/Materia.php";
	$estudiante_id  = $_SESSION['usuario_id'];
	$idMateria      = $_POST['materia'];
	$codigoMateria  = $_POST['codigoMateria'];
	$materia        = new Materia($idMateria);
	
	if($codigoMateria == $materia->getCodigo()){
		$inscripcion->setMateria($idMateria);
		$inscripcion->setUsuario($estudiante_id);
	}else{
		$mensaje = "El codigo de la materia es incorrecto.";
        echo "<script>alert('$mensaje'); window.location='nueva.php';</script>";
	}

?>
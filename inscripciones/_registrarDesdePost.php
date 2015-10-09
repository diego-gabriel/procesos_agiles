<?php
	require_once "../model/Materia.php";
	$estudiante_id  = $_SESSION['usuario_id'];
	$idGrupo      = $_POST['grupo'];
	$codigoMateria  = $_POST['codigoMateria'];
	$grupo        = new Grupo($idGrupo);
	
	if($codigoMateria == $grupo->getMateria()->getCodigo()){
		$inscripcion->setGrupo($idGrupo);
		$inscripcion->setUsuario($estudiante_id);
	}else{
		$mensaje = "El codigo de la materia es incorrecto.";
        echo "<script>alert('$mensaje'); window.location='nueva.php';</script>";
        exit();
	}

?>
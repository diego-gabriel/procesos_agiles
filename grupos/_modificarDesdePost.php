<?php
	$materiaActual = $grupo->getMateriaId();
	$usuarioActual = $grupo->getUsuarioId();
	$codigoActual = $grupo->getCodigo();

	$profesor_id  = $_POST['profesor'];
	$idMateria    = $_POST['materia'];
	$codigoGrupo  = $_POST['grupo'];
	
	if($materiaActual === $idMateria && $codigoActual === $codigoGrupo){
		$grupo->setUsuario($profesor_id);
	}else{
		$grupo->setUsuario($profesor_id);
		$grupo->setMateria($idMateria);
		$grupo->setCodigo($codigoGrupo);
		if(!$grupo->validarMateria()){
			$mensaje = "El numero de grupo ya existe. Por favor elija otro nombre";
         	echo "<script>alert('$mensaje'); window.location='../vista/administradores/modificacionesGrupo.php?id=".$_GET['id']."';</script>";
			exit();
		}
	}
?>
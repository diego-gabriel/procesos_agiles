<?php
	$profesor_id  = $_POST['profesor'];
	$idMateria    = $_POST['materia'];
	$codigoGrupo  = $_POST['grupo'];
	
	$grupo->setMateria($idMateria);
	$grupo->setUsuario($profesor_id);
	$grupo->setCodigo($codigoGrupo);
?>
<?php

	$nombreMateria    = $_POST['nombreMateria'];
	$codigoMateria    = $_POST['codigoMateria'];
	$descripcion      = $_POST['descripcion'];
	$idProfesor       = $_POST['profesor'];
	
	$nuevaMateria->setNombre($nombreMateria);
	$nuevaMateria->setCodigo($codigoMateria);
	$nuevaMateria->setDescripcion($descripcion);
	$nuevaMateria->setProfesor($idProfesor);

?>
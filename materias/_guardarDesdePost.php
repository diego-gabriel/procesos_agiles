<?php

	$nombreMateria    = $_POST['nombreMateria'];
	$codigoMateria    = $_POST['codigoMateria'];
	$descripcion      = $_POST['descripcion'];
	$area_id		  = $_POST['area_id'];
	
	$nuevaMateria->setNombre($nombreMateria);
	$nuevaMateria->setCodigo($codigoMateria);
	$nuevaMateria->setDescripcion($descripcion);
	$nuevaMateria->setArea($area_id);
?>
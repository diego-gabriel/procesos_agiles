<?php
require_once "../model/Inscripcion.php";
$estudiante_id = 2;
foreach($_POST['materia'] as $materia_id){
	$inscripcion = new Inscripcion();
	$inscripcion->setMateria($materia_id);
	$inscripcion->setUsuario($estudiante_id);
	$inscripcion->guardar();
}
header("Location: /vista/tareas/vistaInscripcion.php");
die();
?>
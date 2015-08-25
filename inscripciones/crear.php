<?php
require_once "../model/Inscripcion.php";
session_start();
$estudiante_id = $_SESSION['usuario_id'];
foreach($_POST['materia'] as $materia_id){
	$inscripcion = new Inscripcion();
	$inscripcion->setMateria($materia_id);
	$inscripcion->setUsuario($estudiante_id);
	$inscripcion->guardar();
}
header("Location: /inscripciones/nueva.php");
die();
?>
<?php
//La variable $nuevaTarea debe ser inicializada antes de la llamada
//a este archivo. todos los atribuos se recogen desde POST\
        

$fechaInicio    = $_POST['fechaInicioE'];
$fechaEntrega   = $_POST['fechaFinalE'];
$nombreTarea    = $_POST['name'];
$nombreMateria  = $_POST['materia'];
$descripcion    = $_POST['descripcion'];
$horaInicio     = $_POST['horaIni'];
$horaFin        = $_POST['horaFin'];
$estado        = $_POST['estado'];


$nuevaTarea->setNombre($nombreTarea);
$nuevaTarea->setDescripcion($descripcion);
$nuevaTarea->setMateria($nombreMateria);
$nuevaTarea->setFechaInicio($fechaInicio, $horaInicio);
$nuevaTarea->setFechaEntrega($fechaEntrega, $horaFin);
$nuevaTarea->setEstado($estado);
$nuevaTarea->setProfesor($_SESSION['usuario_id']);


?>
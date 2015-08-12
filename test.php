<?php

include_once "model/Estudiante.php";
include_once "model/Materia.php";
include_once "model/Inscripcion.php";
/*
$estudiante = new Estudiante(3);

$estudiante->setNombreUsuario("Red Panda");
$estudiante->setClave("galletitas");

$materia = new Materia(2);
$inscripcion = new Inscripcion(11);
$inscripcion->setUsuario($estudiante);
$inscripcion->setMateria($materia);

$inscripcion->guardar();
$estudiante->guardar();
*/
?>
<h1>Estudiantes</h1>
<?php
foreach (Estudiante::all() as $estudiante){
    var_dump($estudiante->atributos());
    var_dump($estudiante->materias());
    echo "<h3>tareas: </h3>";
    var_dump($estudiante->tareas());
    
    echo "-------------------------<br>";
}
	
?>
<h1>Materias</h1>
<?php
foreach (Materia::all() as $estudiante){
    var_dump($estudiante->atributos());
    
    echo "<h3>estudiantes: </h3>";
    var_dump($estudiante->estudiantes());
    
    echo "-------------------------<br>";
    
}
	
?>
<h1>Inscripciones</h1></h1>
<?php
foreach (Inscripcion::all() as $estudiante){
    var_dump($estudiante->atributos());
}
	
?>
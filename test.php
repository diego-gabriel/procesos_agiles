<?php

include_once "model/Estudiante.php";
include_once "model/Materia.php";
include_once "model/Inscripcion.php";
/*
$estudiante = new Estudiante();

$estudiante->setNombreUsuario("Red Panda");
$estudiante->setContrasena("galletitas");
$estudiante->setNombre("Alan");
$estudiante->setApellido("Turing");
$estudiante->setCorreo("alan.turing@gmail.com");
$estudiante->setTelefono(70310928);
$estudiante->guardar();
$materia = new Materia(1);
$inscripcion = new Inscripcion();
$inscripcion->setUsuario($estudiante);
$inscripcion->setMateria($materia);
$inscripcion->guardar();


$materia = new Materia();
$materia->setNombre("Introduccion a la Programacion");
$materia->guardar();
*/
?>
<h1>Estudiantes</h1>
<?php
foreach (Estudiante::all() as $estudiante){
    var_dump($estudiante->atributos());
    echo "<h3> inscrito en: </h3>";
    var_dump($estudiante->materias());
    echo "<h3>tareas: </h3>";
    foreach($estudiante->tareas() as $tarea){
        echo "<p> estado: ".var_dump($estudiante->entrega($tarea))."</p>";
        var_dump($tarea);
    }
    
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
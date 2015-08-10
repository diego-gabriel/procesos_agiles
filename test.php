<?php

include_once "model/Estudiante.php";

$usuario = new Estudiante(1);
$usuario->setNombreUsuario("Red Panda");
$usuario->setClave("galletas");
$usuario->guardar();
var_dump($usuario->atributos());
	
?>
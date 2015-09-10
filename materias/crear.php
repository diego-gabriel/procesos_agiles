<?php
	require_once '../model/Materia.php';
        
    $nuevaMateria = new Materia();
        
    require "_guardarDesdePost.php";
        
    if ($nuevaMateria->guardar()){
    	$mensaje = "La materia fue registrada con exito";
        echo "<script>alert('$mensaje'); window.location='../vista/administradores/registroMateria.php';</script>";
    }else{
    	$mensaje = "El nombre de la materia ya fue registrada. Por favor elija otro nombre";
        echo "<script>alert('$mensaje'); window.location='../vista/administradores/registroMateria.php';</script>";
    }
    
?>
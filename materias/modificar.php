<?php

    require_once '../model/Materia.php';
    
    $nuevaMateria = new Materia($_GET['id']);
    
    require "_guardarDesdePost.php";
    
    if ($nuevaMateria->guardar()){
        $mensaje = "La materia fue actualizada";
        echo "<script>alert('$mensaje'); window.location='../vista/administradores/listaMaterias.php';</script>";
    }else {
         $mensaje = "El nombre de la tarea ya fue registrada. Por favor elija otro nombre";
         echo "<script>alert('$mensaje'); window.location='../vista/administradores/modificacionesMateria.php?id=".$_GET['id']."';</script>";
    }

?>
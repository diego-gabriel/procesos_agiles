<?php

    require_once '../model/Grupo.php';
    
    $grupo = new Grupo($_GET['id']);
    
    require "_modificarDesdePost.php";
    
    if ($grupo->guardar()){
            $mensaje = "La materia fue actualizada";
            echo "<script>alert('$mensaje'); window.location='../vista/administradores/listaGrupos.php';</script>";
    }

?>
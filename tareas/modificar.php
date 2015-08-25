<?php
    
    session_start();
    require_once "../model/Profesor.php";
    if (isset($_SESSION['usuario_id'])){
        $profesor = new Profesor($_SESSION['usuario_id']);
    } else {
        header("Location: /index.php");
    }

    require_once '../model/Tarea.php';
    
    $nuevaTarea = new Tarea($_GET['id']);
    
    //var_dump($_POST);
    
    require "_guardarDesdePost.php";
    
    //var_dump($nuevaTarea);	
    if ($nuevaTarea->guardar()){
        $mensaje = "La tarea fue registrada con exito";
        echo "<script>alert('$mensaje'); window.location='../vista/profesores/tareasProfesor.php';</script>";
    }else {
         $mensaje = "El nombre de la tarea ya fue registrada. Por favor elija otro nombre";
         echo "<script>alert('$mensaje'); window.location='../vista/profesores/modificacionesTarea.php?id=".$_GET['id']."';</script>";
    }

?>
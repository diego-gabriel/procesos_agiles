<?php
    
    session_start();
    require_once "../model/Profesor.php";
    if (isset($_SESSION['usuario_id'])){
        $profesor = new Profesor($_SESSION['usuario_id']);
    } else {
        header("Location: /index.php");
    }

    if (!isset($_POST['name'])){
        header('location: /tareas/nueva.php');
    }
    else {
        require_once '../model/Tarea.php';
        
        $nuevaTarea = new Tarea();
        
        require "_guardarDesdePost.php";
        
        if ($nuevaTarea->guardar()){
            $mensaje = "La tarea fue registrada con exito";
            echo "<script>alert('$mensaje'); window.location='../vista/tareas/nueva.php';</script>";
        }else {
             $mensaje = "El nombre de la tarea ya fue registrada. Por favor elija otro nombre";
             echo "<script>alert('$mensaje'); window.location='../vista/tareas/nueva.php';</script>";
        }
    }
?>
<?php

    if (!isset($_POST['name'])){
        header('location: /tareas/nueva.php');
    }
    else {
        include '../model/Tarea.php';
        
        $fechaInicio    = $_POST['fechaInicioE'];
        $fechaEntrega   = $_POST['fechaFinalE'];
        $nombreTarea    = $_POST['name'];
        $nombreMateria  = $_POST['materia'];
        $descripcion    = $_POST['descripcion'];
        $horaInicio     = $_POST['horaIni'];
        $horaFin        = $_POST['horaFin'];
        
        $nuevaTarea = new Tarea();
        $nuevaTarea->setNombre($nombreTarea);
        $nuevaTarea->setDescripcion($descripcion);
        $nuevaTarea->setMateria($nombreMateria);
        $nuevaTarea->setFechaInicio($fechaInicio, $horaInicio);
        $nuevaTarea->setFechaEntrega($fechaEntrega, $horaFin);
        if ($nuevaTarea->guardar()){
            $mensaje = "La tarea fue registrada";
            echo "<script>alert('$mensaje'); window.location='../vista/tareas/nueva.php';</script>";
        }else {
             $mensaje = "El nombre de la tarea ya fue registrada";
             echo "<script>alert('$mensaje'); window.location='../vista/tareas/nueva.php';</script>";
        }
    }
?>
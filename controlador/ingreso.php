<?php
require_once '../model/Usuario.php';

    $usuario= $_POST['usuario'];
    $contrasena= $_POST['contrasena'];
   
    $datos = Usuario::autenticar($usuario, $contrasena);
    $estado = $datos->estado;
    if($datos != null && $estado == 't'){
        require_once '../model/Profesor.php';
        require_once '../model/Estudiante.php';
        require_once '../model/Administrador.php';
        
        $tipo_usuario = $datos->tipo_usuario;
        
        if($tipo_usuario == Usuario::ESTUDIANTE){
            session_start();
            $_SESSION['usuario_id'] = $datos->id;
            echo "<script>window.location='../estudiantes/inicio.php';</script>";
        } else
        if($tipo_usuario == Usuario::PROFESOR){
            session_start();
            $_SESSION['usuario_id'] = $datos->id;
            echo "<script>window.location='../vista/profesores/vistaPrincipal.php';</script>";
        } else 
        if ($tipo_usuario == Usuario::ADMINISTRADOR){
            session_start();
            $_SESSION['usuario_id'] = $datos->id;
            echo "<script>window.location='../vista/administradores/index.php';</script>";
        }
    
    }else{
        $mensaje = "Registro incorrecto. Vuelva a intentarlo";
        echo "<script>alert('$mensaje'); window.location='../index.php';</script>";
    }
?>

<?php
require_once '../model/Usuario.php';

    $usuario= $_POST['usuario'];
    $contrasena= $_POST['contrasena'];
   
    $usuario_id = Usuario::autenticar($usuario, $contrasena);
    
    if($usuario_id != null){
        require_once '../model/Profesor.php';
        $usuario_actual = new Profesor($usuario_id);
        $tipo_usuario = $usuario_actual->getTipoUsuario();
        
        if($tipo_usuario == 1){
            session_start();
            $_SESSION['usuario_id'] = $usuario_id;
            echo "<script>window.location='../estudiantes/inicio.php';</script>";
        }else{
            if($tipo_usuario == 2){
                session_start();
                $_SESSION['usuario_id'] = $usuario_id;
                echo "<script>window.location='../vista/profesores/vistaPrincipal.php';</script>";
            }
        }
    }else{
        $mensaje = "Registro incorrecto. Vuelva a intentarlo";
        echo "<script>alert('$mensaje'); window.location='../index.php';</script>";
    }
?>

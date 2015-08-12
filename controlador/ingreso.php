<?php
require_once '../model/data/Connection.php';

    $usuario= $_POST['usuario'];
    $contrasena= $_POST['contraseña'];
    
    $conexion = Connection::getInstance();
    
    $peticion =$conexion->query("SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena'");
    $resultadoUsuario = pg_num_rows($peticion);
    if($resultadoUsuario >= 1){
        echo "<script>window.location='../vista/tareas/vistaPrincipal.php';</script>";
    }else{
        $mensaje = "Registro incorrecto. Vuelva a intentarlo";
        echo "<script>alert('$mensaje'); window.location='../index.php';</script>";
    }
?>

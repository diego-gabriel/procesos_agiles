<?php
require_once '../model/data/Connection.php';

    $nombreUsuario = $_POST['nombreUsuario'];
    $contraseña = $_POST['contraseña'];
    $contraseña1 = $_POST['contraseña1'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    
    $conexion = Connection::getInstance();
  
    $cantidadUsuario = $conexion->query("select * from usuarios where nombre_usuario='$nombreUsuario'");
    $resultadoUsuario = pg_num_rows($cantidadUsuario);
    if($resultadoUsuario >= 1){
       $mensaje = "El nombre de usuario ya fue registrado. Por favor cambie de nombre";
       echo "<script>alert('$mensaje'); window.location='../vista/administradores/crearUsuario.php';</script>";
    }else{
        if($contraseña != $contraseña1){
            $mensajeContraseña = "Las contraseñas no coinciden";
            echo "<script>alert('$mensajeContraseña'); window.location='../vista/administradores/crearUsuario.php';</script>";            
        }else{
            $cantidadCorreo = $conexion->query("select * from usuarios where correo='$correo'");
            $resultadoCorreo = pg_num_rows($cantidadCorreo);
            if($resultadoCorreo >= 1){
                $mensajeCorreo = "El correo ya fue registrado. Por favor registrese con otro";
                echo "<script>alert('$mensajeCorreo'); window.location='../vista/administradores/crearUsuario.php';</script>";
            }else{
                $consulta = "INSERT INTO usuarios(nombre_usuario, contrasena, nombre, apellido, telefono, correo, tipo_usuario) VALUES('$nombreUsuario', '$contraseña', '$nombre', '$apellido', '$telefono', '$correo', '2')";
                $conexion->query($consulta);
               // session_start();
                
				$res = $conexion->query("SELECT currval('usuarios"."_id_seq')");
				$arr = pg_fetch_array($res);
				//$_SESSION['usuario_id'] = $arr[0]; 
                $mensaje = 'Registro exitosamente';
                echo "<script>alert('$mensaje'); window.location='../vista/administradores/verUsuarios.php';</script>";            
            }
        }
    } 
?>
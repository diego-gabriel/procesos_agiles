<?php
	
	/*
	* Esta funcion valida que el usuario enviado como parametro concuerde 
	* sea del tipo especificado.
	* En caso de no concordar, envia el error 403 Unauthorized
	*/
	require_once "../model/Usuario.php";
	function validar_permisos($usuario, $tipo_usuario){
		if ($usuario->getTipoUsuario() != $tipo_usuario){
			header("HTTP/1.1 403 Unauthorized");
			include('../403.php');
			display_error($usuario->getTipoUsuario());
			exit;
		}
	}
?>
<?php
	if (!isset($_POST['comentario'])){
		header("HTTP/1.1 403 Unauthorized");
		include ("../403.php");
		exit;
	} else {
		session_start();
		require_once "../model/Comentario.php";
		require_once "../model/Usuario.php";
		require_once "../model/Notificacion.php";
		
		$comentario = new Comentario();
		$comentario->setComentario($_POST['comentario']);
		$comentario->setEntrega($_POST['entrega']);
		$comentario->setComentador($_SESSION['usuario_id']);
		$comentario->setTipoComentador(USUARIO::PROFESOR);
		$comentario->guardar();
		$ultimo_sitio = $_SESSION['ultimo_sitio'];
		
		$entrega 	   = new Entrega($_POST['entrega']);
		$estudiante_id = $entrega->getUsuarioId();
		$tarea 		   = $entrega->getTarea_id();
		$notificacion  = new Notificacion();
		
		$notificacion->setUsuario($estudiante_id);
		$notificacion->setMensaje("Tiene un nuevo comentario en la tarea ".$tarea->getNombre());
		$notificacion->setEnlace("/estudiantes/tarea.php?id=".$tarea->getId());
		
		$notificacion->guardar();
		
		header ("Location: $ultimo_sitio");
	}
?>
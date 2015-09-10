<?php
	if (!isset($_POST['comentario'])){
		header("HTTP/1.1 403 Unauthorized");
		include ("../403.php");
		exit;
	} else {
		session_start();
		require_once "../model/Comentario.php";
		require_once "../model/Usuario.php";
		
		$comentario = new Comentario();
		$comentario->setComentario($_POST['comentario']);
		$comentario->setEntrega($_POST['entrega']);
		$comentario->setComentador($_SESSION['usuario_id']);
		$comentario->setTipoComentador(USUARIO::PROFESOR);
		$comentario->guardar();
		$ultimo_sitio = $_SESSION['ultimo_sitio'];
		header ("Location: $ultimo_sitio");
	}
?>
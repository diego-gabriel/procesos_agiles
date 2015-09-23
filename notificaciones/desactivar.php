<?php
require_once "../model/Notificacion.php";
if (isset($_POST['url'])){
	Notificacion::desactivarTodas($_POST['url']);
}
?>
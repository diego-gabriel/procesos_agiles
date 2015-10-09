<?php
	session_start();
	require_once "../model/Profesor.php";
	if (isset($_SESSION['usuario_id'])){
    	$profesor = new Profesor($_SESSION['usuario_id']);
	} else {
    	header("Location: /index.php");
	}
	
    require_once '../model/Materia.php'; 
  
  	$materia = new Materia($_GET['id']);
  	foreach($profesor->mostrarGrupos($_GET['id']) as $grupo){
  		echo '<option value="'.$grupo->getId().'">'.$grupo->getCodigo().'</option>';
    }
  
?>
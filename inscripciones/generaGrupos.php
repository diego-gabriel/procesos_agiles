<?php
	
    require_once '../model/Materia.php'; 
  
  	$materia = new Materia($_GET['id']);
  	
  	foreach($materia->mostrarGrupos() as $grupo){
  		echo '<option value="'.$grupo->getId().'">'.$grupo->getCodigo().' - '.$grupo->getUsuario()->nombreCompleto().'</option>';
    }
  
?>
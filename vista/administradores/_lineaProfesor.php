<?php
	$id = $profesor->getId();
	if($id != 0){
		$numeroEstudiantes = $profesor->numeroEstudiantes();
		$clase = "";
		if($numeroEstudiantes > 0)
			$clase = "verificarProfesor";

?>
		<tr> 
			<td> <?=$profesor->getNombreUsuario()?> </td> 
			<td> <?=$profesor->getNombre()?> </td> 
			<td> <?=$profesor->getApellido()?> </td>
			<td> <?=$profesor->getTelefono()?> </td>
			<td> <?=$profesor->getCorreo()?> </td>
			<td> <a href="modificacionesUsuario.php?id=<?=$profesor->getId()?>">Modificar</a></td>
			<td> <a href="../../profesores/eliminaProfesor.php?id=<?=$profesor->getId()?>" class="<?=$clase?>">Eliminar</a></td>
		</tr> 
<?php
	}
?>
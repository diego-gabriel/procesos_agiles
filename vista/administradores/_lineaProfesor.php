<?php
	$id     = $profesor->getId();
	$estado = $profesor->getEstado();
	if($id != 0 && $estado == Usuario::HABILITADO){
?>
		<tr> 
			<td> <?=$profesor->getNombreUsuario()?> </td> 
			<td> <?=$profesor->getNombre()?> </td> 
			<td> <?=$profesor->getApellido()?> </td>
			<td> <?=$profesor->getTelefono()?> </td>
			<td> <?=$profesor->getCorreo()?> </td>
			<td> <a href="modificacionesUsuario.php?id=<?=$profesor->getId()?>">Modificar</a></td>
			<td> <a href="../../profesores/eliminaProfesor.php?id=<?=$profesor->getId()?>" class="verificarProfesor">Eliminar</a></td>
		</tr> 
<?php
	}
?>
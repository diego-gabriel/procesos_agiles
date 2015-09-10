<?php
	$id = $profesor->getId();
	if($id != 0){
?>
		<tr> 
			<td> <?=$profesor->getNombreUsuario()?> </td> 
			<td> <?=$profesor->getNombre()?> </td> 
			<td> <?=$profesor->getApellido()?> </td>
			<td> <?=$profesor->getTelefono()?> </td>
			<td> <?=$profesor->getCorreo()?> </td>
			<td> <a href="modificacionesUsuario.php?id=<?=$profesor->getId()?>">Modificar</a></td>
		</tr> 
<?php
	}
?>
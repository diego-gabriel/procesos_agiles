<?php
	$id     = $profesor->getId();
	$estado = $profesor->getEstado();
	if($id != 0 && $estado == Usuario::HABILITADO){
		$numeroGrupos = $profesor->numeroGrupos();
		$clase = "verificarProfesor";
?>
		<tr> 
			<td> <?=$profesor->getNombreUsuario()?> </td> 
			<td> <?=$profesor->getNombre()?> </td> 
			<td> <?=$profesor->getApellido()?> </td>
			<td> <?=$profesor->getTelefono()?> </td>
			<td> <?=$profesor->getCorreo()?> </td>
			<td> <a href="modificacionesUsuario.php?id=<?=$profesor->getId()?>">Modificar</a></td>
			<?php
				if($numeroGrupos > 0){
					$clase = "notificacionProfesor";
			?>
				<td> <a href="" class="<?=$clase?>">Eliminar</a></td>
			<?php
				}else{
			?>
					<td> <a href="../../profesores/eliminaProfesor.php?id=<?=$profesor->getId()?>" class="<?=$clase?>">Eliminar</a></td>
			<?php
				}
			?>
		</tr> 
<?php
	}
?>
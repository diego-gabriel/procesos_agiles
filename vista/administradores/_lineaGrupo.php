<tr> 
	<td> <?=$grupo->getCodigo()?> </td> 
	<td> <?=$grupo->getUsuario()->nombreCompleto()?> </td> 
	<td> <?=$grupo->getMateria()->getNombre()?> </td>
	<td> <a href="modificacionesGrupo.php?id=<?=$grupo->getId()?>">Modificar</a></td>
</tr> 
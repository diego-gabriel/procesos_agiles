<?php
	require_once '../../model/Grupo.php';
	$idGrupo = $tarea->getGrupo();
	$grupo = new Grupo($idGrupo);
?>
<tr> 
	<td> <a href = "tarea.php?id=<?=$tarea->getId()?>"> <?=$tarea->getNombre()?> </a></td> 
	<td> <?=$tarea->getFechaInicio()?> </td> 
	<td> <?=$tarea->getFechaEntrega()?> </td>
	<td> <?=$tarea->getMateria()->getNombre()?> </td>
	<td> <?=$grupo->getCodigo()?> </td>
	<td> <?=$tarea->getDescripcion()?></td>
	<td> <?=$tarea->getEstado()?></td>
	<td> <a href="modificacionesTarea.php?id=<?=$tarea->getId()?>">Modificar</a></td>
</tr> 
<tr> 
<td> <?=$tarea->getNombre()?></td> 
<td> <?=$tarea->getFechaInicio()?> </td> 
<td> <?=$tarea->getFechaEntrega()?> </td>
<td> <?=$tarea->getMateria()->getNombre()?> </td>
<td> <?=$tarea->getDescripcion()?></td>
<td> <?=$tarea->getEstado()?></td>
<td> <a href="modificacionesTarea.php?id=<?=$tarea->getId()?>">Modificar</a></td>
</tr> 
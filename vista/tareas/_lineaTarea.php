<!-- $tarea deberia ser definida antes de llamar a este archivo. Esto es un parcial -->
<tr> 
<td> <?=$tarea->getNombre()?> </td> 
<td> <?=$tarea->getFechaInicio()?> </td> 
<td> <?=$tarea->getFechaEntrega()?> </td>
<td> <?=$tarea->getMateria()->getNombre()?> </td>
<td> <?=$tarea->getDescripcion()?></td>
</tr> 
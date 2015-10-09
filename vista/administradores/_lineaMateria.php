<tr> 
	<td> <?=$materia->getNombre()?> </td> 
	<td> <?=$materia->getCodigo()?> </td> 
	<td> <?=$materia->getDescripcion()?> </td>
	<td> <?=$materia->getArea()->getNombre() ?></td>
	<td> <a href="modificacionesMateria.php?id=<?=$materia->getId()?>">Modificar</a></td>
</tr> 
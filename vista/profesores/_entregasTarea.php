<?php
	//Se asume la existencia de un $estudiante una $tarea y un $id
	//previa llamada a este parcial
	$estado = $estudiante->estadoDe($tarea);
?>

<tr>
	<td><?=$id?></td>
	<td><?=$estudiante->nombreCompleto()?></td>
	<td><?=$estado?></td>
	<td>
		<?=$estado == Tarea::ENTREGADA ? "<a href='entrega.php?t_id=".$tarea->getId()."&e_id=".$estudiante->getId()."'?> Ver tarea </a>" : ""?>
	</td>
</tr>
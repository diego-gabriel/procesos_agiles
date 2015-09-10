<?php
//$tarea debe ser definida antes de llamar a este parcial
?>
<p><i><?=$tarea->getDescripcion()?></i></p>
<p>
	<b>Publicada en: </b> <?=$tarea->getFechaInicio()->mostrar()?> <br>
	<b>Fecha limite de entrega: </b> <?=$tarea->getFechaEntrega()->mostrar()?> <br>
	<b>Materia: </b> <?=$tarea->getMateria()->getNombre()?> <br>
</p>

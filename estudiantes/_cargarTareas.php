<script type="text/javascript">
$(document).ready(function(){
	
	<?php
		foreach ($estudiante->tareasDelMes() as $tarea){
	?>
			addEnlace($("#calendario"), {
				fecha: "<?=$tarea->getFechaEntrega()->getDia() . "-" . ($tarea->getFechaEntrega()->getMes()-1)?>",
				link: "<?=$tarea->generarEnlace()?>",
				titulo: "<?=$tarea->getNombre()?>",
				newClass: "<?=$estudiante->estadoDe($tarea)?>"
			});
		
	<?php
		}
	?>
	
/*	addEnlace($('#calendario'), {
		fecha: "20-8",
		link: 'www.google.com',
		titulo: 'Enlace a tarea pendiente',
		newClass: 'Pendiente'
	});
	addEnlace($('#calendario'), {
		fecha: "20-8",
		link: 'www.google.com',
		titulo: 'Enlace a tarea entregada',
		newClass: 'Entregada'
	});
	addEnlace($('#calendario'), {
		fecha: "20-8",
		link: 'www.google.com',
		titulo: 'Enlace a tarea atrasada',
		newClass: 'Atrasada'
	});
*/	
});

</script>
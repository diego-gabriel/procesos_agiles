
<div class="container">
	<?php
	$comentarios = $entrega->comentarios();
	if (count($comentarios) == 0){
?>
<p><i>No existen comentarios para esta tarea.</i></p>
<?php
	} else {
?>
<table class="table table-striped table-bordered table-condensed table table-hover">
		<tr class="info">
			<th>
<center><h3>Comentarios</h3></center>
</th>
</tr>

<?php
		foreach($comentarios as $comentario)
			require '_comentario.php';
			?>
			</td>
			<?php
	}
		
?>
</table>
</div>
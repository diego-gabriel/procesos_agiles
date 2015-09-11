<?php
	require "../comentarios/_index.php";
?>
<div class="container">
<form action = "/comentarios/nuevo.php" method = "POST">
	<label for="comentario">Escribe un comentario</label> <br>
	<textarea name = "comentario" rows="5" cols="50"> </textarea>
	
	<br>
	<input type="text" name="entrega" value="<?=$entrega->getId()?>" hidden/>
	<input type="submit" value="Comentar"/>
</form>
</div>
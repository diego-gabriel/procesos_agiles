<?php
	session_start();
	require_once "../../model/Administrador.php";
	require_once "../../model/Grupo.php";
	if (isset($_SESSION['usuario_id'])){
	    $administrador = new Administrador($_SESSION['usuario_id']);
	    if (isset($_GET['id']))
	    	$grupo = new Grupo($_GET['id']);
	} else {
	    header("Location: /index.php");
	}
?>
<html>
	<?require'head.php'?>
    	<title>Actualizar Grupo</title>
    
		<div class="container">
	        <font face="courier" color="blue">	
				<h1><b> Modificar Grupo</b></h1>
			</font>
			<br>
			<form method="post" name="Aceptar" action="../../grupos/modificar.php?id=<?=$_GET['id']?>">
				
				<div class="form-group ">
            	    <div class="input-group col-xs-12 col-sm-6">
            	        <span class="input-group-addon">Profesor:</span>
            	        <?php
            	        	require_once '../../model/Profesor.php';
                    	?>
            	        <select class="selectpicker form-control" data-live-search="true" name="profesor" id="profesor">
            	        	<?php
            	        		foreach(Profesor::all() as $profesor){
                   			?>
            	        	<option value="<?=$profesor->getId()?>" <?=($grupo->getUsuarioId() == $profesor->getId() ? "selected" : '')?>><?=$profesor->getNombre()." ".$profesor->getApellido()?></option>
            	        	<?php
            	        		}
            	        	?>
            	        </select>
            	    </div>
            	</div>
            	
            	<div class="form-group ">
            	    <div class="input-group col-xs-12 col-sm-6">
            	        <span class="input-group-addon">Materia:</span>
            	        <?php
            	        	require_once '../../model/Materia.php';
                    	?>
            	        <select class="selectpicker form-control" data-live-search="true" name="materia" id="materia">
            	        	<?php
            	        		foreach(Materia::all() as $materia){
                   			?>
            	        	<option value="<?=$materia->getId()?>" <?=($grupo->getMateriaId() == $materia->getId() ? "selected" : '')?>><?=$materia->getNombre()?></option>
            	        	<?php
            	        		}
            	        	?>
            	        </select>
            	    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon">Numero de Grupo:</span>
    					<input required type="text" class="form-control" name="grupo" id="grupo" pattern="^[0-9]{1,2}[a-zA-z]{0,1}$" placeholder="Escriba el numero del grupo" title="Tiene que empezar con un numero y puede ser seguido por un caracter." value = "<?=$grupo->getCodigo()?>">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<input class="btn btn-primary glyphicon glyphicon-floppy-disk" type="submit" name="Aceptar" value="Guardar Cambios">
					<input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar" onClick="location.href='listaGrupos.php'">
				</div>	
			</form>
			
					
				
		</div>
		
		<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>
	
	</body>

</html>
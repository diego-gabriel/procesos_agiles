<?php
	session_start();
	require_once "../../model/Administrador.php";
	require_once "../../model/Materia.php";
	if (isset($_SESSION['usuario_id'])){
	    $administrador = new Administrador($_SESSION['usuario_id']);
	    if (isset($_GET['id']))
	    	$materia = new Materia($_GET['id']);
	} else {
	    header("Location: /index.php");
	}
?>
<html>
	<?require'head.php'?>
    	<title>Actualizar Materia</title>
    
		<div class="container">
	        <font face="courier" color="blue">	
				<h1><b> Modificar Materias</b></h1>
			</font>
			<br>
			<form method="post" name="Aceptar" action="../../materias/modificar.php?id=<?=$_GET['id']?>">
				
				<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon"> Nombre de Materia:</span>
    					<input required type="text" class="form-control" name="nombreMateria" id="nombreMateria" pattern="^[a-zA-Z]{3}*$" value = "<?=$materia->getNombre()?>" title="Minimo 3 caracteres">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon">Codigo de la Materia:</span>
    					<input required type="text" class="form-control" name="codigoMateria" id="codigoMateria" value = "<?=$materia->getCodigo()?>" title="Minimo 3 caracteres.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon">Descripcion:</span>
    					<textarea class="form-control" name="descripcion" id="descripcion"><?=$materia->getDescripcion()?></textarea>
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group  col-xs-12 col-sm-6">
            		    
            			<span class="input-group-addon">Area:</span>
            		    <select class="selectpicker form-control" name="area_id" id = 'area' required>
                            <option value = ""> --- Seleccione un &aacute;rea ---</option>
                        	<?php
                        	    require_once '../../model/Area.php';
                        	    foreach(Area::all() as $area){
                        	        require '../areas/_opcion.php';
                        	    }
                        	?>
                    	</select>
                    	
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<input class="btn btn-primary glyphicon glyphicon-floppy-disk" type="submit" name="Aceptar" value="Guardar Cambios">
					<input type="button" class="btn btn-primary" name="Cancelar" value="Cancelar" onClick="location.href='listaMaterias.php'">
				</div>	
			</form>
			
					
				
		</div>
		
		<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>
	
	</body>

</html>
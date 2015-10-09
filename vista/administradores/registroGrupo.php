<?php
    session_start();
    require_once "../../model/Administrador.php";
    if (isset($_SESSION['usuario_id'])){
        $administrador = new Administrador($_SESSION['usuario_id']);
    } else {
        header("Location: /index.php");
    }
?>
<html>
    <?require'head.php'?>
    	<title>Registro de un Grupo</title>
    
    	<div class="container">
    	    <font face="courier" color="blue">
    			<h1><b> Registro de un Grupo</b></h1>
            </font>
            <br>
            <form method = "post" id="FormularioRegistroMateria" action="../../grupos/crear.php" role="form" enctype="multipart/data-form" class="form-horizontal">
            	
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
            	        	<option value="<?=$profesor->getId()?>"><?=$profesor->getNombre()." ".$profesor->getApellido()?></option>
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
            	        	<option value="<?=$materia->getId()?>"><?=$materia->getNombre()?></option>
            	        	<?php
            	        		}
            	        	?>
            	        </select>
            	    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon">Numero de Grupo:</span>
    					<input required type="text" class="form-control" name="grupo" id="grupo" pattern="^[0-9]{1,2}\s?[a-zA-z]{0,1}$" placeholder="Escriba el numero del grupo" title="Tiene que empezar con un numero y puede ser seguido por un caracter.">
                    </div>
            	</div>
            	
            	<div class ="form-group">
            	    <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Registrar</button>
                </div>
    		</form>
    	</div>
    
    </body>

</html>
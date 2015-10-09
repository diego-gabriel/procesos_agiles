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
    	<title>Registro de Materia</title>
    
    	<div class="container">
    	    <font face="courier" color="blue">
    			<h1><b> Registro de una Materia</b></h1>
            </font>
            <br>
            <form method = "post" id="FormularioRegistroMateria" action="../../materias/crear.php" role="form" enctype="multipart/data-form" class="form-horizontal">
            	
            	<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon"> Nombre de Materia:</span>
    					<input required type="text" class="form-control" name="nombreMateria" id="nombreMateria" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ]{3}*$" placeholder="Escriba el nombre de la materia" title="Minimo 3 caracteres.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-xs-12 col-sm-6">
            			<span class="input-group-addon">Codigo de la Materia:</span>
    					<input required type="text" class="form-control" name="codigoMateria" id="codigoMateria" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ]{3}*$" placeholder="Escriba el codigo de la materia" title="Minimo 3 caracteres.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group  col-xs-12 col-sm-6">
            			<span class="input-group-addon">Descripcion:</span>
    					<textarea class="form-control" name="descripcion" id="descripcion" placeholder="Escribe tu descripcion"></textarea>
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
            	
            	<div class ="form-group">
            	    <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Registrar</button>
                </div>
    		</form>
    	</div>
    

    </body>

</html>
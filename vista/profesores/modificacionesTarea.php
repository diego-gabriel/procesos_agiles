<?php
	session_start();
	require_once "../../model/Profesor.php";
	require_once "../../model/Tarea.php";
	require_once '../../model/Grupo.php';
	if (isset($_SESSION['usuario_id'])){
	    $profesor = new Profesor($_SESSION['usuario_id']);
	    if (isset($_GET['id']))
	    	$tarea = new Tarea($_GET['id']);
	    	$idGrupo = $tarea->getGrupo();
			$grupo = new Grupo($idGrupo);
	} else {
	    header("Location: /index.php");
	}
?>

<html>
	<title>Modificar Tarea</title>
	<body>
	 <?require 'head.php'?>
	 <head>
	 	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
		     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
		     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
	         <link rel="stylesheet" href="../../css/bootstrap.css">
	         <link rel="stylesheet" href="../../css/datepicker.css">
	         <link rel="stylesheet" href="../../css/estilos.css">
	         <script type="text/javascript" src="../../js/mostrarGruposProfesores.js"></script>
	 </head>
	 <br>
	 
	 <div class="container">
	        	<font color="blue">	
					<h1><b> Modificar Tarea</b></h1>
					<br><br>
				</font>
				<form method="post" action="../../tareas/modificar.php?id=<?=$_GET['id']?>">
					<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Nombre de la Tarea:</span>
    						<input required type="tex" class="form-control" id="name" placeholder="Nombre de la tarea" name = "name" value = "<?=$tarea->getNombre()?>">
                    	</div>
            		</div>
            		<div class="form-group ">
	            	    <div class="input-group col-xs-12 col-sm-6">
	            	        <span class="input-group-addon">Materia:</span>
	            	        <?php 
                				require_once '../../model/Materia.php';
                			?>
                			<select class="selectpicker form-control" name="materia" id = 'materia'>
                			<?php
                				if($profesor->mostrarMaterias() != null){
                					
                					foreach($profesor->mostrarMaterias() as $materia){
               				?>
                						<option value="<?=$materia->getId()?>" <?=($tarea->getMateria()->getNombre() == $materia->getNombre() ? "selected" : '')?>> <?=$materia->getNombre()?></option>
                					<?php
                					}
                				}else{
                			?>
                				<option>No tiene Materias Disponibles</option>
                			<?php
                				}
            				?> 
            				</select>
	            	    </div>
            		</div>
            		<div class="form-group ">
            	    	<div class="input-group col-xs-12 col-sm-6">
            	        	<span class="input-group-addon">Seleccione el Grupo:</span>
            	        	<select class="selectpicker form-control" data-live-search="true" name="grupo" id="grupo">
            	        		<option value="<?=$tarea->getGrupo()?>"> <?=$grupo->getCodigo()?></option>
            	        	</select>
            	    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Fecha de Inicio:</span>
    						<input required class="datepicker form-control" type="text" name="fechaInicioE" id="fechaInicioE" placeholder=" Fecha de Inicio" value = "<?=$tarea->getFechaInicio()->fecha()?>">
                    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Fecha de Entrega:</span>
    						<input required class="datepicker form-control" type="text" name="fechaFinalE" id="fechaFinalE" placeholder="Fecha Limite" value = "<?=$tarea->getFechaEntrega()->fecha()?>">
                    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Hora de Inicio:</span>
							<input required type="text" class="input-group clockpicker pull-center form-control" data-align="top" data-autoclose="true" name="horaIni" id="horaIni" placeholder="Ingrese la hora de inicio" value = "<?=$tarea->getFechaInicio()->hora()?>">
                    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Hora de Entrega:</span>
							<input required type="text" class="input-group clockpicker pull-center form-control" data-align="top" data-autoclose="true" name="horaFin" id ="horaFin" placeholder="Ingrese la hora limite de entrega" value = "<?=$tarea->getFechaEntrega()->hora()?>">
                    	</div>
            		</div>
            		<div class="form-group ">
	            	    <div class="input-group col-xs-12 col-sm-6">
	            	        <span class="input-group-addon">Estado:</span>
	            	        <?php 
                				require_once '../../model/Materia.php';
                			?>
                			<select class = "form-control" name="estado" id="estados">
								<option value="<?=Tarea::VISIBLE?>" <?=$tarea->getEstado() == Tarea::VISIBLE ? "selected" : ""?>><?=Tarea::VISIBLE?></option>
								<option value="<?=Tarea::NO_VISIBLE?>" <?=$tarea->getEstado() == Tarea::NO_VISIBLE ? "selected" : ""?>><?=Tarea::NO_VISIBLE?></option>
							</select>
	            	    </div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group  col-xs-12 col-sm-6">
            				<span class="input-group-addon">Descripcion:</span>
    						<textarea required class="form-control" rows="3" placeholder="Descripcion de la tarea " name = "descripcion"><?=$tarea->getDescripcion()?></textarea>
                    	</div>
            		</div>
            		<div class="form-group">
						<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-disk"> Guardar cambios</button>
					</div>
				</form>
				<a href="../profesores/tareasProfesor.php"><button class="btn btn-primary glyphicon glyphicon-arrow-left"> volver</button></a>
	        </div>
	
		<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>
	
	</body>

</html>
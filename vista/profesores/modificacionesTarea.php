<?php
session_start();
require_once "../../model/Profesor.php";
require_once "../../model/Tarea.php";
if (isset($_SESSION['usuario_id'])){
    $profesor = new Profesor($_SESSION['usuario_id']);
    if (isset($_GET['id']))
    	$tarea = new Tarea($_GET['id']);
} else {
    header("Location: /index.php");
}
?>

<html>
	<title>Modificar Tarea</title>
<body>
 <?require 'nav.php'?>
        <br>
	<div class="container">
		
        <font face="courier" color="blue">	
		<h1><center><b> Modificar Tarea</b></center></h1>
		<br><br>
		</font>
		<form method="post" action="../../tareas/modificar.php?id=<?=$_GET['id']?>">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="date">Fecha de inicio: </label>
						<input required class="datepicker " type="text" name="fechaInicioE" id="fechaInicioE"  
						placeholder=" " value = "<?=$tarea->getFechaInicio()->fecha()?>">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="date">Fecha de entrega:</label>
						<input required class="datepicker" type="text" name="fechaFinalE" id="fechaFinalE" 
						placeholder=" " value = "<?=$tarea->getFechaEntrega()->fecha()?>">
						 
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<div class="clearfix">
							<label  for="date">Hora de inicio:</label>
							<div class="input-group clockpicker pull-center " data-align="top" data-autoclose="true">
								
								<input required type="text" class="form-control" name="horaIni" id="horaIni" 
								placeholder="" value = "<?=$tarea->getFechaInicio()->hora()?>">
								<span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span> 
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<div class="clearfix">
								<label  for="date">Hora de Entrega:</label>
								<div class="input-group clockpicker pull-center" data-align="top" data-autoclose="true">
								<input required type="text" class="form-control" name="horaFin" id ="horaFin" 
								placeholder=" " value = "<?=$tarea->getFechaEntrega()->hora()?>">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
								</span>
								</div>
						</div>

					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-md-4">
					<div class="form-group">
						<label for="name" class=" col-lg-2 control-label">Nombre:</label>
						<input required type="tex" class="form-control" id="name"  placeholder="" 
						name = "name" value = "<?=$tarea->getNombre()?>">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label  for="name" class=" col-lg-2 control-label">Materia:</label>
					</div>
					<br>
				<?php 
            	require_once '../../model/Materia.php';
                ?>
                <select name="materia" id = 'materias'> 
                <?php
                foreach(Materia::all() as $materia){
               	?>
                <option value="<?=$materia->getId()?>" <?=($tarea->getMateria()->getNombre() == $materia->getNombre() ? "selected" : '')?>> 
                <?=$materia->getNombre()?></option>
                <?php
                }
           		?> 
            	</select>

				</div>
				
				<div class = "col-md-4">
					<div class = "form-group">
						<label for="estado">Estado:</label>
						<br>	
						<select name="estado" id="estados">
							<option value="<?=Tarea::VISIBLE?>" <?=$tarea->getEstado() == Tarea::VISIBLE ? "selected" : ""?>><?=Tarea::VISIBLE?></option>
							<option value="<?=Tarea::NO_VISIBLE?>" <?=$tarea->getEstado() == Tarea::NO_VISIBLE ? "selected" : ""?>><?=Tarea::NO_VISIBLE?></option>
						</select>
					</div>
					
				</div>
			</div>
			

			<div class="form-group">
				<label  for="name" class=" col-lg-2 control-label">Descripcion:</label>
				<textarea required class="form-control" rows="3" placeholder=" " name = "descripcion"><?=$tarea->getDescripcion()?></textarea>
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
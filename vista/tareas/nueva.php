<html>

<head>

	<body style="background:#F0F8FF">
	<meta charset="utf-8">
	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de tareas</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">

	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/datepicker.css">

	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	
        <link rel="stylesheet" href="../../css/jquery1-10.css" />
        <script src="../../dist/jquery-datepicker.js"></script>
        <script src="jquery.ui.datepicker-es.js"></script>
        <script type="text/javascript" src="../../js/validacionFechas.js"></script>
        
</head>

<body>
	<div class="container">
		<h1> Registro de una nueva tarea</h1>
		<form method="post" action="../../tareas/nueva.php">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="date">Fecha de inicio: </label>
						<input required class="datepicker" type="text" name="fechaInicioE" id="fechaInicioE" placeholder="Fecha de Inicio">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="date">Fecha de entrega:</label>
						<input required class="datepicker" type="text" name="fechaFinalE" id="fechaFinalE" placeholder="Fecha Limite">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<div class="clearfix">
							<label  for="date">Hora de inicio:</label>
							<div class="input-group clockpicker pull-center" data-align="top" data-autoclose="true">
								
								<input required type="text" class="form-control" name="horaIni" id="horaIni" placeholder="Ingrese la hora de inicio">
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
								<input required type="text" class="form-control" name="horaFin" id ="horaFin" placeholder="Ingrese la hora limite de entrega">
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
						<input required type="tex" class="form-control" id="name" placeholder="Nombre de la tarea" name = "name">
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
                <option value="<?=$materia->getId()?>"> <?=$materia->getNombre()?></option>
                <?php
                }
            ?> 
            	</select>
					
				</div>
			</div>
		

			<div class="form-group">
				<label  for="name" class=" col-lg-2 control-label">Descripcion:</label>
				<textarea required class="form-control" rows="3" placeholder="Descripcion de la tarea " name = "descripcion"></textarea>
			</div>
			<div class="form-group">

				<button type="submit" class="btn btn-primary">Guardar</button>
				
			</div>
		</form>
		
				<a href="index.php"><button class="btn btn-primary">Ver Tareas</button></a>
	</div>

	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>

</body>

</html>
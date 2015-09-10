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

<head>

	<body style="background:#F0F8FF">
	<meta charset="utf-8">
	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar Tarea</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
	<link rel="stylesheet" href="../../css/estilos.css">

	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/datepicker.css">

	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/bootstrap.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	
        <link rel="stylesheet" href="../../css/jquery1-10.css" />
        <script src="../../dist/jquery-datepicker.js"></script>
        <script src="jquery.ui.datepicker-es.js"></script>
        <script type="text/javascript" src="../../js/validacionFechas.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/js/reloj.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
        
</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
                      <span class="sr-only">Toggle Navigation</span>  
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">MENU</a>
                    
                </div>
                <div class="collapse navbar-collapse" id="acolapsar" >
                        <ul class="nav navbar-nav" <ul style="float:right;">>
                        <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                            <li><a href="vistaPrincipal.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                              
                        </ul>
                    </div>
                
            </div>
        </nav>
        <br><br><br>
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
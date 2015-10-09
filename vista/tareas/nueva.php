<?php
session_start();
require_once "../../model/Profesor.php";
if (isset($_SESSION['usuario_id'])){
    $profesor = new Profesor($_SESSION['usuario_id']);
} else {
    header("Location: /index.php");
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registro de tareas</title>
		
		<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/datepicker.css">
		<link rel="stylesheet" href="../../css/estilos.css">
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.js"></script>
		<script src="../../js/bootstrap-datepicker.js"></script>
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script type="text/javascript" src="/js/reloj.js"></script>
	    <script type="text/javascript" src="../../js/mostrarGruposProfesores.js"></script>
	    <script type="text/javascript" src="../../js/validacionCambioSelect.js"></script>
		
		<link rel="stylesheet" href="../../css/jquery1-10.css" />
		<script src="../../dist/jquery-datepicker.js"></script>
		<script src="jquery.ui.datepicker-es.js"></script>
		<script type="text/javascript" src="../../js/validacionFechas.js"></script>
	</head>
	<body style="background:#F0F8FF">
		 <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
	            <div class="container-fluid">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
	                      <span class="sr-only">Toggle Navigation</span>  
	                      <span class="icon-bar"></span>
	                      <span class="icon-bar"></span>
	                      <span class="icon-bar"></span>
	                    </button>
	                    <a class="navbar-brand" href="../profesores/vistaPrincipal.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a>
	                </div>
	                <div class="collapse navbar-collapse" id="acolapsar" >
	                	<ul class="nav navbar-nav" <ul style="float:right;">>
	                		<li> <a>Profesor: <?=$profesor->nombreCompleto()?><br></a> </li>
	                        <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
	                        <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
	                    </ul>
	               </div>
	            </div>
	        </nav>
	        <br>
	        <div class="container">
	        	<font color="blue">	
					<h1><b> Registro de una nueva Tarea</b></h1>
					<br><br>
				</font>
				<form method="post" action="../../tareas/nueva.php">
					<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Nombre de la Tarea:</span>
    						<input required type="tex" class="form-control" id="name" placeholder="Nombre de la tarea" name = "name">
                    	</div>
            		</div>
            		<div class="form-group ">
	            	    <div class="input-group col-xs-12 col-sm-6">
	            	        <span class="input-group-addon">Materia:</span>
	            	        <?php 
                				require_once '../../model/Materia.php';
                			?>
                			<select class="selectpicker form-control" name="materia" id = 'materia' onChange="valida()">
                				<option selected> Seleccione una opcion</option>
                			<?php
                				if($profesor->mostrarMaterias() != null){
                					
                					foreach($profesor->mostrarMaterias() as $materia){
               				?>
                						<option value="<?=$materia->getId()?>"> <?=$materia->getNombre()?></option>
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
            	        	
            	        	</select>
            	    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Fecha de Inicio:</span>
    						<input required class="datepicker form-control" type="text" name="fechaInicioE" id="fechaInicioE" placeholder=" Fecha de Inicio">
                    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Fecha de Entrega:</span>
    						<input required class="datepicker form-control" type="text" name="fechaFinalE" id="fechaFinalE" placeholder="Fecha Limite">
                    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Hora de Inicio:</span>
							<input required type="text" class="input-group clockpicker pull-center form-control" data-align="top" data-autoclose="true" name="horaIni" id="horaIni" placeholder="Ingrese la hora de inicio">
                    	</div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group col-xs-12 col-sm-6">
            				<span class="input-group-addon"> Hora de Entrega:</span>
							<input required type="text" class="input-group clockpicker pull-center form-control" data-align="top" data-autoclose="true" name="horaFin" id ="horaFin" placeholder="Ingrese la hora limite de entrega">
                    	</div>
            		</div>
            		<div class="form-group ">
	            	    <div class="input-group col-xs-12 col-sm-6">
	            	        <span class="input-group-addon">Estado:</span>
	            	        <?php 
                				require_once '../../model/Materia.php';
                			?>
                			<select class = "form-control" name="estado" id="estados">
								<option value="<?=Tarea::VISIBLE?>" ><?=Tarea::VISIBLE?></option>
								<option value="<?=Tarea::NO_VISIBLE?>"><?=Tarea::NO_VISIBLE?></option>
							</select>
	            	    </div>
            		</div>
            		<div class="form-group ">
            			<div class="input-group  col-xs-12 col-sm-6">
            				<span class="input-group-addon">Descripcion:</span>
    						<textarea required class="form-control" rows="3" placeholder="Descripcion de la tarea " name = "descripcion"></textarea>
                    	</div>
            		</div>
            		<div class="form-group">
						<button type="submit" id = "boton" name="boton" disabled class="btn btn-primary glyphicon glyphicon-floppy-disk"> Guardar</button>
					</div>
				</form>
	        </div>
			<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
			<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>
	</body>
</html>
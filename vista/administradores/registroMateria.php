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
    <head>
    	<title>Registro de Materia</title>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="../../css/bootstrap.css">
    	<link rel="stylesheet" href="../../css/estilos.css">
    	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/js/reloj.js"></script>
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
                        <a class="navbar-brand">MENU</a>
                        
                    </div>
                    <div class="collapse navbar-collapse" id="acolapsar" >
                             <ul class="nav navbar-nav" <ul style="float:right;">>
                            <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                                <li><a href="../administradores/index.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                                 <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                               </ul>
                        </div>
                    </div>
        </nav>
    	<div class="container">
    	    <font face="courier" color="blue">
    			<h1><b> Registro de una Materia</b></h1>
            </font>
            <br>
            <form method = "post" id="FormularioRegistroMateria" action="../../materias/crear.php" role="form" enctype="multipart/data-form class="form-horizontal"">
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon"> Nombre de Materia:</span>
    					<input required type="text" class="form-control" name="nombreMateria" id="nombreMateria" pattern="^[a-zA-Z]{3}*$" placeholder="Escriba el nombre de la materia" title="Minimo 3 caracteres.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Codigo de la Materia:</span>
    					<input required type="text" class="form-control" name="codigoMateria" id="codigoMateria" placeholder="Escriba el codigo de la materia" title="Minimo 3 caracteres y Maximo 12. Los primeros tres caracteres tienen que ser letras.">
                    </div>
            	</div>
            	
            	<div class="form-group ">
            		<div class="input-group col-md-6">
            			<span class="input-group-addon">Descripcion:</span>
    					<textarea class="form-control" name="descripcion" id="descripcion" placeholder="Escribe tu descripcion"></textarea>
                    </div>
            	</div>
            	
            	<div class="form-group ">
            	    <div class="input-group col-md-6">
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
            	
            	<div class ="form-group">
            	    <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Registrar</button>
                </div>
    		</form>
    	</div>
    
    	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="../../assets/js/jquery.js"></script>
    </body>

</html>
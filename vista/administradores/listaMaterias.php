
<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
        <title>Lista de Materias</title>
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
    			<center><h1><b> Materia Registradas</b></h1></center>
            </font>
            <br>
            <div class="table-responsive">
	            <table class="table table-striped table-hover table-bordered table-condensed">
		            <tr class="info">
		                <th>Nombre</th>
		                <th>Codigo</th>
		                <th>Descripcion</th>
		                <th>Profesor</th>
		                <th>Acciones</th>
		            </tr>
		            <?php
		            	require_once '../../model/Materia.php';
		                foreach(Materia::all() as $materia){
		               	    require "_lineaMateria.php";
		                }
		            ?> 
	            </table>
            </div>
            <a href="../tareas/nueva.php"><button class="btn btn-primary glyphicon glyphicon-plus"> Registrar Nueva Tarea</button></a>
        </div>
    </body>
</html>
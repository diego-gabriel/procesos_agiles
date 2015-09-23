<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Calendario de Tareas</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link href="Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="librerias/css/style11.css" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" href="../../css/estilos.css">
	</head>
	
	<body style="background:#F0F8FF">
		<div class = "container-fluid">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
	            <div class="navbar-header">
	                <h3><IMG SRC="imagenes/umss.png" ><font color='white'> <strong>UNIVERSIDAD MAYOR DE SAN SIMON &nbsp;&nbsp;&nbsp;</strong></h3>
	            </div>
	        </nav>
	        <br><br><br><br><br><br><br>
	        <div class="row">
	        	<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
	        		<br>
	        		<form method="post" action="/controlador/ingreso.php">
	        			<font FACE="courier">
	        				<center><h2><b>Ingresar al Sistema</b></h2></center>
                        </font>
                        <div class="form-group">
                        	<div class="input-group">
                        		<span class="input-group-addon" >Nombre de Usuario:</span>
                        		<input class="form-control" type="text" name="usuario" id="usuario" placeholder="Ingrese nombre de usuario" required>
                            </div>
                         </div>
                         <div class="form-group">
                        	<div class="input-group">
                        		<span class="input-group-addon" >Contraseña:</span>
                        		<input class="form-control" type="password"  name="contrasena" id="contrasena" placeholder="Ingrese su contraseña" required>
                            </div>
                         </div>
                         <div class="form-group">
                         	<a class="btn btn-primary pull-left" href="vista/registroEstudiante/formulario.php"> Regístrate</a>
                         	<button type="submit" name="ingresar" class="btn btn-primary pull-right" id="btn-registrarUser"><span class="glyphicon glyphicon-ok"></span> Ingresar</button>
                         </div>
                   </form>
	        	</div>
	        	<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
	        		<font color="black">
	        			<center><b><h1>Bienvenido al Calendario de Tareas</h1></b></center>
	        			<center><img src="imagenes/agiles.jpg" alt="portadaInicio" class="img-thumbnail" width="700" height="700"></center>
	        		</font>
	        	</div>
	        </div>
		</div>
		
	</body>

</html>
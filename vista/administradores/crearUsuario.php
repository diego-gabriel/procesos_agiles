<html>

<head>

	<body style="background:#F0F8FF">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear nuevo usuario</title>
    <link href="../../librerias/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">	<link rel="stylesheet" href="../../css/bootstrap.css">
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
    <link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/estilos.css">
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
                            <li><a href="../administradores/index.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a></li>
                             <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                           </ul>
                    </div>
                
            </div>
        </nav>
    <br>
	<div class="container">
	    <font face="courier" color="blue">
		<h1><b> Registro de un Profesor</b></h1>
            </font>
                <br>
                
                <form method = "post" id="FormularioRegistroEstudiante" action="../../controlador/registroProfesor.php" role="form" enctype="multipart/data-form">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 170px"> Nombre de Usuario:</span>
                                        <input required type="text" style="width: 370px" class="form-control" name="nombreUsuario" id="nombreUsuario" pattern="^[a-zA-Z]{3}[a-zA-z0-9_\\_\ü]{0,9}$" placeholder="Escriba un nombre de usuario" title="Minimo 3 caracteres y Maximo 12. Los primeros tres caracteres tienen que ser letras.">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 170px">Contraseña:</span>
                                        <input required type="password" style="width: 370px" class="form-control" name="contraseña" id="contraseña" placeholder="Escriba una contraseña segura" pattern=".{5,}" title="Ingrese una contraseña segura. Debe tener como minimo 5 caracteres.">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"style="width: 170px"> Repita su contraseña:</span>
                                        <input required type="password" style="width: 370px" class="form-control" name="contraseña1" id="contraseña1" placeholder="Escriba su contraseña nuevamente">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 170px">Nombre:</span>
                                        <input required type="text" style="width: 370px" class="form-control" name="nombre" id="nombre" placeholder="Escriba su nombre" pattern="[A-Z]{1}[a-záéíóú]{2,20}$" title="El nombre debe empezar con mayuscula.">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 170px">Apellido:</span>
                                        <input required type="text" style="width: 370px" class="form-control" name="apellido" id="apeliido" placeholder="Escriba su apellido" pattern="[A-Z]{1}[a-záéíóú]{2,20}\s?([A-Z]{1}[a-záéíóú]{2,20})?" title="El apellido debe empezar con mayuscula.">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 170px">Telefono:</span>
                                        <input required type="text" style="width: 370px" class="form-control" name="telefono" id="telefono" placeholder="Escriba su numero de telefono" pattern="^(([4][0-9]{6,7})|([7|6][0-9]{7}))$" title="Ingrese solo números validos.">
                                    </div>
                                </div>
                            </div>
                        </div>
        
				        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 170px">Correo:</span>
                                        <input required type="email" style="width: 370px" class="form-control" name="correo" id="correo" placeholder="Escriba su correo electronico" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Ingrese un correo valido.">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class ="form-group">
                            <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Registrar</button>
                        </div>
                    </div>
		</form>
	</div>

	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>

</body>

</html>
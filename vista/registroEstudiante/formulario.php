<html>

<head>

	<body style="background:#F0F8FF">
	<meta charset="utf-8">
	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de un Estudiante</title>
        <link href="../../librerias/css/bootstrap.min.css" rel="stylesheet">
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
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="../../index.php">Inicio </a>
        </div>
        </nav>
    <br><br><br>
	<div class="container">
		<h1> Registro de un Estudiante</h1>
                <br>
		<form method="post" action="">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class ="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="width: 170px">Nombre de Usuario:</span>
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
                                        <span class="input-group-addon"style="width: 170px">Repita su contraseña:</span>
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
                            <a href="index.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Registrar</button></a>
                        </div>
                    </div>
		</form>
	</div>

	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../dist/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript" src="../../assets/js/highlight.min.js"></script>

</body>

</html>
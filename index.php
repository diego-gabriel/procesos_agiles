<html>

<head>

	<body style="background:#F0F8FF">
	<meta charset="utf-8">
	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendario de Tareas</title>
        <link href="librerias/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <link href="Librerias/font-awesome/css/font-awesome.css" rel="stylesheet">
        
        <script src="librerias/js/sb-admin.js"></script>
        <link href="librerias/css/style11.css" rel="stylesheet" type="text/css" />
        
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <h3><IMG SRC="imagenes/umss.png"><font color='white'> <strong>UNIVERSIDAD MAYOR DE SAN SIMON &nbsp;&nbsp;&nbsp;</strong></h3>
            </div>
        </nav>
        <br><br><br><br><br><br>
        <div class="row">
            <div class="sidebar-collapse" >
                <div class="col-lg-12" >
                    <div class="content">
                        <div class="content_resize">
                            <div class="mainbar" style="color: black">
                                <h1>Bienvenido al Calendario de Tareas</h1>
                                <img  src="imagenes/agiles.jpg" alt="portadaInicio" class="img-thumbnail" width="700" height="700">
                            </div>
                            <form method="post" action="Controlador/login.php">
                                <div class="sidebar">
                                    <h2>Ingresar al Sistema</h2>
                                    <br>   
                                    <div class="form-group" style="padding: 5px 20px">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="width: 160px">Nombre de Usuario:</span>
                                            <input class="form-control" type="text" name="usuario" id="UserName" placeholder="Ingrese su nombre de usuario" required>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 5px 20px">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="width: 160px">Contraseña:</span>
                                            <input class="form-control" type="password" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div align="right" style="padding: 5px 20px">
                                            <a class="btn btn-primary pull-left" href="vista/registroEstudiante/formulario.php"> Regístrate</a>
                                            <button type="submit" name="ingresar" class="btn btn-primary" id="btn-registrarUser"><span class="glyphicon glyphicon-ok"></span> Ingresar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
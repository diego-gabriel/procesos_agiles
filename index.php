<html>

<head>

	<body style="background:#F0F8FF">
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
    <style type="text/css">
                
                
                 #titulo {
              font-weight: bold;
              font-size: 32px;
              font-family: "courier";
              text-shadow: 0 1px 0 #ccc, 
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
              color:blue;
              text-align: center;
              
                
}
    </style>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <h3><IMG SRC="imagenes/umss.png" ><font color='white'> <strong>UNIVERSIDAD MAYOR DE SAN SIMON &nbsp;&nbsp;&nbsp;</strong></h3>
            </div>
        </nav>
        <br><br><br><br><br><br>
        <div class="row">
            <div class="sidebar-collapse" >
                <div class="col-lg-12" >
                    <div class="content">
                        <div class="content_resize">
                            <div class="mainbar" style="color: black">
                                <h1 id="titulo">Bienvenido al Calendario de Tareas</h1>
                                <center><img src="imagenes/agiles.jpg" alt="portadaInicio" class="img-thumbnail" width="700" height="700"></center>
                            </div>
                            <form method="post" action="/controlador/ingreso.php">
                                <div class="sidebar">
                                   <font FACE="courier">
                                    <center><h2><b>Ingresar al Sistema</b></h2></center>
                                    </font>
                                    <br>   
                                    <div class="form-group" style="padding: 5px 20px">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="width: 160px">Nombre de Usuario:</span>
                                            <input class="form-control" type="text" style="width: 200px" name="usuario" id="usuario" placeholder="Ingrese nombre de usuario" required>
                                        </div>
                                    </div>
                                    <style type="text/css">
                
                                         #absoluto {
                                        position:absolute;
                                        left: 15px;
                                        top : 155px;
                                        }
                                    </style>
                                    <div id="absoluto"class="form-group" style="padding: 5px 20px">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="width: 152px">Contraseña:</span>
                                            <input class="form-control" type="password" style="width: 200px" name="contrasena" id="contrasena" placeholder="    Ingrese su contrasena" required>
                                        </div>
                                        
                                    </div>
                                    <br><br><br>
                                    <div class="form-group">
                                        <div align="right" style="padding: 10px 50px">
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
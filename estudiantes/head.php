<body style="background:#F0F8FF">
        <meta charset="UTF-8">
        
        <link rel="shortcut icon" href="../../imagenes/kronos.ico" type="image/x-icon" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     
         
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
         <script type="text/javascript" src="/js/reloj.js"></script>
         <script type="text/javascript" src="/js/desactivarNotificaciones.js"></script>
         <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="../../css/jquery1-10.css" />
	    <script src="../../dist/jquery-datepicker.js"></script>
    	<script src="jquery.ui.datepicker-es.js"></script>
	    <script type="text/javascript" src="../../js/validacionFechas.js"></script>
	    <link rel="stylesheet" href="/css/calendario.css" type="text/css" />
         
    </head>
<nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
                      <span class="sr-only">Toggle Navigation</span>  
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="inicio.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a>
                </div>
                <div class="collapse navbar-collapse" id="acolapsar" >
                        <ul class="nav navbar-nav"  style="float:right;">
                            <li> <a>Estudiante: <?=$estudiante->nombreCompleto()?><br></a> </li>
                            <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                            <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                         </ul>
                    </div>   
            </div>
        </nav>
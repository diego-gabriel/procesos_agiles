
    <head>
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
                    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a>
                    
                </div>
                <div class="collapse navbar-collapse" id="acolapsar" >
                    <ul class="nav navbar-nav" <ul style="float:right;">>
                        <li> <a>Administrador: <?=$administrador->getNombre()?><br></a> </li>
                        <li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                        <li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                    </ul>
                </div>
                
            </div>
        </nav>
      
       	
     
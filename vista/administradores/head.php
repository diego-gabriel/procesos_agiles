
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
    	<nav class="navbar navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle Navigation</span>  
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home">  </span> INICIO</a>
                </div>
                
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      		<ul class="nav navbar-nav">
			        		<li class="dropdown">
				          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Materias <span class="caret"></span></a>
				         		<ul class="dropdown-menu">
					            	<li><a href="registroMateria.php">Registrar Materias</a></li>
					            	<li><a href="listaMaterias.php">Lista de Materias</a></li>
				          		</ul>
			        		</li>
			      		</ul>
			      		<ul class="nav navbar-nav">
			        		<li class="dropdown">
				          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profesores <span class="caret"></span></a>
				         		<ul class="dropdown-menu">
					            	<li><a href="crearUsuario.php">Registrar Profesores</a></li>
					            	<li><a href="verUsuarios.php">Lista de Profesores</a></li>
				          		</ul>
			        		</li>
			      		</ul>
			      		<ul class="nav navbar-nav">
			        		<li class="dropdown">
				          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grupos <span class="caret"></span></a>
				         		<ul class="dropdown-menu">
					            	<li><a href="registroGrupo.php">Registrar Grupos</a></li>
					            	<li><a href="listaGrupos.php">Lista de Grupos</a></li>
				          		</ul>
			        		</li>
			      		</ul>
			      		<ul class="nav navbar-nav navbar-right">
			        		<ul class="nav navbar-nav" <ul style="float:right;">>
			        			<li> <a>Administrador: <?=$administrador->getNombre()?><br></a> </li>
                        		<li> <a> Fecha y hora del servidor: <span id = 'reloj'class="glyphicon glyphicon-time" > </span> <br></a> </li>
                        		<li><a href="../../index.php"><span class="glyphicon glyphicon-remove">  </span> CERRAR SESION</a></li>
                    		</ul>
			      		</ul>
			    	</div>
                
                <div class="collapse navbar-collapse" id="acolapsar" >
                    
                </div>
                
            </div>
        </nav>
      <script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
       	
     
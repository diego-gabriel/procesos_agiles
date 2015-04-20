<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/datepicker.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script>
			$(function(){
			 $('.datepicker').datepicker();
			});
		</script>
	</head>
	<body>
<div class="container">
    <h1> Registro de una nueva tarea</h1>
    <form method="post" action="registro_tarea.php">
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
       <label class="sr-only" for="date">Ingrese fecha de entrega</label>
       <input class="datepicker" type="text" name="date" id="date" placeholder="fecha de entrega">
      </div>
    </div>
      
      <div class="col-md-2">
       <div class="form-group">
        <label class="sr-only" for="name"class=" col-lg-2 control-label">Nombre</label>
        <input type="tex" class="form-control" id="name" placeholder="nombre de la tarea">
       </div>
      </div>
      
      <div class="col-md-2">
       <div class="form-group">
        <label class="sr-only" for="name"class=" col-lg-2 control-label">materia</label>
        <input type="tex" class="form-control" id="materia" name="materia" placeholder="Materia">
       </div>
      </div>
       
      <div class="col-md-6">
        <div class="form-group">
         <label for="archivo_adjunto">subir archivo</label>
         <input type="file" id="archivo_adjunto">
        </div>
      </div>
  </div>
	  
     
    <div class="form-group">
    <textarea class="form-control" rows="3" placeholder="Descripcion "></textarea>
    </div>
	 <div class="form-group">
    
      <button type="submit" class="btn btn-primary">Enviar</button>
   
   </div>
   </form>
</div>
	 



	</body>
</html>
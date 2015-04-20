<!DOCTYPE html>
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
		
		<div name="container">
		 <form action="index.php" method="post" name="fventa">
		 
		 	 <div class="form-group">
		 					
			  <input type="text" name="nombre" class="form-control" placeholder="ingrese el nombre"/>
			  </div>
			  <div class="form-group">
			    <input type="text" name="materia" class="form-control" placeholder="ingrese la materia"/>
			  </div>
			  <div class="form-group">
				<button type="submit" class="btn btn-default">Enviar</button>
		       </div>
			</form>
		</div>
		

   
<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login">
  login
</button>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">cerrar</span></button>
        <h4 class="modal-title" id="loginLabel">Ingrese sus datos</h4>
      </div>
      <div class="modal-body">
        	<div class="main-contant">
					<h3>
						Login
					</h3><hr>
			
					<input type="text" name="username" placeholder="UserName">
					<input type="password" name="password" placeholder="Password">
					<button class='btn btn-primary' style='width:100%;margin-top:10%;height:45px;' >LogIn </button>
			
				</div>   <!---end of main-contant----->
			
	</body>
</html>
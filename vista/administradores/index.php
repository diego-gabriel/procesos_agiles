<?php
    session_start();
    require_once "../../model/Administrador.php";
    if (isset($_SESSION['usuario_id'])){
        $administrador = new Administrador($_SESSION['usuario_id']);
    } else {
        header("Location: /index.php");
    }
?>
<!DOCTYPE html>
<?require'head.php'?>
<html lang="en">
    <title>Pagina Administrador</title>
    <br>
    <div class="container">
        
        <font > <center>
             <h1 id="titulo"><b>MENU PRINCIPAL ADMINISTRADOR</b></h1>
  			 
  			 </center>
	    </font>
	    </br>
    </div>
            <style type="text/css">
                
                 #absoluto {
                position:absolute;
                left: 500px;
                top :210px;
                }
                 #titulo {
              font-weight: bold;
              font-size: 36px;
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
              color:#7a231b;
              text-align: center;
}
            </style>
            
            <div class="content" align="left" style="padding: 50px 100px">
                  
                  <div id="absoluto"> <img  class="img-responsive" alt="Imagen responsive" src="../../imagenes/calendario.png" width="500" height="500">  </div>
            </div>
           
    </body>
</html>
<form action =  "/estudiantes/tarea.php?id=<?=$tarea->getId()?>" method = "POST" enctype="multipart/form-data">
   <center> <!-- <font color="blue"> <label for="archivo">Seleccione el archivo a entregar</label></font><br> -->
    <input type="file" name="archivo" accept = ".pdf, .zip" required/>
    <br>
    
    <input type="submit" class="btn btn-primary" value = "Entregar Tarea"/>
    </center>
</form>


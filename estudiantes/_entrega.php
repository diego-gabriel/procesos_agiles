<form action =  "/estudiantes/tarea.php?id=<?=$tarea->getId()?>" method = "POST" enctype="multipart/form-data">
    <label for="archivo">Seleccione el archivo a entregar</label><br>
    <input type="file" name="archivo" accept = ".pdf, .zip" required/>
    <br>
    <input type="submit" value = "Entregar"/>
</form>


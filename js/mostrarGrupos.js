$(document).ready(function(){
        $("#materia").change(function(event){
            var id = $("#materia").find(':selected').val();
            $("#grupo").load('generaGrupos.php?id='+id);
        });
    });
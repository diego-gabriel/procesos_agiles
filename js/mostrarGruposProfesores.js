$(document).ready(function(){
        $("#materia").change(function(event){
            var id = $("#materia").find(':selected').val();
            $("#grupo").load('../../tareas/generaGrupos.php?id='+id);
        });
    });
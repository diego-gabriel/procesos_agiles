jQuery(document).ready(function() {
    
            $(".verificarProfesor").on("click", function(e) {

                return confirm('El profesor tiene estudiantes inscritos. Esta seguro que quiere eliminalo?');

            });
});
jQuery(document).ready(function() {
    
            $(".verificarProfesor").on("click", function(e) {

                return confirm('Esta seguro que quiere eliminar al profesor?');

            });
});
jQuery(document).ready(function() {
    
            $(".verificarProfesor").on("click", function(e) {

                return confirm('Esta seguro que quiere eliminar al profesor?');

            });
});

jQuery(document).ready(function() {
    
            $(".notificacionProfesor").on("click", function(e) {

                return alert("No se puede eliminar al profesor porque esta inscrito a un grupo. Por favor cambie el profesor en el grupo y vuelva a realizar la operacion.");

            });
});
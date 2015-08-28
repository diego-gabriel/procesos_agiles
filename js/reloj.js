function mostrarReloj(argument) {
	$.ajax({
		url: "/controlador/reloj.php",
		method:"GET"
	}).done(function (html){
		$('#reloj').html(html);
	});	
}

$(document).ready(function(){
	window.setInterval(mostrarReloj, 1000);
});
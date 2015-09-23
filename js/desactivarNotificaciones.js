function desactivarNotificaciones(_url){
	$.ajax({
		url: "/notificaciones/desactivar.php",
		data: {url: _url},
		type: "POST"
	}).done(function (html){
		$("body").append(html)
	});
}

$(document).ready(function(){
	var url = '/'+window.location.href.replace(/^(?:\/\/|[^\/]+)*\//, "");
	console.log(url);
	desactivarNotificaciones(url);	
});
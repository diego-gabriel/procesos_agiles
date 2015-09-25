$(document).ready(function(){
	iniciarCalendario($("#calendario"));
});

function addEnlace(calendario, data){
	var fecha = $("#"+data['fecha']);
	fecha.addClass("linked").addClass(data['newClass']);
	var enlace = $(document.createElement('a'));
	enlace.attr({
		href: data['link']
	}).html(data['titulo']);	
	fecha.append(enlace);
}

function inicioDelMes(){
	var DIA = 1000*3600*24;
	var fecha = (new Date().valueOf());
	//decrementamos hasta que sea 1 del mes
	fecha -= DIA*(new Date().getDate()-1);
	//decrementamos hasta que sea lunes;
	fecha -= DIA*((new Date(fecha).getDay()+7-1) % 7);
	return fecha;
}

function semana(fecha, nroSemana, mes){
	var DIA = 1000*3600*24;
	fecha += DIA*7*nroSemana;
	
	var lineaSemana = $(document.createElement('tr'));
	
	for(var i = 0; i < 7; i++){
		var date = new Date(fecha);
		lineaSemana.append($(document.createElement('td')).text(date.getDate()).attr({
			class: (date.getMonth() != mes ? "disabled-month" : "actual-month") + " day-of-month",
			id: date.getDate()+"-"+date.getMonth()
		}));
		fecha += DIA;
	}
	
	
	return lineaSemana;
}


function lineaTitulos(){
	var titulos = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
	var titulosDeTabla = $(document.createElement("tr"));
	for(var i = 0; i < 7; i++){
		titulosDeTabla.append($(document.createElement("th")).text(titulos[i]));
	}
	return titulosDeTabla;
}


function iniciarCalendario(calendario){
	var hoy = new Date();
	var mes = hoy.getMonth();
	var fecha = inicioDelMes();
	var marcoCalendario = $(document.createElement('table'));
	var mesTitulo = $(document.createElement('tr'));
	mesTitulo.append($(document.createElement('th')).text(mesActual()).attr({
		id: "mes"
	}));
	marcoCalendario.append(mesTitulo);
	marcoCalendario.append(lineaTitulos);
	for(var i = 0; i < 5; i++){
		marcoCalendario.append(semana(fecha, i, mes));
	}
	
	calendario.append(marcoCalendario);
	$("#"+hoy.getDate()+"-"+hoy.getMonth()).addClass("today");
}


function isLeap(year){
	return ((year%4) == 0 && (year%100) != 0) || (year%400) == 0;
}

function mesActual(){
	var mes = new Date().getMonth();
	var res;
	switch (mes) {
		case 0:
			res = "Enero";
			break;
		case 1:
			res = "Febrero";
			break;
		case 2:
			res = "Marzo";
			break;
		case 3:
			res = "Abril";
			break;
		case 4:
			res = "Mayo";
			break;
		case 5:
			res = "Junio";
			break;
		case 6:
			res = "Julio";
			break;
		case 7:
			res = "Agosto";
			break;
		case 8:
			res = "Septiembre";
			break;
		case 9:
			res = "Octubre";
			break;
		case 10:
			res = "Noviembre";
			break;
		case 11:
			res = "Diciembre";
			break;
		
		default:
			// code
	}
	
	return res;
}

function daysOfMonth(month, year){
	year = typeof year !== 'undefined' ? year : new Date().getFullYear();
	
	var res;
	
	switch (month) {
		case 0:
			res = 31;
			break;
		case 1: 
			res = isLeap(year) ? 29 : 28;
			break;
		case 2:
			res = 31;
			break;
		case 3:
			res = 30;
			break;
		case 4:
			res = 31;
			break;
		case 5:
			res = 30;
			break;
		case 6:
			res = 31;
			break;
		case 7:
			res = 31;
			break;
		case 8:
			res = 30;
			break;
		case 9:
			res = 31;
			break;
		case 10:
			res = 30;
			break;
		case 11:
			res = 31;
			break;
		default:
			res = null;
	}
	
	return res;
}
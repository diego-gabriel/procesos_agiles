<?php

function carpetaPara($estudiante, $tarea){
	$raiz 	 = realpath($_SERVER['DOCUMENT_ROOT']);
	$materia = $tarea->getMateria()->getNombre();
	return "$raiz/archivos/$materia/".$tarea->getNombre()."/".$estudiante->getNombreUsuario();
}


function crearCarpeta($carpeta){
	$ruta_p = explode("/", $carpeta);
	$ruta = "";
	foreach ($ruta_p as $carpeta){
		$ruta .= "/".$carpeta;;
		if (!existeCarpeta($ruta)){
			mkdir($ruta, 0777);
		}
	}
	
}

function existeCarpeta($carpeta){
	return file_exists($carpeta) && is_dir($carpeta);
}

function extraerRutaServidor($ruta){
	return explode($_SERVER['DOCUMENT_ROOT'], $ruta)[1];
}

function recibirArchivo($estudiante, $tarea){
	$destino = carpetaPara($estudiante, $tarea);
	
	if (!existeCarpeta($destino)){
		crearCarpeta($destino);
	}
	
	$ruta_archivo = $destino."/".$_FILES['archivo']['name'];
	$archivo_subido_exitoso = move_uploaded_file($_FILES['archivo']['tmp_name'], $destino."/".$_FILES['archivo']['name']);
	
	return $archivo_subido_exitoso ? extraerRutaServidor($ruta_archivo) : null;
}

function verificarExtension($archivo){
	$partes = pathinfo($archivo);
	return $partes['extension'] == 'pdf'|| $partes['extension'] == 'zip';
}

?>
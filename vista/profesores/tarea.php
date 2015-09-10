<?php
	session_start();
	require_once '../../model/Tarea.php';
	require_once '../../model/Profesor.php';
	require_once '../../model/Estudiante.php';
	require_once '../../model/Usuario.php';
	require_once '../../controlador/validacionDeAcceso.php';
	
	$profesor = new Profesor($_SESSION['usuario_id']);
	validar_permisos($profesor, Usuario::PROFESOR);
	$tarea = new Tarea($_GET['id']);
	$materia = $tarea->getMateria();
?>

<h1>Tarea: <?=$tarea->getNombre()?></h1>
<?require '_tarea.php'?>
<h3>Entregas:</h3>
<table>
	<?php
		$id = 1;
	?>
	<tr>
		<th></th>
		<th>Estudiante</th>
		<th>Estado</th>
		<th></th>
	</tr>
	<?php
		foreach($profesor->estudiantes($materia) as $estudiante){
			require "_entregasTarea.php";
		}
	?>
</table>
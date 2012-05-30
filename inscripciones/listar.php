<?php

include '../db_connect.php';

$sql = 'SELECT * FROM inscripcion;';

$inscripciones = array();
foreach ($db->query($sql) as $inscripcion)
{
	$inscripciones[] = $inscripcion;
}

?>

<html>
<head>

</head>
<body>
	<h1>Inscripciones</h1>
	<p>Listado de las inscripciones existentes hasta la fecha:</p>
	<table>
		<tr>
			<th>Rut</th>
			<th>Nacionalidad</th>
			<th>Fecha Inscripcion</th>
			<th>Categoria</th>
			<th>Fecha Evento</th>
			<th>Pais</th>
			<th>Ciudad</th>
			<th>Calle</th>
		</tr>
		<?php foreach($inscripciones as $inscripcion){ ?>
		<tr>
			<td><?php echo $inscripcion['rut_participante'] ?></td>
			<td><?php echo $inscripcion['nacionalidad'] ?></td>
			<td><?php echo $inscripcion['fecha_inscripcion'] ?></td>
			<td><?php echo $inscripcion['categoria_participante'] ?></td>
			<td><?php echo $inscripcion['fecha_evento'] ?></td>
			<td><?php echo $inscripcion['pais'] ?></td>
			<td><?php echo $inscripcion['ciudad'] ?></td>
			<td><?php echo $inscripcion['calle'] ?></td>
			<td><a
				href="editar.php?rut_participante=<?php echo $inscripcion['rut_participante']?>&nacionalidad=<?php echo $inscripcion['nacionalidad']?>&fecha_evento=<?php echo $inscripcion['fecha_evento']?>&pais=<?php echo $inscripcion['pais']?>&ciudad=<?php echo $inscripcion['ciudad']?>&calle=<?php echo $inscripcion['calle']?>">Editar</a>
				</br> <a
				href="eliminar_data.php?rut_participante=<?php echo $inscripcion['rut_participante']?>&nacionalidad=<?php echo $inscripcion['nacionalidad']?>&fecha_evento=<?php echo $inscripcion['fecha_evento']?>&pais=<?php echo $inscripcion['pais']?>&ciudad=<?php echo $inscripcion['ciudad']?>&calle=<?php echo $inscripcion['calle']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<br />
	<a href="crear.php">Crear una nueva inscripcion</a>


<body>

</html>
<?php

include '../db_connect.php';

$sql = 'SELECT * FROM asociado;';

$asociadones = array();
foreach ($db->query($sql) as $asociacion)
{
	$asociaciones[] = $asociacion;
}

?>

<html>
<head>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<h1>Asociaciones</h1>
	<p>Listado de las asociaciones existentes hasta la fecha:</p>
	<table class="table">
		<thead>
		<tr>
			<th>Fecha Evento</th>
			<th>Pais</th>
			<th>Ciudad</th>
			<th>Calle</th>
			<th>Nombre auspiciador</th>
			<th>Monto</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($asociaciones as $asociacion){ ?>
		<tr>
			<td><?php echo $asociacion['fecha_evento'] ?></td>
			<td><?php echo $asociacion['pais'] ?></td>
			<td><?php echo $asociacion['ciudad'] ?></td>
			<td><?php echo $asociacion['calle'] ?></td>
			<td><?php echo $asociacion['nombre_auspiciador'] ?></td>
			<td><?php echo $asociacion['monto'] ?></td>
			<td><a
				href="editar.php?fecha_evento=<?php echo $asociacion['fecha_evento']?>&pais=<?php echo $asociacion['pais']?>&ciudad=<?php echo $asociacion['ciudad']?>&calle=<?php echo $asociacion['calle']?>&nombre_auspiciador=<?php echo $asociacion['nombre_auspiciador']?>">Editar</a>
				<br /> 
				<a
				href="eliminar_data.php?fecha_evento=<?php echo $asociacion['fecha_evento']?>&pais=<?php echo $asociacion['pais']?>&ciudad=<?php echo $asociacion['ciudad']?>&calle=<?php echo $asociacion['calle']?>&nombre_auspiciador=<?php echo $asociacion['nombre_auspiciador']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br />
	<a href="crear.php">Crear una nueva asociacion</a>


<body>

</html>
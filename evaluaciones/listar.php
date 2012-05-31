<?php

include '../db_connect.php';

$sql = 'SELECT * FROM evalua;';

$evaluaciones = array();
foreach ($db->query($sql) as $evaluacion)
{
	$evaluaciones[] = $evaluacion;
}

?>

<html>
<head>

</head>
<body>
	<h1>Evaluaciones</h1>
	<p>Listado de las evaluaciones existentes hasta la fecha:</p>
	<table>
		<tr>
			<th>Rut</th>
			<th>Nacionalidad</th>
			<th>Modelo</th>
			<th>Nota</th>
			<th>Descripcion</th>
		</tr>
		<?php foreach($evaluaciones as $evaluacion){ ?>
		<tr>
			<td><?php echo $evaluacion['rut'] ?></td>
			<td><?php echo $evaluacion['nacionalidad'] ?></td>
			<td><?php echo $evaluacion['modelo'] ?></td>
			<td><?php echo $evaluacion['nota'] ?></td>
			<td><?php echo $evaluacion['descripcion'] ?></td>
			<td><a
				href="editar.php?rut=<?php echo $evaluacion['rut']?>&nacionalidad=<?php echo $evaluacion['nacionalidad']?>&modelo=<?php echo $evaluacion['modelo']?>">Editar</a>
				<br /> <a
				href="eliminar_data.php?rut=<?php echo $evaluacion['rut']?>&nacionalidad=<?php echo $evaluacion['nacionalidad']?>&modelo=<?php echo $evaluacion['modelo']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<br />
	<a href="crear.php">Crear una nueva evaluacion</a>


<body>

</html>
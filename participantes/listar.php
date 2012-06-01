<?php

include '../db_connect.php';

$sql = 'SELECT * FROM participante;';

$participantes = array();
foreach ($db->query($sql) as $participante)
{
	$participantes[] = $participante;
}

?>

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<table class="table">
		<thead>
		<tr>
			<th>Nombres</th>
			<th>Ap. Paterno</th>
			<th>Ap. Materno</th>
			<th>RUT</th>
			<th>Nacionalidad</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($participantes as $participante){ ?>
		<tr>
			<td><?php echo $participante['nombres'] ?></td>
			<td><?php echo $participante['ap_paterno'] ?></td>
			<td><?php echo $participante['ap_materno'] ?></td>
			<td><?php echo $participante['rut'] ?></td>
			<td><?php echo $participante['nacionalidad'] ?></td>
			<td><a
				href="editar.php?rut=<?php echo $participante['rut']?>&nacionalidad=<?php echo $participante['nacionalidad']?>">Editar</a>
				</br> <a
				href="eliminar_data.php?rut=<?php echo $participante['rut']?>&nacionalidad=<?php echo $participante['nacionalidad']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br />
	<a href="crear.php">Crear un nuevo participante</a>

<body>

</html>

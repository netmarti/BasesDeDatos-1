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

</head>
<body>
	<table>
		<tr>
			<th>Nombres</th>
			<th>Ap. Paterno</th>
			<th>Ap. Materno</th>
			<th>RUT</th>
			<th>Nacionalidad</th>
		</tr>
		<?php foreach($participantes as $participante){ ?>
		<tr>
			<td><?php echo $participante['nombres'] ?></td>
			<td><?php echo $participante['ap_paterno'] ?></td>
			<td><?php echo $participante['ap_materno'] ?></td>
			<td><?php echo $participante['rut'] ?></td>
			<td><?php echo $participante['nacionalidad'] ?></td>
		</tr>
		<?php } ?>
	</table>
	<br />


<body>

</html>

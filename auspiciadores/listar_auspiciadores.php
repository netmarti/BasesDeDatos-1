<?php
include '../db_connect.php';
$sql = 'SELECT * from auspiciador;';

$auspiciadores = array();
foreach ($db->query($sql) as $auspiciador)
{
	$auspiciadores[] = $auspiciador;
}
?>

<html>
<head>

</head>
<body>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<!--<th>Monto</th>-->
		</tr>
		<?php foreach($auspiciadores as $aus){ ?>
		<tr>
			<td><?php echo $aus['nombre'] ?></td>
			<td><?php echo $aus['descripcion'] ?></td>
			<!--<td><?php echo $aus['monto'] ?></td>-->
		</tr>
		<?php } ?>
	</table>
	<br />


<body>

</html>

<?php

include '../db_connect.php';

$sql = 'SELECT * FROM resultado;';

$resultados = array();
foreach ($db->query($sql) as $resultado)
{
	$resultados[] = $resultado;
}

?>

<html>
<head>

</head>
<body>
	<table>
		<tr>
			<th>Posicion</th>
			<th>RUT</th>
			<th>Fecha</th>
		</tr>
		<?php foreach($resultados as $resultado){ ?>
		<tr>
			<td><?php echo $resultado['posicion'] ?></td>
			<td><?php echo $resultado['rut_participante'] ?></td>
			<td><?php echo $resultado['fecha_evento'] ?></td>
		</tr>
		<?php } ?>
	</table>
	<br />


<body>

</html>

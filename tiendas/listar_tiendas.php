<?php

include '../db_connect.php';

$sql = 'SELECT * FROM tienda;';

$tiendas = array();
foreach ($db->query($sql) as $tienda)
{
	$tiendas[] = $tienda;
}

?>

<html>
<head>

</head>
<body>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Calle</th>
			<th>Ciudad</th>
			<th>Pais</th>
		</tr>
		<?php foreach($tiendas as $tienda){ ?>
		<tr>
			<td><?php echo $tienda['nombre'] ?></td>
			<td><?php echo $tienda['calle'] ?></td>
			<td><?php echo $tienda['ciudad'] ?></td>
			<td><?php echo $tienda['pais'] ?></td>
		</tr>
		<?php } ?>
	</table>
	<br />


<body>

</html>

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
			<th>Nombres</th>
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
			<td><a
				href="editar.php?pais=<?php echo $tienda['pais']?>&ciudad=<?php echo $tienda['ciudad']?>&calle=<?php echo $tienda['calle']?>">Editar</a>
				<br /> <a
				href="eliminar_data.php?pais=<?php echo $tienda['pais']?>&ciudad=<?php echo $tienda['ciudad']?>&calle=<?php echo $tienda['calle']?>"">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<br />
	<a href="crear.php">Crear una nueva tienda</a>

<body>

</html>
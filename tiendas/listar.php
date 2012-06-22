<?php

include '../db_connect.php';

$sql = 'SELECT * FROM tienda;';

$tiendas = array();
foreach ($db->query($sql) as $tienda)
{
	$tiendas[] = $tienda;
}
include 'xml_log.php';
?>

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<?php include "../navbar.php"?>
<div class="container">
	<table class="table">
		<thead>
		<tr>
			<th>Nombres</th>
			<th>Calle</th>
			<th>Ciudad</th>
			<th>Pais</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($tiendas as $tienda){ ?>
		<tr>
			<td><?php echo $tienda['nombre'] ?></td>
			<td><?php echo $tienda['calle'] ?></td>
			<td><?php echo $tienda['ciudad'] ?></td>
			<td><?php echo $tienda['pais'] ?></td>
			<td><a
				href="editar.php?pais=<?php echo $tienda['pais']?>&ciudad=<?php echo $tienda['ciudad']?>&calle=<?php echo $tienda['calle']?>">Editar</a>
				<br /> <a
				href="eliminar_data.php?pais=<?php echo $tienda['pais']?>&ciudad=<?php echo $tienda['ciudad']?>&calle=<?php echo $tienda['calle']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br />
	<a href="crear.php">Crear una nueva tienda</a>
</div>
<body>

</html>
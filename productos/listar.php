<?php

	//incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Consultamos la tabla producto
	$sql = 'SELECT * FROM producto';

	//creamos un arreglo que almacene cada instancia de producto
	$productos = array();
	foreach ($db->query($sql) as $producto)
	{
		$productos[] = $producto;
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>
			Productos
		</title>
	</head>

	<body>
		<h1>Lista de todos los productos</h1>


		<table class="table">
			<thead>
			<tr>
				<th>Descripcion</th>
				<th>Nombre</th>
				<th>Modelo</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($productos as $producto){ ?>
			<tr>
				<td><?php echo $producto['descripcion'] ?></td>
				<td><?php echo $producto['nombre'] ?></td>
				<td><?php echo $producto['modelo'] ?></td>
				<td><a href="editar.php?modelo=<?php echo $producto['modelo']?>">Editar</a><br>
					<a href="eliminar_data.php?modelo=<?php echo $producto['modelo']?>">Eliminar</a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<br />
		<p><a href='crear.php'>Ingresar nuevo producto</a></p>
	<body>
</html>

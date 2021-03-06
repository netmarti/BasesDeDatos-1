<?php
	
	//incluimos la conexion a la BD
	include '../db_connect.php';

	//Obtenemos todos los datos de la tabla
	$sql = 'SELECT * FROM ofrece;';
	
	$ofertas = array();
	foreach($db->query($sql) as $oferta){
		
		$ofertas[] = $oferta;
		
	}
	
?>

<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>Ofertas de productos</title>
	</head>
	
	<body>
	<?php include "../navbar.php"?>
	<div class="container">
		<h1>Productos ofrecidos segun tienda</h1>
		<table class="table">
			<thead>
			<tr>
				<th>Modelo</th>
				<th>Pais</th>
				<th>Ciudad</th>
				<th>Calle</th>
				<th>Stock</th>
				<th>Precio</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($ofertas as $oferta){ ?>
			<tr>
				<td><?php echo $oferta['modelo'] ?></td>
				<td><?php echo $oferta['pais'] ?></td>
				<td><?php echo $oferta['ciudad'] ?></td>
				<td><?php echo $oferta['calle'] ?></td>
				<td><?php echo $oferta['stock'] ?></td>
				<td><?php echo $oferta['precio'] ?></td>
				<td><a
				href="editar.php?modelo=<?php echo $oferta['modelo']?>&
										pais=<?php echo $oferta['pais']?>&
										ciudad=<?php echo $oferta['ciudad']?>&
										calle=<?php echo $oferta['calle']?>">Editar</a>
				<br /> 
				<a
				href="eliminar_data.php?modelo=<?php echo $oferta['modelo']?>&
											pais=<?php echo $oferta['pais']?>&
											ciudad=<?php echo $oferta['ciudad']?>&
											calle=<?php echo $oferta['calle']?>">Eliminar</a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<br />
		<a href="crear.php">Crear una nueva oferta</a>
		
		</div>
	</body>
	
</html>
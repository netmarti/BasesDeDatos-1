<?php
	
	//incluimos la conexion a la BD
	include '../db_connect.php';
	
	//consultamos la tabla
	$sql = 'SELECT * FROM compra;';
	
	//creamos un arreglo que almacena cada instancia de compra
	$compras = array();
	foreach ($db->query($sql) as $compra)
	{
		$compras[] = $compra;
	}
	
?>

<html>
	<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>
			Compras
		</title>
	</head>
	
	<body>
		<h1>Lista de todos las Compras</h1>
		<table class="table">
			<thead>
			<tr>
				<th>Rut</th>
				<th>Nacionalidad</th>
				<th>Modelo</th>
				<th>Direccion</th>
				<th>Fecha_compra</th>
				<th>Cantidad</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($compras as $compra){
				?>
			<tr>
				<td><?php echo $compra['rut'] ?></td>
				<td><?php echo $compra['nacionalidad'] ?></td>
				<td><?php echo $compra['modelo'] ?></td>
				<td><?php echo $compra['pais']?> / <?php echo $compra['ciudad']?> / <?php echo $compra['calle']?></td>
				<td><?php echo $compra['fecha_compra'] ?></td>
				<td><?php echo $compra['cantidad'] ?></td>
				<td>
					<a href="eliminar_data.php?rut=<?php echo $compra['rut']?>
											&nacionalidad=<?php echo $compra['nacionalidad']?>
											&modelo=<?php echo $compra['modelo']?>
											&pais=<?php echo $compra['pais']?>
											&ciudad=<?php echo $compra['ciudad']?>
											&calle=<?php echo $compra['calle']?>
											&fecha_compra=<?php echo $compra['fecha_compra']?>">Eliminar</a><br />
					<a href="editar.php?rut=<?php echo $compra['rut']?>
											&nacionalidad=<?php echo $compra['nacionalidad']?>
											&modelo=<?php echo $compra['modelo']?>
											&pais=<?php echo $compra['pais']?>
											&ciudad=<?php echo $compra['ciudad']?>
											&calle=<?php echo $compra['calle']?>
											&fecha_compra=<?php echo $compra['fecha_compra']?>">Editar</a>
				</td>
			</tr>
			<?php } ?> 
			</tbody>
		</table>
		<br />
		
		<a href="crear.php">Agregar un nuevo compra</a>

	<body>	

</html>

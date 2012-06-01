<?php
	
	//incluimos la conexion a la BD
	include '../db_connect.php';
	
	//consultamos la tabla
	$sql = 'SELECT * FROM resultado;';
	
	//creamos un arreglo que almacena cada instancia de producto
	$resultados = array();
	foreach ($db->query($sql) as $resultado)
	{
		$resultados[] = $resultado;
	}
	

?>

<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<title>
			Resultados
		</title>
	</head>
	
	<body>
		<h1>Lista de todos los resultados</h1>
		<table class="table">
			<thead>
			<tr>
				<th>Posicion</th>
				<th>Tiempo</th>
				<th>Rut participante</th>
				<th>Fecha evento</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($resultados as $resultado){
				?>
			<tr>
				<td><?php echo $resultado['posicion'] ?></td>
				<td><?php echo $resultado['horas']?>:<?php echo $resultado['minutos']?>:<?php echo $resultado['segundos']?></td>
				<td><?php echo $resultado['rut_participante'] ?></td>
				<td><?php echo $resultado['fecha_evento'] ?></td>
				<td>
					<a href="eliminar_data.php?rut_participante=<?php echo $resultado['rut_participante']?>
											&nacionalidad_participante=<?php echo $resultado['nacionalidad_participante']?>
											&fecha_evento=<?php echo $resultado['fecha_evento']?>
											&pais=<?php echo $resultado['pais']?>
											&ciudad=<?php echo $resultado['ciudad']?>
											&calle=<?php echo $resultado['calle']?>">Eliminar</a><br />
					<a href="editar.php?rut_participante=<?php echo $resultado['rut_participante']?>
											&nacionalidad_participante=<?php echo $resultado['nacionalidad_participante']?>
											&fecha_evento=<?php echo $resultado['fecha_evento']?>
											&pais=<?php echo $resultado['pais']?>
											&ciudad=<?php echo $resultado['ciudad']?>
											&calle=<?php echo $resultado['calle']?>">Editar</a>
				</td>
			</tr>
			<?php } ?>
			</tbody> 
		</table>
		<br />
		
		<a href="crear.php">Agregar un nuevo resultado</a>

	<body>	

</html>

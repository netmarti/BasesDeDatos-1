<?php

	//incluimos la conexion
	include '../db_connect.php';
	
	//Consultamos la tabla auspiciador
	$sql = 'SELECT * from auspiciador;';

	$auspiciadores = array();
	foreach ($db->query($sql) as $auspiciador)
	{
		$auspiciadores[] = $auspiciador;
	}
?>

<html>
	<head>
		<title>
			Auspiciadores
		</title>
	</head>
	
	<body>
		<h1>Lista de todos los auspiciadores</h1>
		
		<table border = '1' cellpadding= '15' >
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
			</tr>
			<?php foreach($auspiciadores as $aus){ ?>
			<tr>
				<td><?php echo $aus['nombre'] ?></td>
				<td><?php echo $aus['descripcion'] ?></td>
				<td><a href="editar.php?nombre=<?php echo $aus['nombre'] ?>">Editar</a><br />
					<a href="eliminar_data.php?nombre=<?php echo $aus['nombre'] ?>">Eliminar</a>
				</td>
			</tr>
			<?php } ?>
		</table>
		<br />
		<p><a href='crear.php'>Ingresar nuevo auspiciador</a></p>

	<body>

</html>
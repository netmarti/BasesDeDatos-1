<?php

include '../db_connect.php';

$sql = 'SELECT * FROM evento;';

$eventos = array();
foreach ($db->query($sql) as $evento)
{
	$eventos[] = $evento;
}

?>

<html>
<head>

</head>
<body>
	<h1>Eventos</h1>
	<p>Listado de los eventos existentes hasta la fecha:</p>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Recaudacion</th>
			<th>Fecha</th>
			<th>Pais</th>
			<th>Ciudad</th>
			<th>Calle</th>
			<th>Modificar</th>
		</tr>
		<?php foreach($eventos as $evento){ ?>
		<tr>
			<td><?php echo $evento['nombre'] ?></td>
			<td><?php echo $evento['tipo_de_evento'] ?></td>
			<td><?php echo $evento['recaudacion'] ?></td>
			<td><?php echo $evento['fecha'] ?></td>
			<td><?php echo $evento['pais'] ?></td>
			<td><?php echo $evento['ciudad'] ?></td>
			<td><?php echo $evento['calle'] ?></td>
			<td><a
				href="editar.php?fecha=<?php echo $evento['fecha']?>&pais=<?php echo $evento['pais']?>&ciudad=<?php echo $evento['ciudad']?>&calle=<?php echo $evento['calle']?>">Editar</a>
				</br> <a
				href="eliminar_data.php?fecha=<?php echo $evento['fecha']?>&pais=<?php echo $evento['pais']?>&ciudad=<?php echo $evento['ciudad']?>&calle=<?php echo $evento['calle']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<br />
	<a href="crear.php">Crear un nuevo evento</a>


<body>

</html>

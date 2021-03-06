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
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<?php include "../navbar.php"?>
<div class="container">
	<h1>Eventos</h1>
	<p>Listado de los eventos existentes hasta la fecha:</p>
	<table class="table">
		<thead>
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
		</thead>
		<tbody>
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
				<br /> <a
				href="eliminar_data.php?fecha=<?php echo $evento['fecha']?>&pais=<?php echo $evento['pais']?>&ciudad=<?php echo $evento['ciudad']?>&calle=<?php echo $evento['calle']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br />
	<a href="crear.php">Crear un nuevo evento</a>
	<br />
	<p>
		<h3>Consulta Ganadores de cada carrera</h3>
		<form method="post" action="ganadores.php">
			<p>
				Cantidad de ganadores:<input type="text" name="cantidad" />
			</p>
			<p>
			<input type="checkbox" name="formato" value="xml">En formato XML</input>
			</p>
			<p>
				<input type="submit" value="Consultar" />
			</p>
		</form>
		<br />
		<h3>Consulta carreras con mas de n inscritos</h3>
		<form method="post" action="populares.php">
			<p>
				Cantidad de inscritos: <input type="text" name="cantidad" />
			</p>
			<p>
			<input type="checkbox" name="formato" value="xml">En formato XML</input>
			</p>
			<p>
				<input type="submit" name="Consultar" />
			</p>
		</form>
	</p>


</div>
</body>

</html>

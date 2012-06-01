<?php

include '../db_connect.php';

$cantidad = $_POST['cantidad'];

$sql = "select *from evento e where (select COUNT(*) 
		from inscripcion as i  
		where e.fecha = i.fecha_evento AND e.pais = i.pais AND e.calle = i.calle AND e.ciudad = i.ciudad) >='$cantidad'
		ORDER BY fecha;";

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
	<p>Listado de los eventos para los cuales hay mas de <?php echo $cantidad ?>:</p>
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
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br />
	<a href="listar.php">Volver a la lista de eventos</a>
	

</div>
<body>

</html>
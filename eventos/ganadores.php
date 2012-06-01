<?php

include '../db_connect.php';

$cantidad = $_POST['cantidad'];

$sql = "select p.*, e.nombre as nombre_evento, e.fecha as fecha_evento, r.posicion
from participante p, resultado as r JOIN evento as e ON r.fecha_evento = e.fecha and r.pais = e.pais and r.calle = e.calle and r.ciudad = e.ciudad 
where p.rut = r.rut_participante and p.nacionalidad = r.nacionalidad_participante AND r.posicion <= '$cantidad'
ORDER BY nombre;";

$participantes = array();
foreach ($db->query($sql) as $participante)
{
	$participantes[] = $participante;
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
	<p>Listado de los ganadores respectivos de los distintos eventos:</p>
	<table class="table">
		<thead>
		<tr>
			<th>Nombre</th>
			<th>Rut</th>
			<th>Nacionalidad</th>
			<th>Nombre Evento</th>
			<th>Fecha Evento</th>
			<th>Posicion</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($participantes as $participante){ ?>
		<tr>
			<td><?php echo $participante['nombres'] ?> <?php echo $participantes['ap_paterno']?></td>
			<td><?php echo $participante['rut'] ?></td>
			<td><?php echo $participante['nacionalidad'] ?></td>
			<td><?php echo $participante['nombre_evento'] ?></td>
			<td><?php echo $participante['fecha_evento'] ?></td>
			<td><?php echo $participante['posicion'] ?></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br />
	<a href="listar.php">Volver a la lista de eventos</a>
	<br />
	

</div>
<body>

</html>
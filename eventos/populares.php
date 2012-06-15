<?php

include '../db_connect.php';

$cantidad = $_POST['cantidad'];
$formato = $_POST['formato'];

$sql = "select *from evento e where (select COUNT(*) 
		from inscripcion as i  
		where e.fecha = i.fecha_evento AND e.pais = i.pais AND e.calle = i.calle AND e.ciudad = i.ciudad) >='$cantidad'
		ORDER BY fecha;";

$eventos = array();
foreach ($db->query($sql) as $evento)
{
	$eventos[] = $evento;
}

if($formato != "xml") {
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
<?php 
} else {
	//aqui va el XML !!
	$elemento = new SimpleXMLElement("<tabla></tabla>");
	foreach($eventos as $evento) {
		$registro = $elemento->addChild("registro");
		$registro->addChild("nombre",$evento['nombre']);
		$registro->addChild("tipo_de_evento",$evento['tipo_de_evento']);
		$registro->addChild("recaudacion",$evento['recaudacion']);
		$registro->addChild("fecha",$evento['fecha']);
		$registro->addChild("pais",$evento['pais']);
		$registro->addChild("ciudad",$evento['ciudad']);
		$registro->addChild("calle",$evento['calle']);
	}
	echo $elemento->asXML();
}
?>
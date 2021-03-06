<?php

include '../db_connect.php';

$formato = $_POST['formato'];

$sql = 'select p.nombres, p.ap_paterno, p.ap_materno, p.rut, i.*
from participante as p, inscripcion as i
where NOT EXISTS( SELECT *
				  FROM resultado as r
				  WHERE r.rut_participante = i.rut_participante
				  AND r.nacionalidad_participante = i.nacionalidad
				  AND r.fecha_evento = i.fecha_evento
				  AND r.pais = i.pais
				  AND r.ciudad = i.ciudad
				  AND r.calle = i.calle
				  )
	AND p.rut = i.rut_participante
	AND p.nacionalidad = i.nacionalidad;';
include '../xml_log.php';
$participantes = array();
foreach ($db->query($sql) as $participante)
{
	$participantes[] = $participante;
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
	<table class="table">
		<thead>
		<tr>
			<th>Nombres</th>
			<th>Ap. Paterno</th>
			<th>Ap. Materno</th>
			<th>RUT</th>
			<th>Nacionalidad</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($participantes as $participante){ ?>
		<tr>
			<td><?php echo $participante['nombres'] ?></td>
			<td><?php echo $participante['ap_paterno'] ?></td>
			<td><?php echo $participante['ap_materno'] ?></td>
			<td><?php echo $participante['rut'] ?></td>
			<td><?php echo $participante['nacionalidad'] ?></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br/>
</div>
<body>

</html>
<?php 
	} else {
		//aqui va el XML !!
		$elemento = new SimpleXMLElement("<tabla></tabla>");
		foreach($participantes as $participante) {
			$registro = $elemento->addChild("registro");
			$registro->addChild("nombres",$participante['nombres']);
			$registro->addChild("ap_paterno",$participante['ap_paterno']);
			$registro->addChild("ap_materno",$participante['ap_materno']);
			$registro->addChild("rut",$participante['rut']);
			$registro->addChild("nacionalidad",$participante['nacionalidad']);	
		}
		echo $elemento->asXML();
	}
?>

<?php

include '../db_connect.php';

$sql = 'select p.nombres, p.ap_paterno, p.ap_materno, p.nacionalidad, p.rut
from participante as p, inscripcion as i
where NOT EXISTS( SELECT *
				  FROM resultado as r
				  WHERE r.rut_participante = i.rut_participante AND r.nacionalidad_participante = i.nacionalidad)
	AND p.rut = i.rut_participante 
	AND p.nacionalidad = i.nacionalidad';

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

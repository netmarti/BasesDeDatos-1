<?php

include '../db_connect.php';

$participaciones = $_POST['participaciones'];
$formato = $_POST['formato'];

$sql = "SELECT p.*, e.email
FROM participante p, email e
WHERE(SELECT COUNT(*)
FROM resultados_eventos r
WHERE r.rut = p.rut) >= '$participaciones'
AND p.rut = e.rut
AND p.nacionalidad = e.nacionalidad;";
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
	<h2>Lista de los participantes que han participado en más de <?php echo $participaciones?> eventos</h2><br />
	<table class="table">
		<thead>
			<th>Nombres</th>
			<th>Ap. Paterno</th>
			<th>Ap. Materno</th>
			<th>RUT</th>
			<th>Nacionalidad</th>
			<th>Email</th>
		</tr>
		</thead>
		<tr>
		
		<?php foreach($participantes as $participante){ ?>
		<tr>
			<td><?php echo $participante['nombres'] ?></td>
			<td><?php echo $participante['ap_paterno'] ?></td>
			<td><?php echo $participante['ap_materno'] ?></td>
			<td><?php echo $participante['rut'] ?></td>
			<td><?php echo $participante['nacionalidad'] ?></td>
			<td><?php echo $participante['email'] ?></td>
			
		</tr>
		<?php } ?>
	</table>
	<br />
	<a href="listar.php">Volver a la lista de participantes</a>
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
			$registro->addChild("email",$participante['email']);
		}
		echo $elemento->asXML();
	}
?>
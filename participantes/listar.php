<?php

include '../db_connect.php';

$sql = 'SELECT * FROM participante;';

$participantes = array();
foreach ($db->query($sql) as $participante)
{
	$participantes[] = $participante;
}
include '../xml_log.php';
?>

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<?php include "../navbar.php"?>
<div class="container">

	<h3>Consultas</h3>
	<form method="post" action="no_participan.php" >
		<p>
			<h4>Participantes inscritos en eventos, pero que no compitieron: </h4>
			 <p>
			<input type="checkbox" name="formato" value="xml">En formato XML</input>
			</p>
			 <input type="submit" value="Consultar" />
		</p>


	</form>

	<br/>
	<h4>Participantes que han participado en mas de n eventos</h4>
	<form method="post" action="listar_motivados.php">
		<p>
			Cantidad de participaciones:<input type="text" name="participaciones" />
		</p>
		<p>
			<input type="checkbox" name="formato" value="xml">En formato XML</input>
		</p>
		<p>
			<input type="submit" value="Consultar" />
		</p>
	</form>

	<h1>Participantes</h1>
	<p>Listado de los participantes registrados hasta la fecha:</p>

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
			<td><a
				href="editar.php?rut=<?php echo $participante['rut']?>&nacionalidad=<?php echo $participante['nacionalidad']?>">Editar</a>
				<br /> <a
				href="eliminar_data.php?rut=<?php echo $participante['rut']?>&nacionalidad=<?php echo $participante['nacionalidad']?>">Eliminar</a>
			</td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	<br />
	<a href="crear.php">Crear un nuevo participante</a>
	<br />

</div>
<body>

</html>

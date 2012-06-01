<?php

include '../db_connect.php';

$sql = 'SELECT * FROM participante;';

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
<<<<<<< HEAD
	<h3>Consulta</h3>
	<form method="post" action="no_participan.php" >
		<p>
			Participantes inscritos en eventos, pero que no compitieron: <input type="submit" value="Consultar" />
		</p>
	</form>
=======
	<h1>Participantes</h1>
	<p>Listado de los participantes registrados hasta la fecha:</p>
>>>>>>> dbf47516110ab2c1d5c4cb728a5ac16a60de88aa
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
	<p>
		<h3>Consultas</h3>
		<form method="post" action="listar_motivados.php">
			<p>
				Cantidad de participaciones:<input type="text" name="participaciones" />
			</p>
			<p>
				<input type="submit" value="Consultar" />
			</p>
		</form>
	</p>
</div>
<body>

</html>

<?php

//Revisamos que exista un id como parametro
if(!isset($_GET['nombre_auspiciador']) || !isset($_GET['fecha_evento']) || !isset($_GET['pais'])){
	echo "No ha especificado una asociacion";
} else {

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Obtenemos los datos y generamos la consulta
	$fecha_evento = $_GET['fecha_evento'];
	$pais = $_GET['pais'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	$nombre_auspiciador = $_GET['nombre_auspiciador'];
	
	$sql_asociacion = "SELECT * FROM asociado WHERE fecha_evento = '$fecha_evento' AND pais = '$pais' AND ciudad = '$ciudad' AND nombre_auspiciador = '$nombre_auspiciador';";
	
	//Extraemos los datos
	
	//die($sql_asociacion);
	foreach ($db->query($sql_asociacion) as $row){

		$asociacion = $row;

	}

	//Nos desconectamos de la base de datos
	$db = null;

	//Si no hay un evento con ese id, lo informamos
	if(!isset($asociacion)){

		echo "No existe esa asociacion";

	} else {

		?>
<!-- Formulario que edita a un evento -->

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<?php include "../navbar.php"?>
<div class="container">
<h1>Editar Asociacion</h1>

<p>Indique los nuevos datos de la Asociacion:


<p>


<form class="well" method='post' action='editar_data.php'>
	<input type="hidden" name="fecha_evento" value="<?php echo $fecha_evento ?>" />
	<input type="hidden" name="pais" value="<?php echo $pais ?>" />
	<input type="hidden" name="ciudad" value="<?php echo $ciudad ?>" />
	<input type="hidden" name="calle" value="<?php echo $calle ?>" />
	<input type="hidden" name="nombre_auspiciador" value="<?php echo $nombre_auspiciador ?>" />
	<h3>Datos:</h3>
	<p>
		Fecha Evento: <?php echo $fecha_evento?>
	</p>
	<p>
		Pais: <?php echo $pais?>
	</p>
	<p>
		Ciudad: <?php echo $ciudad?>
	</p>
	<p>
		Calle: <?php echo $calle?>
	</p>
	<p>
		Nombre Auspiciador: <?php echo $nombre_auspiciador?>
	</p>
	<p>
		Monto: <input type="text" name="monto" value="<?php echo $asociacion['monto']?>" />
	</p>
	<br />
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>
</div>
</body>
</html>
<?php
	
	}
}
?>
<?php

//Revisamos que exista un id como parametro
if(!isset($_GET['fecha']) ||!isset($_GET['pais']) || !isset($_GET['ciudad']) || !isset($_GET['calle'])){
	echo "No ha especificado un evento";
} else {

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Obtenemos los datos y generamos la consulta
	$fecha = $_GET['fecha'];
	$pais = $_GET['pais'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	
	$sql_evento = "SELECT * FROM evento WHERE fecha = '$fecha' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";
	$sql_precio_juvenil = "SELECT * FROM precio_inscripcion WHERE fecha_evento = '$fecha' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle' AND categoria_participante = 'juvenil';";
	$sql_precio_adulto = "SELECT * FROM precio_inscripcion WHERE fecha_evento = '$fecha' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle' AND categoria_participante = 'adulto';";
	$sql_precio_senior = "SELECT * FROM precio_inscripcion WHERE fecha_evento = '$fecha' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle' AND categoria_participante = 'senior';";
	//Extraemos los datos
	
	//die($sql_precio_juvenil);
	foreach ($db->query($sql_evento) as $row){

		$evento = $row;

	}
	
	//Extraemos los datos
	foreach ($db->query($sql_precio_juvenil) as $row){
	
		$precio_juvenil = $row['precio'];
	
	}
	
	//Extraemos los datos
	foreach ($db->query($sql_precio_adulto) as $row){
	
		$precio_adulto = $row['precio'];
	
	}
	
	//Extraemos los datos
	foreach ($db->query($sql_precio_senior) as $row){
	
		$precio_senior = $row['precio'];
	
	}
	

	//Nos desconectamos de la base de datos
	$db = null;

	//Si no hay un evento con ese id, lo informamos
	if(!isset($evento)){

		echo "No existe ese evento";

	} else {

		?>
<!-- Formulario que edita a un evento -->

<html>

<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<?php include "../navbar.php"?>
<div class="container">
<h1>Editar Evento</h1>

<p>Indique los nuevos datos de los evento:


<p>


<form class="well" method='post' action='editar_data.php'>
	<input type="hidden" name="id_fabricante" value="<?php echo $fecha ?>" />
	<h3>Datos del evento:</h3>
	<p>
		Nombre: <input type="text" name="nombre"
			value="<?php echo $evento['nombre']?>" />
	</p>
	<p>
		Tipo: <input type="text" name="tipo_de_evento"
			value="<?php echo $evento['tipo_de_evento']?>" />
	</p>
	<p>
		Recaudacion: <input type="text" name="recaudacion"
			value="<?php echo $evento['recaudacion']?>" />
	</p>
	<p>
		Fecha: <input type="text" name="fecha"
			value="<?php echo $evento['fecha']?>" />
	</p>
	<p>
		Pais: <input type="text" name="pais"
			value="<?php echo $evento['pais']?>" />
	</p>
	<p>
		Ciudad: <input type="text" name="ciudad"
			value="<?php echo $evento['ciudad']?>" />
	</p>
	<p>
		Calle: <input type="text" name="calle"
			value="<?php echo $evento['calle']?>" />
	</p>
	<h3>Precios por categoria:</h3>
	<p>
		Juvenil: <input type="text" name="precio_juvenil"
			value="<?php echo $precio_juvenil?>" />
	</p>
	<p>
		Adulto: <input type="text" name="precio_adulto"
			value="<?php echo $precio_adulto?>" />
	</p>
	<p>
		Senior: <input type="text" name="precio_senior"
			value="<?php echo $precio_senior?>" />
	</p>
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>
</div>
</html>
<?php
	
	}
}
?>



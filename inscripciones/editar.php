<?php

//Revisamos que exista un id como parametro
if(!isset($_GET['rut_participante']) || !isset($_GET['nacionalidad']) || !isset($_GET['fecha_evento']) ||!isset($_GET['pais']) || !isset($_GET['ciudad']) || !isset($_GET['calle'])){
	echo "No ha especificado una inscripcion";
} else {

	//Incluimos la conexion a la base de datos
	include '../db_connect.php';

	//Obtenemos los datos y generamos la consulta
	$rut_participante = $_GET['rut_participante'];
	$nacionalidad = $_GET['nacionalidad'];
	$fecha_evento = $_GET['fecha_evento'];
	$pais = $_GET['pais'];
	$ciudad = $_GET['ciudad'];
	$calle = $_GET['calle'];
	
	$sql_inscripcion = "SELECT * FROM inscripcion WHERE rut_participante = '$rut_participante' AND nacionalidad = '$nacionalidad' AND fecha_evento = '$fecha_evento' AND pais = '$pais' AND ciudad = '$ciudad' AND calle = '$calle';";
	
	//Extraemos los datos
	
	//die($sql_precio_juvenil);
	foreach ($db->query($sql_inscripcion) as $row){

		$inscripcion = $row;

	}

	//Nos desconectamos de la base de datos
	$db = null;

	//Si no hay un evento con ese id, lo informamos
	if(!isset($inscripcion)){

		echo "No existe esa inscripcion";

	} else {

		?>
<!-- Formulario que edita a un evento -->

<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<h1>Editar Inscripcion</h1>

<p>Indique los nuevos datos de la inscripcion:


<p>


<form class="well" method='post' action='editar_data.php'>
	<input type="hidden" name="id_fabricante" value="<?php echo $fecha_evento ?>" />
	<h3>Datos del evento:</h3>
	<p>
		Rut: <input type="text" name="rut_participante"
			value="<?php echo $inscripcion['rut_participante']?>" />
	</p>
	<p>
		Nacionalidad: <input type="text" name="nacionalidad"
			value="<?php echo $inscripcion['nacionalidad']?>" />
	</p>
	<p>
		Fecha Inscripcion: <input type="text" name="fecha_inscripcion"
			value="<?php echo $inscripcion['fecha_inscripcion']?>" />
	</p>
	<p>Categoria: 
			<select name="categoria_participante">
				<option value="juvenil">Juvenil</option>
				<option value="adulto">Adulto</option>
				<option value="senior">Senior</option>				
			</select>
	</p>
	<p>
		Fecha Evento: <input type="text" name="fecha_evento"
			value="<?php echo $inscripcion['fecha_evento']?>" />
	</p>
	<p>
		Pais: <input type="text" name="pais"
			value="<?php echo $inscripcion['pais']?>" />
	</p>
	<p>
		Ciudad: <input type="text" name="ciudad"
			value="<?php echo $inscripcion['ciudad']?>" />
	</p>
	<p>
		Calle: <input type="text" name="calle"
			value="<?php echo $inscripcion['calle']?>" />
	</p>
	<p>
		<input type="submit" value="Enviar">
	</p>
</form>

</html>
<?php
	
	}
}
?>